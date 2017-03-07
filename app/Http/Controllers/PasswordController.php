<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Support\Facades\Auth;

class PasswordController extends Controller
{
    /**
     * Show the form for changing password
     *
     * @return \Illuminate\Http\Response
     */
    public function showChangePasswordForm()
    {
        return view('backend.password.changemypassword');
    }

    /**
     * Store a new password in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateChangePassword(ChangePasswordRequest $request)
    {
        Auth::user()->password = bcrypt($request->password);

        Auth::user()->save();

        alert()->success('Success', 'Password Changed');

        return redirect()->back();
    }
}
