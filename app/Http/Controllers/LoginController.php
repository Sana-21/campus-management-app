<?php

namespace App\Http\Controllers;

use App\Http\Middleware\PreventBackHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Session;

class LoginController extends Controller
{
    public function index()
    {
        if (!(Auth::check())) {
            return view('login');
        }

        if (Auth::user()->role_id == 1)
            return redirect()->route('course');

        if (Auth::user()->role_id == 2)
            return redirect()->route('home');

        if (Auth::user()->role_id == 3)
            return redirect()->route('enrolledcourses');

    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->first_login === null) {
                $user->update(['first_login' => now()]);
                return redirect()->to('setpassword');

            }
            if (Auth::user()->role_id == 1)
                return redirect()->to('course');
            if (Auth::user()->role_id == 2)
                return redirect()->to('home');
            if (Auth::user()->role_id == 3)
                return redirect()->to('enrolledcourses');
        } else {
            return back()->withErrors([
                'message' => 'The email or password is incorrect, please try again'
            ]);
        }
    }

    public function signOut()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('login');
    }
}