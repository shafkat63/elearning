<?php

namespace App\Http\Controllers;

use App\Models\CourseType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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

    public function store(Request $request)
    {
        $req = $request->all();

        $rules = [
            'name' => 'required|unique:course_type,name',
            'status' => 'required',
        ];

        $customMessages = [
            'name.required' => ' Name is required.',
            'name.unique' => 'This name is already taken.',
            'status.required' => 'Status is required.',
        ];

        $validator = Validator::make($req, $rules);
        $validator->setCustomMessages($customMessages);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'data' => $validator->errors(),
            ]);
        }

        $courseType = new CourseType();
        $courseType->name = $request->name;
        $courseType->thumbnail = 'thumbnail';
        $courseType->status = 'A';
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
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
        ]);

        $course = CourseType::findOrFail($id);
        $course->name = $validatedData['name'];
        $course->thumbnail = 'thumbnail';
        $course->status = $validatedData['status'];
        $course->update_by = Auth::user()->id;
        $course->update_date = Carbon::now();

        $course->save();

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
        //
    }
}
