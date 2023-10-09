<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($filter = "all")
    {
        if (Auth::check() && Auth::user()->role_id == 1) {

            if ($filter == "all") {
                $users = User::all();
                return view('users', ['users' => $users]);
            } else if ($filter == "faculty") {
                $users = User::where('role_id', '=', 2)->get();
                return view('users', ['users' => $users]);
            } else if ($filter == "students") {
                $users = User::where('role_id', '=', 3)->get();
                return view('users', ['users' => $users]);
            }
        } else
            return view('login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        if (!(Auth::check()))
        return view('login');
        $user = Auth::user();
        return view('profile', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!(Auth::check()))
            return view('login');

        $user = User::where('id', '=', $id)->first();

        if (Auth::user()->role_id == 1) {
            return view('edituser', ['user' => $user]);
        }

        return view('login');

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
        $user = User::where('id', $id)->firstOrFail();
        $user->fill($request->all())->save();

        return redirect()->route('viewusers')->with('success', 'User Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('viewusers')->with('success', 'User Has Been deleted successfully');
    }
}