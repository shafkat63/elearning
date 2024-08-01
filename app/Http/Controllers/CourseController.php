<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    //
    public function create()
    {
        $courseTypes= CourseType::all();
        return view('Courses.create',['courseTypes'=>$courseTypes]);
    }
    public function courses()
    {
        $courses = Course::all();

        return view('Courses.index', ['courses' => $courses]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'courseType' => 'required|string|max:255',
            'content' => 'required|string',
            'description' => 'required|string',
            'thumble' => 'required|string|max:255',
            
        ]);


        $course = new Course();
        $course->name = $validatedData['name'];
        $course->course_type = $validatedData['courseType'];
        $course->content = $validatedData['content'];
        $course->description = $validatedData['description'];
        $course->thumble = $validatedData['thumble'];
        $course->status = 'A';
        $course->create_by = Auth::user()->id;
        $course->create_date = Carbon::now(); //

        $course->save();
        return response()->json([
            'code' => '200',
            'status' => 'Success',
            'msg' => $request->name . ' Added Successfully',
            'routeUrl' => url('Course'),
        ]);

        // Redirect with a success message
        // return redirect()->back()->with('success', 'Course added successfully.');
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);
        $courseTypes= CourseType::all();
        return view('courses.edit', ['course'=>$course,'courseTypes'=>$courseTypes ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'courseType' => 'required|string|max:255',
            'content' => 'required|string',
            'description' => 'required|string',
            'thumble' => 'required|string|max:255',
            
        ]);

        $course = Course::findOrFail($id);
        $course->name = $validatedData['name'];
        $course->course_type = $validatedData['courseType'];
        $course->content = $validatedData['content'];
        $course->description = $validatedData['description'];
        $course->thumble = $validatedData['thumble'];
        $course->status = 'A';
        $course->update_by = Auth::user()->id;
        $course->update_date = Carbon::now();

        $course->save();

        return response()->json([
            'code' => '200',
            'status' => 'Success',
            'msg' => $request->name . ' Updated Successfully',
            'routeUrl' => url('Course'),
        ]);
    }


    public function getAllCourses(Request $request)
    {
        $query = DB::table('courses')
            ->select('id', 'name', 'course_type','content','description' );
        if ($request->has('search') && !empty($request->search['value'])) {
            $searchValue = $request->search['value'];
            $query->where(function ($q) use ($searchValue) {
                $q->where('name', 'like', '%' . $searchValue . '%')
                    ->orWhere('course_type', 'like', '%' . $searchValue . '%')
                    ->orWhere('content', 'like', '%' . $searchValue . '%');
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

    public function destroy($id){
        try {
            $course = Course::find($id);
            $course->delete();
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
