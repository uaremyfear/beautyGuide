<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['super.admin']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('backend.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $roles = Role::pluck('role_name','id');

        $roles = Role::all();

        return view('backend.user.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
                'name' => 'required|max:255',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|min:6|confirmed',
            ]);

        $user = User::create(['name' => $request->name,
                     'email' => $request->email,
                     'password' => bcrypt($request->password)]);

        if(count($request->role) > 0 ){
            $user->roles()->sync($request->role);
        }

        alert()->success('Success', 'You create a user');

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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        $roles = $user->roles()->pluck('role_id');       

        $allRoles = Role::whereNotIn('id',$roles)->get();

        return view('backend.user.edit',compact('user','allRoles'));
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
        $this->validate($request,[
                'name' => 'required|max:255',
                'email' => 'required|email|max:255'
            ]);

        $user = User::findOrFail($id);

        $user->name =  $request->name;
        $user->email = $request->email;
        $user->save();                     

        if(count($request->role) > 0 ){
            $user->roles()->sync($request->role);
        }
        else
        {
            $user->roles()->sync([]);
        }
        

        alert()->success('Success', 'User update done');

        return redirect()->to('/gotg/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Change the specified user password.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changePassword($id)
    {
        $user = User::findOrFail($id);

        return view('backend.user.changePassword',compact('user'));
    }

    /**
     * Change the specified user password.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePassword($id, Request $request)
    {
        $this->validate($request,[
                'password' => 'required|min:6|confirmed',
            ]);

        $user = User::findOrFail($id);

        $user->password = bcrypt($request->password);

        alert()->success('Success', 'Change Password Done');

        return redirect()->to('/gotg/user');
    }
}
