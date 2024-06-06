<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\Papers;
use App\Models\QuestionConfig\Chapter;
use App\Models\QuestionConfig\Question;
use App\Models\QuestionConfig\QuestionOption;
use App\Models\Subjects;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentLearn extends Controller
{
    public function Learn()
    {
        $subject  = Subjects::get();
        return view('student.learn', ['subjects' => $subject]);
    }
    public function Exams()
    {

        $subjects  = Subjects::get();

        $papers = Papers::get();

        return view('student.exam', ['subjects' => $subjects, "papers" => $papers]);
    }

    public function getPaperBySubject($id)
    {
        $papers = Papers::where('subject_id', $id)->get();
        return json_encode($papers);
    }
    public function getChapterByPaper($id)
    {

        $chapters = Chapter::where('paper_id', $id)->get();
        return json_encode($chapters);
    }
    public function getQuestionByChapter($id)
    {
        $questions = Question::where('chapter_id', $id)->limit(10)->get();
        $questionanswers = collect();

        foreach ($questions as $question) {
            $questionanswersoption = QuestionOption::where('status', 'A')
                ->where('questions_id', $question->id)
                ->get();
            $questionanswers = $questionanswers->concat($questionanswersoption);
        }

        return view('student.question', ['questions' => $questions, 'questionanswers' =>  $questionanswers]);
    }

    public function Paper($id)
    {
        $papers = Papers::where('status', 'A')
            ->where('id', $id)
            ->get();
        // dd($papers);
        $chapter = Chapter::where('status', 'A')
            ->where('paper_id', $id)
            ->get();


        $questions = Question::where('status', 'A')
            ->where('paper_id', $id)
            ->get();

        $chapters = collect();

        // Fetch all chapters with status 'A' for each paper
        foreach ($papers as $paper) {
            $chaptersForPaper = Chapter::where('status', 'A')
                ->where('paper_id', $paper->id)
                ->get();
            $chapters = $chapters->concat($chaptersForPaper);
        }
        // return $chapters;

        return view('student.paper', ['papers' => $papers, 'chapter' => $chapter, 'questions' => $questions]);
    }
    public function oneSubjectID($id)
    {
        return (['id' => $id]);
    }

    public function Subject($id)
    {

        $papers = Papers::where('status', 'A')
            ->where('subject_id', $id)
            ->get();

        $chapter = Chapter::where('status', 'A')
            ->where('subject_id', $id)
            ->get();


        $questions = Question::where('status', 'A')
            ->where('subject_id', $id)
            ->get();


        $chapters = collect();
        foreach ($papers as $paper) {
            $chaptersForPaper = Chapter::where('status', 'A')
                ->where('paper_id', $paper->id)
                ->get();
            $chapters = $chapters->concat($chaptersForPaper);
        }
        // return $chapters;

        return view('student.subjects', ['papers' => $papers, 'chapter' => $chapter, 'questions' => $questions]);
    }
}
