<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use App\Author;
use App\Tag;
use App\Category;
use App\Traits\ManagesImages;
use App\MarketingImage;
use App\Menu;

class PostController extends Controller
{
    use ManagesImages;

    public function __construct()
    {
        $this->setImageDefaultsFromConfig('marketingImage');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('view_count','DESC')->with('author')->get();
        return view('backend.posts.index')->with(compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::pluck('name', 'id');
        $tags = Tag::pluck('name','name');
        $categories = Category::pluck('category_name','id');
        $menus = Menu::whereNotIn('id',Category::pluck('menu_id'))->pluck('menu_name','id');
        return view('backend.posts.create' , compact('authors','tags','categories','menus'));  
    }

    public function createFirstStep(Request $request)
    {
        $this->validate($request,Post::$firstrules);
        
        if ( !$request->has('category_id') && !$request->has('menu_id') ) {
            return back()->withErrors(['cat_menu' => ['Choose cateogry or menu']])->withInput();
        }
        
        session()->put('inputs', $request->except('token'));
        
        return redirect()->route('post.finalstep');
    }

    public function createFinalStep()
    {
        return view('backend.posts.finalCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        if (!session()->has('inputs')) {
            return redirect()->back();
        }
        
        $inputs = session()->get('inputs');

        foreach ($inputs as $key => $value) {
            $request->request->add([$key=>$value]);
        }        
        
        if ($request->hasFile('image')) {
            $this->validate($request,Post::$rulesWithImage);
        }
        else {
            $this->validate($request,Post::$rules);;
        }

        // $this->validate($request,[
        //     'image' => 'required|mimes:jpeg,jpg,bmp,png|max:2097152',
        //     'content' => 'required',
        // ]);       

        $tag_id = $this->tag_check($request->input('tag_id'));
        
        $post = Post::create($request->all());

        if ($request->hasFile('image')) {
            $this::storeImage($request,$post);
        }

        $post->tags()->attach($tag_id);
        
        if ($request->has('category_id')) {
            $post->categories()->attach($request->input('category_id'));
        }

        if ($request->has('menu_id')) {
            $post->menus()->attach($request->input('menu_id'));
        }

        alert('Success','Post Created');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($prefix)
    {
        $post = Post::where('prefix',$prefix)->first();
        $destinationFolder = $this->destinationFolder;
        return view('backend.posts.show',compact('post','destinationFolder'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $authors = Author::pluck('name','id');
        $tags = Tag::pluck('name','name');
        $categories = Category::pluck('category_name','id');
        $menus = Menu::whereNotIn('id',Category::pluck('menu_id'))->pluck('menu_name','id');
        $postCate = $post->categories()->pluck('categories.id');
        $postTags = $post->tags()->pluck('tags.name');
        $postMenu = $post->menus()->pluck('menus.id');
        $thumbnailPath = $this->thumbnailPath;
        
        return view('backend.posts.edit',compact('post','authors','tags','categories','thumbnailPath','menus','postMenu','postCate','postTags'));
    }

    public function editFirstStep(Request $request, $id)
    {
        if ( !$request->has('category_id') && !$request->has('menu_id') ) {
            return back()->withErrors(['cat_menu' => ['Choose cateogry or menu']])->withInput();
        }

        $this->validate($request,Post::$firstrules);

        session()->put('inputs', $request->except('token'));
        
        return redirect()->route('post.editfinalstep', ['id' => $id]);
    }

    public function editFinalStep($id)
    {
        $post = Post::findOrFail($id);
        $thumbnailPath = $this->thumbnailPath;
        return view('backend.posts.editFinal',compact('post','thumbnailPath'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!session()->has('inputs')) {
            return redirect()->back();
        }
        
        $inputs = session()->get('inputs');

        foreach ($inputs as $key => $value) {
            $request->request->add([$key=>$value]);
        }   

        if ( !$request->has('category_id') && !$request->has('menu_id') ) {
            return back()->withErrors(['cat_menu' => ['Choose cateogry or menu']])->withInput();
        }

        if ($request->hasFile('image')) {
            $this->validate($request,Post::$rulesWithImage);
        }
        else {
            $this->validate($request,Post::$rules);;
        }

        $tag_id = $this->tag_check($request->input('tag_id'));
        
        $post = Post::findOrFail($id);

        $post->update($request->all());

        if ($request->hasFile('image')) {           
            $this::updateImage($request,$post);
        }

        $post->tags()->detach();
        $post->tags()->attach($tag_id);
        
        if ($request->has('category_id')) {
            $post->categories()->detach();
            $post->categories()->attach($request->input('category_id'));
        }

        if ($request->has('menu_id')) {
            $post->menus()->detach();
            $post->menus()->attach($request->input('menu_id'));
        }

        alert()->success('Post', 'Post Edited!');

        return redirect()->route('post.show',['prefix'=>$post->prefix]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        Post::destroy($id);

        alert('Success','Post Deleted');

        return redirect()->back();
    }

    public function tag_check($tags)
    {
        $tag_all = Tag::pluck('id','name')->toArray();

        foreach ($tags as $key => $tag) {
            if (array_key_exists($tag, $tag_all))
            {
                $id[] = $tag_all[$tag];
            }
            else
            {
                $tag_created = new Tag();
                $tag_created->name = $tag;
                $tag_created->save();
                $id[] = $tag_created->id ;
            }
        }
        return $id;
    }
    
    private function generateRandomString($length = 5) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    private function storeImage($request, $product)
    {
        $this->setImageDefaultsFromConfig('marketingImage');
        
        $marketingImage = new MarketingImage([
            'image_name'        =>  $this::generateRandomString().'-'. mt_rand(10,10000),
            'post_id'        => $product->id,
            'image_extension'   => $request->file('image')->getClientOriginalExtension(),
            ]);
        
        $marketingImage->save();

        // get instance of file

        $file = $this->getUploadedFile();

        // pass in the file and the model

        $this->saveImageFiles($file, $marketingImage);
    }


    private function updateImage($request, $post)
    {
        if ($post->picture()->first()) {
            $marketingImage = MarketingImage::find($post->picture()->first()->id);
            // if file, we have additional requirements before saving
            if ($this->newFileIsUploaded()) {
                $this->deleteExistingImages($marketingImage);
                $this->setNewFileExtension($request, $marketingImage);
            }

            $marketingImage->save();
            // check for file, if new file, overwrite existing file
            if ($this->newFileIsUploaded()){
                $file = $this->getUploadedFile();
                $this->saveImageFiles($file, $marketingImage);
            }
        }
        else
        {
            $this::storeImage($request,$post);
        }
    }

     /**
     * @param EditImageRequest $request
     * @param $marketingImage
     */

     private function setNewFileExtension($request, $marketingImage)
     {
        $marketingImage->image_extension = $request->file('image')->getClientOriginalExtension();
    }

    /**
     * @param EditImageRequest $request
     * @param $marketingImage
     */

    private function setUpdatedModelValues(EditImageRequest $request, $marketingImage)
    {
        $marketingImage->is_active = $request->get('is_active');
        $marketingImage->is_featured = $request->get('is_featured');
    }
}
