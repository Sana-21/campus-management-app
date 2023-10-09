<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\assignment;
use App\Models\Course;
use App\Models\File;
use Illuminate\Support\Facades\Auth;

class AssignmentController extends Controller
{

    public function index($course_id)
    {
        //

        if (!Auth::check())
            return view('login');
        $assignments = Assignment::where('course_id', $course_id)->orderby('created_at', 'desc')->get();
        return view('classwork', ['course_id' => $course_id, 'assignments' => $assignments]);
    }

    public function create($course_id)
    {
        //
        if (!Auth::check() || Auth::user()->role_id != 2)
            return view('login');
        return view('assignment.assignmentform', ['course_id' => $course_id]);
    }

    public function store(Request $request, $course_id)
    {

        $validatedData = $request->validate([
            'assignment-title' => 'required|string|max:255',
            'assignment-description' => 'nullable|string',
            'duetime' => 'nullable|date',
            'assignment-file' => 'nullable|file',
        ]);

        $teacher_id = Auth::user()->id;
        $file = null;
        if ($request->hasFile('assignment-file')) {
            $uploadedFile = $request->file('assignment-file');
            $filePath = $uploadedFile->store('desktop/uploads');

            $fullPath = storage_path('app/' . $filePath);
            $fileName = basename($fullPath);
            $file = File::create([
                'file_path' => $filePath,
                'name' => $fileName,
            ]);
        }
        Assignment::create([
            'title' => $validatedData['assignment-title'],
            'description' => $validatedData['assignment-description'],
            'due_date' => $validatedData['duetime'],
            'file_id' => $file ? $file->id : null,
            'course_id' => $course_id,
            'teacher_id' => $teacher_id
        ]);

        return redirect()->route('classwork', ['course_id' => $course_id])->with('success', 'Assignment was posted successfully');

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
    public function destroy($id)
    {
        //
    }
}