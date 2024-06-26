<?php

namespace App\Http\Controllers;

use App\Models\Subjects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\QuestionConfig\Chapter;
use App\Models\QuestionConfig\Question;
use Illuminate\Support\Facades\Validator;
use App\Models\QuestionConfig\QuestionOption;

class QuestionController extends Controller
{

    public function __construct(){
        $this->middleware('permission:question-delete',['only'=>['destroy']]);
        $this->middleware('permission:question-update',['only'=>['edit']]);
        $this->middleware('permission:question-create',['only'=>['create']]);
        $this->middleware('permission:question-view',['only'=>['index']]);

    }
    public function index(){
        $subject = Subjects::all();
        $query = DB::table('questions as Q')
                ->select('Q.id', 'Q.question_name', 'Q.status', 'P.name as paper_name', 'S.name as subject_name', 'C.name as chapter_name')
                ->join('Chapters as C', 'Q.chapter_id', '=', 'C.id')
                ->join('papers as P', 'C.paper_id', '=', 'P.id')
                ->join('subjects as S', 'C.subject_id', '=', 'S.id')
                ->where('C.status', '=', 'A')
                ->get();
        return view('question.index',['subject'=>$subject,'query'=>$query]);
    }

    public function create(){
        $subject = Subjects::all();
        return view('question.create',['subject'=>$subject]);
    }

    public function getChapterList(){
        $paper_id = request()->input('paper_id');
        $chapter = DB::table('chapters')
                        ->where('paper_id', '=', $paper_id)
                        ->get();
        return json_encode($chapter);

    }

    public function edit($id){
        $subject = Subjects::all();
        $question = Question::find($id);
        $questionOption = DB::select("SELECT oo.id,questions.id questions_id,questions.question_name,oo.options,oo.optionanser
        FROM question_option oo
        LEFT JOIN questions ON oo.questions_id = questions.id
        WHERE questions.id=$id;");
        return view('question.edit',['subject'=>$subject,'question'=>$question,'questionOption'=>$questionOption]);
    }

    public function store(Request $request){
        $req = $request->all();
        $rules = [
            'subject_id' => 'required',
            'paper_id' => 'required',
            'chapter_id' => 'required',
            'question_name' => 'required',
            'question_name' => 'required',
            'option' => 'required|array',
            'option.*' => 'required',
        ];
        $customMessages = [
            'subject_id.required' => 'Subject is required.',
            'paper_id.required' => 'Paper is required.',
            'chapter_id.integer' => 'Chapter is required.',
            'question_name.integer' => 'Subject is required.',
            'option.required' => 'Option is required.',
            'option.*.required' => 'All options are required.',
        ];
        $validator = Validator::make($req,$rules);
        $validator->setCustomMessages($customMessages);
        if ($validator->fails()){
            return response()->json([
                'status' => 'error',
                'data' => $validator->errors(),
            ]);
        }

        if($request->id==""){
            $question = new Question();
            $question->subject_id = $request->subject_id;
            $question->paper_id = $request->paper_id;
            $question->chapter_id = $request->chapter_id;
            $question->question_name = $request->question_name;
            $question->status = 'A';
            $question->create_by = 'A';
            $question->create_date =now();
            $question->save();
            $insertedId = $question->id;
            if(isset($request->option) && !is_null($request->option)) {
                foreach ($request->option as $key => $value) {
                    $questionoption = new QuestionOption();
                    $questionoption->questions_id = $insertedId;
                    $questionoption->options = $value;
                    $ckOptionValue = isset($request->ckOption[$key]) ? $request->ckOption[$key] : 0;
                    $questionoption->optionanser = $ckOptionValue;
                    $questionoption->status = 'A';
                    $questionoption->create_by = 'A';
                    $questionoption->create_date =now();
                    $questionoption->save();
                }
            }
            return response()->json([
                'code' => '200',
                'status' => 'Success',
                'msg' => 'Question Added Successfully',
                'routeUrl' => url('Question/create'),
            ]);
        }else{
            $question = Question::find($request->id);
            $question->subject_id = $request->subject_id;
            $question->paper_id = $request->paper_id;
            $question->chapter_id = $request->chapter_id;
            $question->question_name = $request->question_name;
            $question->status = 'A';
            $question->update_by = 'A';
            $question->update_date =now();
            $question->save();
            if(isset($request->option) && !is_null($request->option)) {
                foreach ($request->option as $key => $value) {
                    $questionoption = QuestionOption::find($request->optionID[$key]);
                    $questionoption->questions_id = $request->id;
                    $questionoption->options = $value;
                    $ckOptionValue = isset($request->ckOption[$key]) ? $request->ckOption[$key] : 0;
                    $questionoption->optionanser = $ckOptionValue;
                    $questionoption->status = 'A';
                    $questionoption->update_by = 'A';
                    $questionoption->update_date =now();
                    $questionoption->save();
                }
            }
            return response()->json([
                'code' => '200',
                'status' => 'Success',
                'msg' => 'Question Update Successfully',
                'routeUrl' => url('Question'),
            ]);
        }
    }

    public function update(Request $request,$id){
        $request->validate([
            'chapter_id' => ['required','string'],
            'question_name' => ['required','string']
        ]);

        //return $request;
        $question = Question::find($id);
        $question->chapter_id = $request->chapter_id;
        $question->question_name = $request->question_name;
        $question->save();
        return redirect('Question')->with('status','Question Update Successfully');
    }

    public function destroy($id){
        try {
            $question = Question::find($id);
            $question->delete();
            QuestionOption::where('questions_id', $id)->delete();
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


    public function getAllQuestion(Request $request)
{
    $query = DB::table('questions as Q')
        ->select(
            'Q.id', 
            'Q.question_name', 
            'Q.status', 
            'P.name as paper_name', 
            'S.name as subject_name', 
            'C.name as chapter_name'
        )
        ->join('Chapters as C', 'Q.chapter_id', '=', 'C.id')
        ->join('papers as P', 'Q.paper_id', '=', 'P.id')
        ->join('subjects as S', 'Q.subject_id', '=', 'S.id')
        ->where('C.status', '=', 'A');

    // Total count before filtering
    $totalCount = $query->count();

    // Apply search filter if it exists
    if ($searchValue = $request->input('search.value')) {
        $query->where(function($subQuery) use ($searchValue) {
            $subQuery->where('Q.question_name', 'like', '%' . $searchValue . '%')
                     ->orWhere('P.name', 'like', '%' . $searchValue . '%')
                     ->orWhere('S.name', 'like', '%' . $searchValue . '%')
                     ->orWhere('C.name', 'like', '%' . $searchValue . '%');
        });
    }

    // Apply additional filters if they exist
    if ($subjectId = $request->input('subject_id')) {
        $query->where('Q.subject_id', '=', $subjectId);
    }

    if ($paperId = $request->input('paper_id')) {
        $query->where('Q.paper_id', '=', $paperId);
    }

    if ($chapterId = $request->input('chapter_id')) {
        $query->where('Q.chapter_id', '=', $chapterId);
    }

    // Total count after filtering
    $filteredCount = $query->count();

    // Apply ordering if it exists
    if ($request->has('order')) {
        $orderColumn = $request->input('columns')[$request->input('order.0.column')]['data'];
        $orderDir = $request->input('order.0.dir');
        $query->orderBy($orderColumn, $orderDir);
    }

    // Pagination
    $data = $query->offset($request->start)->limit($request->length)->get();

    return response()->json([
        'draw' => intval($request->draw),
        'recordsTotal' => $totalCount,
        'recordsFiltered' => $filteredCount,
        'data' => $data,
    ]);
}

    public function showOptions($QuestionID){
        $questionOptions = DB::Select("SELECT  Q.question_name,QO.options,QO.optionanser
        FROM questions as Q
        LEFT JOIN question_option as QO ON Q.id =QO.questions_id
        WHERE Q.id = $QuestionID;");
        return view('question.showOptions',['questionOptions'=>$questionOptions]);

    }
    public function showOptionss($QuestionID){
        return $questionOptions = DB::Select("SELECT  Q.question_name,QO.options,QO.optionanser
        FROM questions as Q
        LEFT JOIN question_option as QO ON Q.id =QO.questions_id
        WHERE Q.id = $QuestionID;");

    }
}
