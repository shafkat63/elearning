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

    // public function store(Request $request)
    // {

    //     $req = $request->all();
    //     $rules = [
    //         'name' => 'required',
    //         'status' => 'required',
    //     ];
    //     $customMessages = [
    //         'name.required' => 'Subject Name is required.',
    //         'status.required' => 'status is required.',
    //     ];
    //     $validator = Validator::make($req, $rules);
    //     $validator->setCustomMessages($customMessages);
    //     if ($validator->fails()) {
    //         return response()->json([
    //             'status' => 'error',
    //             'data' => $validator->errors(),
    //         ]);
    //     }
    //     $courseType = new CourseType();
    //     $courseType->name = $request->name;
    //     $courseType->thumbnail = 'thumbnail';
    //     $courseType->status = 'A';
    //     $courseType->create_by = Auth::user()->id;
    //     $courseType->create_date = Carbon::now();
    //     $courseType->save();
    //     return response()->json([
    //         'code' => '200',
    //         'status' => 'Success',
    //         'msg' => $request->name . ' Added Successfully',
    //         'routeUrl' => url('CourseType'),
    //     ]);
    // }

    // public function store(Request $request)
    // {
    //     $req = $request->all();

    //     $rules = [
    //         'name' => 'required|unique:course_type,name',
    //         'status' => 'required',
    //     ];

    //     $customMessages = [
    //         'name.required' => ' Name is required.',
    //         'name.unique' => 'This name is already taken.',
    //         'status.required' => 'Status is required.',
    //     ];

    //     $validator = Validator::make($req, $rules);
    //     $validator->setCustomMessages($customMessages);

    //     if ($validator->fails()) {
    //         return response()->json([
    //             'status' => 'error',
    //             'data' => $validator->errors(),
    //         ]);
    //     }

    //     $courseType = new CourseType();
    //     $courseType->name = $request->name;
    //     $courseType->thumbnail = 'thumbnail';
    //     $courseType->status = 'A';
    //     $courseType->create_by = Auth::user()->id;
    //     $courseType->create_date = Carbon::now();
    //     $courseType->save();

    //     // Return a success response
    //     return response()->json([
    //         'code' => '200',
    //         'status' => 'Success',
    //         'msg' => $request->name . ' Added Successfully',
    //         'routeUrl' => url('CourseType'),
    //     ]);
    // }

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
  
    //  public function update(Request $request, $id)
    //  {
    //      // Define validation rules
    
     
    //      // Custom validation messages
     
     
    //      // Validate request data
   
     
    //      // Find the course type by ID
    //      $course = CourseType::findOrFail($id);
     
    //      // Update fields
    //      $course->name = $request->name;
    //      $course->status = $request->status;
    //      $course->update_by = Auth::user()->id;
    //      $course->update_date = Carbon::now();
     
    //      // Handle file upload for thumbnail
    //      if ($request->hasFile('thumbnail')) {
    //          // Delete the old thumbnail if it exists
    //          if ($course->thumbnail && Storage::exists('public/' . $course->thumbnail)) {
    //              Storage::delete('public/' . $course->thumbnail);
    //          }

           
     
    //          // Store the new thumbnail and update the path
    //          $file = $request->file('thumbnail');
    //          $fileName = time() . '.' . $file->getClientOriginalExtension();
    //          $filePath = $file->storeAs('courseTypethumbnails', $fileName, 'public');
    //          $course->thumbnail = $filePath;
    //      }
     
    //      // Save the updated course type
    //      $course->save();
     
    //      // Return a success response
    //      return response()->json([
    //          'code' => '200',
    //          'status' => 'Success',
    //          'msg' => $request->name . ' Updated Successfully',
    //          'routeUrl' => url('CourseType'),
    //      ]);
    //  }


//     public function update(Request $request, $id)
// {
//     $req = $request->all();
    
//     $rules = [
//         'name' => 'required|unique:course_type,name,' . $id,
//         'status' => 'required',
//         'thumbnail' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate the image
//     ];
    
//     $customMessages = [
//         'name.required' => 'Name is required.',
//         'name.unique' => 'This name is already taken.',
//         'status.required' => 'Status is required.',
//         'thumbnail.image' => 'The file must be an image.',
//         'thumbnail.mimes' => 'Only jpeg, png, jpg, and gif images are allowed.',
//         'thumbnail.max' => 'The image size must be less than 2MB.',
//     ];
    
//     $validator = Validator::make($req, $rules);
//     $validator->setCustomMessages($customMessages);
    
//     if ($validator->fails()) {
//         return response()->json([
//             'status' => 'error',
//             'data' => $validator->errors(),
//         ]);
//     }
    
//     // Fetch the existing course type
//     $courseType = CourseType::find($id);

//     if (!$courseType) {
//         return response()->json([
//             'status' => 'error',
//             'data' => ['name' => 'Course type not found.'],
//         ]);
//     }

//     // Handle file upload if present
//     if ($request->hasFile('thumbnail')) {
//         $file = $request->file('thumbnail');
//         $fileName = time() . '.' . $file->getClientOriginalExtension();
//         $filePath = $file->storeAs('courseTypethumbnails', $fileName, 'public');
        
//         // Optionally, delete the old thumbnail
//         if ($courseType->thumbnail) {
//             Storage::disk('public')->delete($courseType->thumbnail);
//         }

//         $courseType->thumbnail = $filePath; // Save the new file path
//     }

//     // Update the other fields
//     $courseType->name = $request->name;
//     $courseType->status = $request->status;
//     $courseType->update_by = Auth::user()->id;
//     $courseType->update_date = Carbon::now();
//     $courseType->save();
    
//     // Return a success response
//     return response()->json([
//         'code' => '200',
//         'status' => 'Success',
//         'msg' => $request->name . ' Updated Successfully',
//         'routeUrl' => url('CourseType'),
//     ]);
// }

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
        'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate the image (nullable if no new image is provided)
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

     

     // public function update(Request $request, $id)
    // {
    //     $validatedData = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'status' => 'required|in:active,inactive',
    //     ]);

    //     $course = CourseType::findOrFail($id);
    //     $course->name = $validatedData['name'];
    //     $course->thumbnail = 'thumbnail';
    //     $course->status = $validatedData['status'];
    //     $course->update_by = Auth::user()->id;
    //     $course->update_date = Carbon::now();

    //     $course->save();

    //     return response()->json([
    //         'code' => '200',
    //         'status' => 'Success',
    //         'msg' => $request->name . ' Updated Successfully',
    //         'routeUrl' => url('CourseType'),
    //     ]);
    // }


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
        //
    }
}
