<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class ChangePasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!(Auth::check()))
        return view('login');

        return view('changepassword');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = Auth::user();
        if(!(Hash::check($request->old_password, $user->password))){
            return redirect()->route('resetpassword')->with('failure','Old Password is not correct');
        }
        
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|string|min:8',
            'new_password_confirmation' => 'required|string|same:new_password',

        ],[
            'new_password_confirmation.same' => 'Password confirmation does not match.',
        ]);
        
        $user->fill([
            'password' => Hash::make($request->input('new_password')),
        ])->save();
        
    
        return redirect()->route('resetpassword')->with('success','Your password has been changed successfully');
    }



  
}
