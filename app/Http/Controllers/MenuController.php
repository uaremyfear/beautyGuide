<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::all();

        return view('backend.menu.index',compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.menu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,Menu::$rules);

        $request->request->add(['menu_link' => $this->formatLink(strtolower($request->menu_name))]);

        Menu::create($request->all());

        alert('Success','Create Done');

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
        $menu = Menu::findOrfail($id);

        return view('backend.menu.edit',compact('menu'));
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
        $this->validate($request,Menu::$editRules);

        $menu = Menu::findOrfail($id);

        $request->request->add(['menu_link' => $this->formatLink(strtolower($request->menu_name))]);

        $menu->update($request->all());

        alert('Success','Update Done');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = Menu::findOrfail($id);

        if(count($menu->categories))
        {
            alert('Error','This Menu has categories, Cant Delete');
        }
        else
        {
            Menu::destroy($id);
            alert('Success','Deleted');
        }        
        return redirect()->back();
    }

    public function formatLink($string) 
    {   
        $string =  rtrim($string);
        $string = str_replace(' ', '-',$string); // Replaces all spaces with hyphens.
        return $string; // Removes special chars.
    }
}
