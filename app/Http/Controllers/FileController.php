<?php

namespace App\Http\Controllers;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
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
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // //
        // $request->validate([
        //     'file' => 'required|mimes:csv,txt,xlx,xls,pdf|max:2048'
        //     ]);
        //     $fileModel = new File;
        //     if($request->file()) {
        //         $fileName = time().'_'.$request->file->getClientOriginalName();
        //         $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
        //         $fileModel->name = time().'_'.$request->file->getClientOriginalName();
        //         $fileModel->file_path = '/storage/' . $filePath;
        //         $fileModel->save();
        //         return back()
        //         ->with('success','File has been uploaded.')
        //         ->with('file', $fileName);
        //     }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function download($file_id)
    {
        //
        $file = File::where('id', $file_id)->firstOrFail();
        return Storage::download($file->file_path, $file->name);
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
