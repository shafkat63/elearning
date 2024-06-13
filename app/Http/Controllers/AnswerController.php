<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\QuestionConfig\Question;
use App\Models\QuestionConfig\QuestionOption;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $answers = Answer::all();
        return view('student.answer', compact('answers'));
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

        // Retrieve all options
        $options = QuestionOption::all();

        // Retrieve submitted answers
        $submittedAnswers = $request->all();

        $answeroptions = array_values($submittedAnswers["answers"]);



        // Loop through each question
        foreach ($answeroptions as $answeroption) {

       
            $questionOptions = $options->where('id', $answeroption);
           
            // $questionId = $options->where('id', $answeroption)->pluck('questions_id')->first();
            $questionId = $options->where('id', $answeroption)->pluck('questions_id')->first();
            $questionOptions = $options->where('questions_id', $questionId);
            // dd($questionOptions);
            $correctOption = $questionOptions->where('optionanser', 1)->pluck('id')->first();
            // dd($correctOption);
         
            if (isset($answeroption) && $correctOption && $answeroption == $correctOption) {
                // If the submitted answer is correct
                $results[$answeroption] = 1;
                $isCorrect = 1;
            } else {
                // If the submitted answer is incorrect or not provided
                $results[$answeroption] = 0;
                $isCorrect = 0;
            }
            // dd($isCorrect);

            $results[$answeroption] = $isCorrect ? 'correct' : 'incorrect';
           
            Answer::create([
                'student_id' => auth()->id(), // Assuming you have a logged-in student
                'status' => $isCorrect ? 'correct' : 'incorrect',
                'question_id' => $questionId,
                'answer_id' => $answeroption,
                'solution_id' => $correctOption,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        dd($results);
      

        // Now $results array contains the correctness of each submitted answer

    }


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

    public function questionAnswerCheck(Request $request)
    {
    }
}
