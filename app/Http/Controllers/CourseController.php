<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Auth::check())
        return view('login');

        if (Auth::check() && Auth::user()->role_id == 1)
        {
            $courses = DB::select('select * from courses');
            return view('courses',['courses'=>$courses]);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!(Auth::check()))
        return view('login');

        if (Auth::user()->role_id == 1)
        {
            return view('addcourse');
        }
        else return view('login');
        
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
        $request->validate([
            'code' => 'required',
            'name' => 'required',
        ]);
        
        Course::create($request->only('name','code'));
        return redirect()->route('course')->with('success','Course Has Been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit($code, $name)
    {
        if(!(Auth::check()))
        return view('login');

        if (Auth::user()->role_id == 1)
        {
            return view('editcourse', ['code'=>$code, 'name'=>$name]);
        }

        else if(Auth::user()->role_id == 2)
             return redirect()->route('dashboard');
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $name)
    {
        //
        $request->validate([
            'code' => 'required',
            'name' => 'required',
        ]);

        $course = Course::where('name', $name)->firstOrFail();
        $course->fill($request->all())->save();

        return redirect()->route('course')->with('success','Course Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
       $course = Course::findOrFail($id);
       $course->delete();
       return redirect()->route('course')->with('success','Course has been deleted successfully');
    }
}
