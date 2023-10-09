<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\teacher_course;
use App\Models\announcement;
use Illuminate\Support\Facades\Auth;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($course_id)
    {
        //
        $messages = Announcement::with('author')->where('course_id', $course_id)->get();
        return view('detailcourseview', ['course_id' => $course_id, 'messages' => $messages]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $course_id)
    {
        $announcement = $request->input('announcement');
        $user_id = Auth::user()->id;
        announcement::create([
            'user_id' => $user_id,
            'course_id' => $course_id,
            'message' => $announcement,
        ]);

        $messages = Announcement::with('author')->where('course_id', $course_id)->get();
        return view('detailcourseview', ['course_id' => $course_id, 'messages' => $messages]);

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
        $message = announcement::findOrFail($id);
        $course_id = announcement::where('id', $id)->pluck('course_id')->first();
        $message->delete();
        return redirect()->route('coursedetail', ['course_id' => $course_id])->with('success', 'Announcement has been deleted successfully');

    }
}