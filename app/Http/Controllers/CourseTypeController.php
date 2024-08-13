<?php

namespace App\Http\Controllers;

use App\Models\CourseType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class CourseTypeController extends Controller
{

    public function index()
    {
        $courseType = CourseType::all();
        return view('CourseType.index', ['courseType' => $courseType]);
    }

    public function getAllCourseType(Request $request)
    {
        $query = DB::table('course_type')
            ->select('id', 'name', 'status', 'thumbnail');
        // Apply search filter if provided
        if ($request->has('search') && !empty($request->search['value'])) {
            $searchValue = $request->search['value'];
            $query->where(function ($q) use ($searchValue) {
                $q->where('name', 'like', '%' . $searchValue . '%')
                    ->orWhere('status', 'like', '%' . $searchValue . '%');
            });
        }

        $totalCount = $query->count();

        $filteredCount = $query->count();

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

        return response()->json([
            'draw' => $request->draw,
            'recordsTotal' => $totalCount,
            'recordsFiltered' => $filteredCount,
            'data' => $data,
        ]);
    }


    public function create()
    {
        return view('CourseType.create');
    }


    public function store(Request $request)
    {
        $req = $request->all();
    
        $rules = [
            'name' => 'required|unique:course_type,name',
            'status' => 'required',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate the image
        ];
    
        $customMessages = [
            'name.required' => 'Name is required.',
            'name.unique' => 'This name is already taken.',
            'status.required' => 'Status is required.',
            'thumbnail.required' => 'Thumbnail is required.',
            'thumbnail.image' => 'The file must be an image.',
            'thumbnail.mimes' => 'Only jpeg, png, jpg, and gif images are allowed.',
            'thumbnail.max' => 'The image size must be less than 2MB.',
        ];
    
        $validator = Validator::make($req, $rules);
        $validator->setCustomMessages($customMessages);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'data' => $validator->errors(),
            ]);
        }
    
        // Handle file upload
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('courseTypethumbnails', $fileName, 'public'); 
        } else {
            $filePath = null; 
        }
    
        $courseType = new CourseType();
        $courseType->name = $request->name;
        $courseType->thumbnail = $filePath; // Save the file path
        $courseType->status = $request->status; // Use the status from the request
        $courseType->create_by = Auth::user()->id;
        $courseType->create_date = Carbon::now();
        $courseType->save();
    
        // Return a success response
        return response()->json([
            'code' => '200',
            'status' => 'Success',
            'msg' => $request->name . ' Added Successfully',
            'routeUrl' => url('CourseType'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */


public function update(Request $request, $id)
{
    $req = $request->all();

    // Get the existing course type
    $courseType = CourseType::findOrFail($id);

    $rules = [
        'name' => [
            'required',
            Rule::unique('course_type', 'name')->ignore($courseType->id),
        ],
        'status' => 'required',
        'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Validate the image (nullable if no new image is provided)
    ];

    $customMessages = [
        'name.required' => 'Name is required.',
        'name.unique' => 'This name is already taken.',
        'status.required' => 'Status is required.',
        'thumbnail.image' => 'The file must be an image.',
        'thumbnail.mimes' => 'Only jpeg, png, jpg, and gif images are allowed.',
        'thumbnail.max' => 'The image size must be less than 2MB.',
    ];

    $validator = Validator::make($req, $rules);
    $validator->setCustomMessages($customMessages);

    if ($validator->fails()) {
        return response()->json([
            'status' => 'error',
            'data' => $validator->errors(),
        ]);
    }

    // Handle file upload if a new thumbnail is provided
    if ($request->hasFile('thumbnail')) {
        // Delete the old thumbnail if exists
        if ($courseType->thumbnail && Storage::disk('public')->exists($courseType->thumbnail)) {
            Storage::disk('public')->delete($courseType->thumbnail);
        }

        // Store the new thumbnail
        $file = $request->file('thumbnail');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $filePath = $file->storeAs('courseTypethumbnails', $fileName, 'public');
    } else {
        $filePath = $courseType->thumbnail; // Keep the old thumbnail
    }

    // Update course type details
    $courseType->name = $request->name;
    $courseType->thumbnail = $filePath; // Save the file path (new or old)
    $courseType->status = $request->status; // Update the status
    $courseType->update_by = Auth::user()->id;
    $courseType->update_date = Carbon::now();
    $courseType->save();

    // Return a success response
    return response()->json([
        'code' => '200',
        'status' => 'Success',
        'msg' => $request->name . ' Updated Successfully',
        'routeUrl' => url('CourseType'),
    ]);
}



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit($id)
    {
        $courseType = CourseType::findOrFail($id);

        return view('courseType.edit', ['courseType' => $courseType]);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        try {
            $CourseType = CourseType::find($id);
          
            Storage::disk('public')->delete(str_replace('/storage/', '', $CourseType->thumbnail));
            $CourseType->delete();
            return json_encode(array(
                "statusCode" => 200
            ));
        } catch (\Exception $e) {

            return json_encode(array(
                "statusCode" => 400,
                "statusMsg" => $e->getMessage()
            ));;
        }
    }
}
