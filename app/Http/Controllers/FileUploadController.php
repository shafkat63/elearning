<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;

class FileUploadController extends Controller
{
    public function index()
    {
        return view('upload');
    }

    public function store(Request $request)
    {
       
         $request->validate([
            'file' => 'required|mimes:jpeg,png,mp3,mp4,mov,avi|max:2048', 
        ]);


        // $fileType = $request->file->getClientOriginalExtension();
       
        $fileName = $request['name'] . '.' . $request->file->getClientOriginalExtension();
       $fileSeletor= $request['type'] ;
        if ($fileSeletor == 'Image') {
            $filePath = $request->file->storeAs('image', $fileName, 'public');
        } elseif ($fileSeletor == 'Audio') {
            $filePath = $request->file->storeAs('audio', $fileName, 'public');
        }else{
            $filePath = $request->file->storeAs('video', $fileName, 'public');
        }

        $file = new File();
        $file->name= $request['name'];
        $file->filetype =  $request['type'];
        $file->url ='/storage/'.$filePath;
        $file->save();

        return back()
            ->with('success', 'File uploaded successfully.');
            
    }
}
