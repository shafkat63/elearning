<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Answer;
use App\Models\Papers;
use App\Models\Subjects;
use App\Models\ExamMaster;
use Illuminate\Http\Request;

use App\Models\QuestionConfig\Chapter;
use App\Models\QuestionConfig\Question;
use App\Models\QuestionConfig\QuestionOption;
use Illuminate\Support\Facades\DB;

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
        $examMaster = ExamMaster::create([
            'student_id' => auth()->id(),
            'subject_id' => $request->subject_id,
            'paper_id' => $request->paper_id,
            'chapter_id' => $request->chapter_id,
            'status' => 'A',
            'create_by' => auth()->id(),
            'create_date' => now(),
        ]);
        $exam_id = $examMaster->id;

        $options = QuestionOption::all();
        $questions = Question::all();
        $submittedAnswers = $request->all();

        $answeroptions = array_values($submittedAnswers["answers"]);
        $results1 = [];

        foreach ($answeroptions as $answeroption) {
            $questionOptions = $options->where('id', $answeroption);
            $questionId = $options->where('id', $answeroption)->pluck('questions_id')->first();
            // $questions = $options->where('id', $answeroption)->pluck();
            $questionOptions = $options->where('questions_id', $questionId);
            $correctOption = $questionOptions->where('optionanser', 1)->pluck('id')->first();
            if (isset($answeroption) && $correctOption && $answeroption == $correctOption) {
                $results[$answeroption] = 1;
                $isCorrect = 1;
            } else {
                $results[$answeroption] = 0;
                $isCorrect = 0;
            }

            $results[$answeroption] = $isCorrect ? 'correct' : 'incorrect';

            $results1[] = [
                'student_id' => auth()->id(), // Assuming you have a logged-in student
                'status' => $isCorrect ? 'correct' : 'incorrect',
                'exam_id' => $exam_id,
                'question_id' => $questionId,
                'answer_id' => $answeroption,
                'solution_id' => $correctOption,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        foreach ($results1 as $result) {
            Answer::create($result);
        }


        $questionTotal = Answer::where('exam_id', $exam_id)->count();
        $questionCorrect = Answer::where('exam_id', $exam_id)->where('status', 'correct')->count();
        $questionWrong = $questionTotal - $questionCorrect;
        $studentId = auth()->id();
        // $examData = ExamMaster::where('id', $exam_id)->get();
        $examData = ExamMaster::find($exam_id);

        if ($examData) {
            // Retrieve the subject name using the subject_id from examData
            $subjectName = Subjects::find($examData->subject_id)->value('name');
            $PaperName = Papers::find($examData->paper_id)->value('name');
            $chapterName = Chapter::find($examData->chapter_id)->value('name');
        } else {
            return "Exam not found";
        }
        $studentName = User::where('id', $studentId)->pluck('name')->first();
        $questions = Question::where('id', $questionId)->get();
        $questionanswers = QuestionOption::where('questions_id', $questionId)->get();
        // dd($questions);
        foreach ($questions as $question) {
            $questionanswersoption = QuestionOption::where('status', 'A')
                ->where('questions_id', $question->id)
                ->get();
            $questionanswers = $questionanswers->concat($questionanswersoption);
        }
       $UserInfo =DB::select("SELECT exm.id, exm.student_id, exm.subject_id, exm.paper_id, exm.chapter_id,
            ans.status,ans.answer_id,ans.answer_id,ans.solution_id,
            qus.question_name,qus.id qus_id
            FROM exam_master exm,answers ans,questions qus
            WHERE exm.id = ans.exam_id
            AND ans.question_id = qus.id 
            AND exm.id = '96';");
       

        // dd($results1);
        return view(
            'student.form_submission_response',
            [
                'examData' => $examData,
                'questionTotal' => $questionTotal,
                'questionCorrect' => $questionCorrect,
                'questionWrong' => $questionWrong,
                'subjectName' =>  $subjectName,
                'PaperName' =>  $PaperName,
                'chapterName' =>  $chapterName,
                'studentName' =>  $studentName,
                'exam_id' =>  $exam_id,
                // 'results1' =>  $results1,
            ]
        );
    }




    public function show(string $id)
    {
        //
    }


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
