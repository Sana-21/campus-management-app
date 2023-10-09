<?php

namespace App\Http\Controllers;

use App\Http\Middleware\PreventBackHistory;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Rules\birthdayrule;
class RegisterController extends Controller
{
    //
    public function create()
    {
        if(Auth::check())
        {
            if(Auth::user()->role_id == 1)
              return view('auth.register');
            else return view('home');
        }
        return view('login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'dob' => ['required', 'date', new birthdayrule],
            'address' => 'required',
            'password' => 'required|min:8',
            'gender_id' => 'required',
            'role_id' => 'required',
            'phoneNo' => 'required|min:13|regex:/^\+92[0-9]{10}$/'

        ]);

        $user = User::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'password' => Hash::make($request->input('password')),
            'role_id' => $request->input('role_id'),
            'gender_id' => $request->input('gender_id'),
            'phoneNo' => $request->input('phoneNo'),
            'dob' => $request->input('dob'),

        ]);
        
        return redirect()->route('viewusers');

    }
}