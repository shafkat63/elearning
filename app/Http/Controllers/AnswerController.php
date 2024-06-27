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

    public function handleFormSubmission()
    {
        return view('student.form_submission_response');
    }


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
        //    if (!isset($submittedAnswers['answers']) || empty($submittedAnswers['answers'])) {
        //         return redirect()->back()->withInput()->withErrors(['answers' => 'Please select answers for all questions.']);
        //     }
        $answeroptions = array_values($submittedAnswers["answers"]);
dd( $answeroptions);
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
        return redirect('submissionresponse');


        // Now $results array contains the correctness of each submitted answer

    }

    // public function store(Request $request)
    // {
    //     // Validate the form inputs to ensure all required fields are present
    //     // $request->validate([
    //     //     'answers.*' => 'required',
    //     // ]);

    //     // Retrieve all options
    //     $options = QuestionOption::all();

    //     $submittedAnswers = $request->all();

    //     $answerOptions = array_values($submittedAnswers["answers"]);

    //     // Initialize an array to store results
    //     $results = [];


    //     foreach ($answerOptions as $answerOption) {

    //         $questionId = $options->where('id', $answerOption)->pluck('questions_id')->first();

    //         $questionOptions = $options->where('questions_id', $questionId);

    //         $correctOption = $questionOptions->where('optionanswer', 1)->pluck('id')->first();

    //         $isCorrect = ($correctOption && $answerOption == $correctOption) ? 1 : 0;

    //         $results[$answerOption] = $isCorrect ? 'correct' : 'incorrect';

    //         Answer::create([
    //             'student_id' => auth()->id(), 
    //             'status' => $isCorrect ? 'correct' : 'incorrect',
    //             'question_id' => $questionId,
    //             'answer_id' => $answerOption,
    //             'solution_id' => $correctOption,
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ]);
    //     }

    //     // Redirect to the submission response page after processing
    //     return redirect('submissionresponse');
    // }



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
