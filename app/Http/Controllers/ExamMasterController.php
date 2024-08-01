<?php

namespace App\Http\Controllers;

use App\Models\QuestionConfig\QuestionOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExamMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function showResult($id)
    {
        $exam_data = DB::select("SELECT exm.id, exm.student_id, exm.subject_id, exm.paper_id, exm.chapter_id,
        ans.status,ans.answer_id,ans.answer_id,ans.solution_id,
        qus.question_name,qus.id qus_id
        FROM exam_master exm,answers ans,questions qus
        WHERE exm.id = ans.exam_id
        AND ans.question_id = qus.id 
        AND exm.id = $id;");


        $questionanswers = collect();

        foreach ($exam_data as $question) {
            // dd($question->qus_id);
            $questionanswersoption = QuestionOption::where('status', 'A')
                ->where('questions_id', $question->qus_id)
                ->get();
            $questionanswers = $questionanswers->concat($questionanswersoption);
            // dd($questionanswers);
          
        }



        return view('student.showResult',['questionanswers'=> $questionanswers,'exam_data'=> $exam_data]) ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
