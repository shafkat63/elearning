<?php

namespace App\Http\Controllers;

use App\Models\Papers;
use App\Models\Subjects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\QuestionConfig\Chapter;
use Illuminate\Support\Facades\Validator;

class ChapterController extends Controller
{

    public function __construct(){
        $this->middleware('permission:chapter-delete',['only'=>['destroy']]);
        $this->middleware('permission:chapter-update',['only'=>['edit']]);
        $this->middleware('permission:chapter-create',['only'=>['create']]);
        $this->middleware('permission:chapter-view',['only'=>['index']]);

    }
    public function index(){
        $subject = Subjects::get();
        return view('chapter.index',['subject'=>$subject]);
    }

    public function create(){
        $subject = Subjects::get();
        return view('chapter.create',['subject'=>$subject]);
    }

    public function getpaperList(){
        $subject_id = request()->input('subject_id');
        $papers = DB::table('papers')
                        ->where('subject_id', '=', $subject_id)
                        ->get();
        return json_encode($papers);

    }

    public function edit($id){
        $chapter = Chapter::find($id);
        $subject = Subjects::get();

        return view('chapter.edit',['chapter'=>$chapter,'subject'=>$subject]);
    }

    public function store(Request $request){
        $req = $request->all();
        $rules = [
            'name' => 'required',
            'subject_id' => 'required',
            'paper_id' => 'required',
        ];
        $customMessages = [
            'name.required' => 'Chapter Name is required.',
            'subject_id.required' => 'Subject is required.',
            'paper_id.required' => 'Paper is required.',
            'paper_id.integer' => 'Paper should be a positive integer.',
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
            $chapters = new Chapter();
            $chapters->name = $request->name;
            $chapters->subject_id = $request->subject_id;
            $chapters->paper_id = $request->paper_id;
            $chapters->status = 'A';
            $chapters->create_by = 'A';
            $chapters->create_date ='A';
            $chapters->save();

            return response()->json([
                'code' => '200',
                'status' => 'Success',
                'msg' => $request->name.' Added Successfully',
                'routeUrl' => url('Chapter'),
            ]);
        }else{
            $chapters = Chapter::find($request->id);
            $chapters->name = $request->name;
            $chapters->subject_id = $request->subject_id;
            $chapters->paper_id = $request->paper_id;
            $chapters->status = 'A';
            $chapters->update_by = 'A';
            $chapters->update_date ='A';
            $chapters->save();
            return response()->json([
                'code' => '200',
                'status' => 'Success',
                'msg' => $request->name.' Update Successfully',
                'routeUrl' => url('Chapter'),
            ]);
        }
    }

    public function destroy($id){
        try {
            $paper = Chapter::find($id);
            $paper->delete();
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

    public function getAllChapter(Request $request){

        $query = DB::table('Chapters as C')
                ->select('C.id', 'C.paper_id', 'C.name', 'C.status', 'P.name as paper_name', 'S.name as subject_name')
                ->join('papers as P', 'C.paper_id', '=', 'P.id')
                ->join('subjects as S', 'C.subject_id', '=', 'S.id')
                ->where('C.status', '=', 'A');
        $totalCount = $query->count();
        if(isset($request->search['value'])){
            $query->where('name', 'like', '%'.$request->search['value'].'%');
        }
        if(isset($request->paper_id)){
            $query = $query->where('C.paper_id', '=', $request->paper_id);
        }
        if(isset($request->subject_id)){
            $query = $query->where('C.subject_id', '=', $request->subject_id);
        }
        $filteredCount = $query->count();

        if($request->has('order')){
            $query->orderBy($request->columns[$request->order[0]['column']]['data'], $request->order[0]['dir']);
        }

        $data = $query->paginate($request->length);

        return response()->json([
            'draw' => $request->draw,
            'recordsTotal' => $totalCount,
            'recordsFiltered' => $filteredCount,
            'data' => $data->items(),
        ]);
    }
}
