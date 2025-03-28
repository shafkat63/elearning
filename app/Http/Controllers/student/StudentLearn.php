<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\Content;
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

    public function handleFormSubmission(Request $request)
    {
        // Process the form data...
        $submittedData = $request->all();

        // Pass the data to the view
        return view('form_submission_response', compact('submittedData'));
    }


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
    public function getPaperBySubjectSL($name)
    {
        $subject = Subjects::where('name', $name)->first();
        if ($subject) {
            $id = $subject->id;
        } else {
            $id = 0;
        }
        $papers = Papers::where('subject_id', $id)->get();

        return view('student.paper', ['papers' => $papers, 'name' => $name]);
    }
    public function getChapterByPaper($id)
    {
        $chapters = Chapter::where('paper_id', $id)->get();
        return json_encode($chapters);
    }
    // public function getChapterByPaperSL($id)
    // {
    //     $chapters = Chapter::where('paper_id', $id)->get();
    //     return view("student.chapter", [
    //         'chapters' => $chapters
    //     ]);
    // }

    public function getChapterByPaperSL($name)
    {



        $paper = Papers::where('name', $name)->first();
        if ($paper) {
            $id = $paper->id;
        } else {
            $id = 0;
        }
        $subject = Subjects::where('id', $paper->subject_id)->first();
        $subjectName = $subject->name;
        $chapters = Chapter::where('paper_id', $id)->get();
        return view("student.chapter", [
            'chapters' => $chapters,
            'name' => $name,
            'subjectName' => $subjectName,
        ]);
    }



    public function getContentSL($name)
    {

        $chapter = Chapter::where('name', $name)->first();

        // dd(  $chapter);
        $paper = Papers::where('id', $chapter->paper_id)->first();
        $chapters = Chapter::where('paper_id', $chapter->paper_id)->paginate(10);
        // return json_encode($chapters);

        $subjectName = Subjects::where('id', $paper->subject_id)->select('name')->first()->name;

        $paperName = $paper->name;
        if ($chapter) {
            $id = $chapter->id;
        } else {
            $id = 0;
        }
        $contents = Content::where('chapter_id', $id)->paginate(1);
        // dd($content);
        return view('student.content', ['contents' => $contents, 'name' => $name, 'paperName' => $paperName, 'subjectName' => $subjectName, 'chapters' => $chapters]);
        // return json_encode($contents);
    }


    public function getQuestionByChapter($id)
    {
        // Get the first question for the given chapter
        $questions1 = Question::where('chapter_id', $id)->limit(1)->get();

        // Check if any questions were found
        if ($questions1->isEmpty()) {
            return view('student.question', [
                'subject_id' => null,
                'paper_id' => null,
                'chapter_id' => $id,
                'questions' => collect(),
                'questionanswers' => collect()
            ]);
        }

        // Extract the subject_id and paper_id from the first question
        $subject_id = $questions1[0]->subject_id;
        $paper_id = $questions1[0]->paper_id;
        $chapter_id =  $questions1[0]->chapter_id;

        // Get up to 10 questions for the given chapter
        $questions = Question::where('chapter_id', $id)->limit(10)->get();
        $questionanswers = collect();

        // Fetch the options for each question
        foreach ($questions as $question) {
            $questionanswersoption = QuestionOption::where('status', 'A')
                ->where('questions_id', $question->id)
                ->get();
            $questionanswers = $questionanswers->concat($questionanswersoption);
        }
        // dd(  $questionanswers);

        return view('student.question', [
            'subject_id' => $subject_id,
            'paper_id' => $paper_id,
            'chapter_id' => $chapter_id,
            'questions' => $questions,
            'questionanswers' => $questionanswers
        ]);
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

    public function questionAnswerCheck(Request $request) {}
}
