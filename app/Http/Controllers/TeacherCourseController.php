<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\teacher_course;
use App\Models\course;
use App\Models\user;
use Illuminate\Support\Facades\Auth;
class teacherCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!(Auth::check()))
        return view('login');
        $teachers = User::with('courses')->get();
        return view('viewteachers', ['teachers' => $teachers]);
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
        $courses = Course::all();
        $teachers = User::where('role_id', '=', '2')->get();
        return view('addTeacher', ['courses' => $courses, 'teachers' => $teachers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'teacher_id' => 'required',
            'course_id' => 'required',
        ]);


        $t_id = $validatedData['teacher_id'];
        $c_id = $validatedData['course_id'];

        $enrollment = teacher_course::where('teacher_id', $t_id)
            ->where('course_id', $c_id)
            ->first();

        if ($enrollment) {
            return redirect()->route('viewteachers')->with('failure', 'Teacher is already registered for this course');
        }

        teacher_course::create($validatedData);

        return redirect()->route('viewteachers')->with('success', 'Teacher registered for this course successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // if (!(Auth::check()))
        // return view('login');

        $teacher_id = Auth::user()->id;
        $course_ids = teacher_course::where('teacher_id', $teacher_id)->pluck('course_id')->toArray();
        $courses = course::whereIn('id', $course_ids)->get();
        return view('courseMenu', ['courses' => $courses]);
    }
    
    public function hello()
    {
        $users = User::all();
        return response()->json($users);
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($t_id, $c_id)
    {
        //
        $course = teacher_course::where('teacher_id', $t_id)
            ->where('course_id', $c_id)
            ->first();
        $course->delete();
        return redirect()->route('viewteachers')->with('success', 'Course has been deleted successfully');
    }
}