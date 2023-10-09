<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Models\Course;
use App\Models\enroll;
use App\Models\teacher_course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class EnrollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        //
        if(Auth::user() && Auth::user()->role_id == 3)
        {
            $s_id = Auth::user()->id;
            $courses = Course::whereHas('students', function ($query) use ($s_id) {
                $query->where('enrolls.student_id', $s_id);
            })->get();
            return view('courseMenu', ['courses' => $courses]);
        }
        return view('login');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
       
        $coursesWithTeachers = Course::with('teacher')->get();
        if (Auth::user() && Auth::user()->role_id == 3) {
            return view('enroll', ['coursesWithTeachers' => $coursesWithTeachers]);
        }
        return view('login');
       
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($course_id)
    {
        $s_id = Auth::user()->id;

        $enrollment = enroll::where('student_id', $s_id)
            ->where('course_id', $course_id)
            ->first();

        if ($enrollment) {
            return redirect()->route('enroll')->with('failure', 'You are already registered in this course');
        }

        enroll::create([
            'student_id' => $s_id,
            'course_id' => $course_id,
        ]);

        return redirect()->route('enroll')->with('success', 'You registered for this course successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\enroll  $enroll
     * @return \Illuminate\Http\Response
     */
    public function show($course_id)
    {
        //
        if (!(Auth::check()))
        return view('login');
        $student_ids = enroll::where('course_id', $course_id)->pluck('student_id')->toArray();
        $students = user::whereIn('id', $student_ids)->get();
        return view('courseStudents', ['users' => $students, 'course_id' => $course_id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\enroll  $enroll
     * @return \Illuminate\Http\Response
     */
    public function edit(enroll $enroll)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\enroll  $enroll
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, enroll $enroll)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\enroll  $enroll
     * @return \Illuminate\Http\Response
     */
    public function destroy(enroll $enroll)
    {
        //
    }
}