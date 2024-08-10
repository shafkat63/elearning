<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseType;
use App\Models\User;
use Illuminate\Http\Request;

class StudentCourseController extends Controller
{
    public function index()
    {
        return view('student.course');
    }

    public function courses()
    {
        $courses = Course::all();

        return view('student.course', ['courses' => $courses]);
    }

    public function getCourses($name)
    {

        $course = Course::where('name', $name)->first();
        $coursetype = CourseType::where('id', $course->course_type)->pluck('name')->first();
        $creator = User::where('id', $course->create_by)->pluck('name')->first();
        // dd($coursetype);
        return view('student.singlecourse', ['course' => $course, 'coursetype' => $coursetype,
                       'creator'=>$creator ]);
    }
}
