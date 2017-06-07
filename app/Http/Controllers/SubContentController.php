<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\SubContent;
use App\Traits\ManagesImages;
use App\SubcontentImage;

class SubContentController extends Controller
{
    use ManagesImages;

    public function __construct()
    {
        $this->setImageDefaultsFromConfig('subcontentImage');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($post_id)
    {
        return 'post_id' . $post_id;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($post_id)
    {
        $post = Post::findOrFail($post_id);
        return view('backend.subcontent.create',compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($post_id,Request $request)
    {
        if ($request->hasFile('image')) {
            $this->validate($request,SubContent::$rulesWithImage);
        }
        else {
            $this->validate($request,SubContent::$rules);;
        }

        $subContent = SubContent::create($request->all());

        if ($request->hasFile('image')) {

            $this::storeImage($request,$subContent);
        }

        alert('Success','Sub-content Created');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($post_id,$id)
    {
        SubContent::destroy($id);

        return redirect()->back();
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

    private function storeImage($request, $subContent)
    {
        $this->setImageDefaultsFromConfig('subcontentImage');
        
        $subContentImage = new SubcontentImage([
            'image_name'        =>  $this::generateRandomString().'-'. mt_rand(10,10000),
            'sub_content_id'        => $subContent->id,
            'image_extension'   => $request->file('image')->getClientOriginalExtension(),
            ]);
        
        $subContentImage->save();

        // get instance of file

        $file = $this->getUploadedFile();

        // pass in the file and the model

        $this->saveImageFiles($file, $subContentImage);
    }
}
