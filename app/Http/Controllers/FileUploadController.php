<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\Storage;
use DataTables;
use Illuminate\Support\Facades\DB;

class FileUploadController extends Controller
{
    public function index()
    {
        $files = File::all();

        return view('fileUpload.index', ['files' => $files]);
    }
    public function getAllFiles(Request $request)
    {
        if ($request->ajax()) {
            $query = DB::table('files')
                ->select('id', 'name', 'filetype', 'url');

            // Apply search filter if provided
            if ($request->has('search') && !empty($request->search['value'])) {
                $searchValue = $request->search['value'];
                $query->where(function ($q) use ($searchValue) {
                    $q->where('name', 'like', '%' . $searchValue . '%')
                        ->orWhere('filetype', 'like', '%' . $searchValue . '%');
                });
            }

            // Get total count before filtering
            $totalCount = $query->count();

            // Apply ordering
            if ($request->has('order')) {
                $orderColumnIndex = $request->order[0]['column'];
                $orderDir = $request->order[0]['dir'];
                $orderColumn = $request->columns[$orderColumnIndex]['data'];
                $query->orderBy($orderColumn, $orderDir);
            }

            // Apply pagination
            $query->skip($request->input('start', 0))
                ->take($request->input('length', 10));

            // Fetch data
            $data = $query->get();

            // Return JSON response
            return response()->json([
                'draw' => $request->draw,
                'recordsTotal' => $totalCount,
                'recordsFiltered' => $totalCount,
                'data' => $data,
            ]);
        }
    }



    public function create()
    {
        return view('fileUpload.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:jpeg,png,mp3,mp4,mov,avi|max:5120',
        ]);
        // $fileType = $requesst->file->getClientOriginalExtension();
        $fileName = $request['name'] . '.' . $request->file->getClientOriginalExtension();
        $fileSeletor = $request['type'];
        if ($fileSeletor == 'Image') {
            $filePath = $request->file->storeAs('image', $fileName, 'public');
        } elseif ($fileSeletor == 'Audio') {
            $filePath = $request->file->storeAs('audio', $fileName, 'public');
        } else {
            $filePath = $request->file->storeAs('video', $fileName, 'public');
        }
        $file = new File();
        $file->name = $request['name'];
        $file->filetype =  $request['type'];
        $file->url = '/storage/' . $filePath;
        $file->save();

        return back()
            ->with('success', 'File uploaded successfully.');
    }
    public function show(File $file)
    {
        return view('fileUpload.show', ['file' => $file]);
    }

    public function edit($id)
    {
        $file = File::find($id);
        // return $id;
        return view('fileUpload.edit', ['file' => $file]);
    }




    public function update(Request $request, $id)
    {
        $file = File::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'filetype' => 'required|string|in:Image,Audio,Video',
            'file' => 'nullable|max:5120', // Remove the 'mimes' rule
        ]);

        $file->name = $request['name'];
        $file->filetype = $request['filetype'];

        if ($request->hasFile('file')) {
            $fileName = $request['name'] . '.' . $request->file->getClientOriginalExtension();
            $fileSeletor = $request['filetype'];

            if ($fileSeletor == 'Image') {
                $filePath = $request->file->storeAs('image', $fileName, 'public');
            } elseif ($fileSeletor == 'Audio') {
                $filePath = $request->file->storeAs('audio', $fileName, 'public');
            } else {
                $filePath = $request->file->storeAs('video', $fileName, 'public');
            }

            // Delete the old file
            if (file_exists(public_path($file->url))) {
                unlink(public_path($file->url));
            }

            $file->url = '/storage/' . $filePath;
        }

        $file->save();

        return back()->with('success', 'File updated successfully.');
    }


    public function destroy($id)
    {
        $file = File::findOrFail($id);

        // Delete file from storage
        // Assuming you have stored the files in the public storage folder
        $filePath = public_path($file->url);
        Storage::disk('public')->delete(str_replace('/storage/', '', $file->url));

        $file->delete();

        // Return response if needed (not required for this Ajax example)
        return response()->json(['success' => 'File deleted successfully.']);
        //  return redirect()->route('Files.index')
        // ->with('success', 'File deleted successfully.');
    }

    public function courses(){
        $courses = Course::all();

        return view('student.course', ['courses' => $courses]);
    }
}
