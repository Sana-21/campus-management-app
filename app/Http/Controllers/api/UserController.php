<?php

namespace App\Http\Controllers\api;
use App\Models\user;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = user::all();
        return response()->json($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       
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
         $user = new user;
         $user->first_name = $request->first_name;
         $user->last_name = $request->last_name;
         $user->email = $request->email;
         $user->address = $request->address;
         $user->password = Hash::make($request->password);
         $user->role_id = $request->role_id;
         $user->gender_id = $request->gender_id;
         $user->phoneNo = $request->phoneNo;
         $user->dob = $request->dob;
         $user->save();
         return response()->json([
             "message" => "User added"
         ] ,201);
 
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
        $user = User::find($id);
        if($user){
            return response()->json($user);
        }
        else 
        {
            return response()->json([
                "message"=>"User not found"
            ], 404);
        }
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
        if(user::where('id', $id)->exists()){
            $user = User::find($id);
            $user->first_name = is_null($request->first_name)  ? $user->first_name : $request->first_name;
            $user->last_name = is_null($request->last_name)  ? $user->last_name : $request->last_name;
            $user->email = is_null($request->email)  ? $user->email : $request->email;
            $user->address = is_null($request->address)  ? $user->address : $request->address;
            $user->gender_id = is_null($request->gender_id)  ? $user->gender_id : $request->gender_id;
            $user->role_id = is_null($request->role_id)  ? $user->role_id : $request->role_id;
            $user->phoneNo = is_null($request->phoneNo)  ? $user->phoneNo: $request->phoneNo;
            $user->dob = is_null($request->dob)  ? $user->dob : $request->dob;
            $user->password = is_null($request->password)  ? $user->password : Hash::make($request->password);
            $user->save();
            return response()->json([
                "message" => "User has been updated"
            ]);

        }
        else return response()->json([
            "message"=>"User not found"
        ], 404);
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
        if(User::where('id', $id)->exists()){
            $user = User::find($id);
            $user->delete();
            return response()->json([
                "message" => "User has been deleted"
            ], 202);
        }else{
            return response()->json([
                "message"=> "User not found"
            ], 404);
        }
    }
}
