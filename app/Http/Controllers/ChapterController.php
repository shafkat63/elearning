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
                'routeUrl' => url('Chapter\create'),
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


    public function getAllChapter(Request $request)
{
    $query = DB::table('Chapters as C')
        ->select('C.id', 'C.paper_id', 'C.name', 'C.status', 'P.name as paper_name', 'S.name as subject_name')
        ->join('papers as P', 'C.paper_id', '=', 'P.id')
        ->join('subjects as S', 'C.subject_id', '=', 'S.id')
        ->where('C.status', '=', 'A');

    // Get total count before filtering
    $totalCount = $query->count();

    // Apply search filter if provided
    if (isset($request->search['value']) && !empty($request->search['value'])) {
        $query->where(function ($q) use ($request) {
            $q->where('C.name', 'like', '%' . $request->search['value'] . '%')
                ->orWhere('P.name', 'like', '%' . $request->search['value'] . '%')
                ->orWhere('S.name', 'like', '%' . $request->search['value'] . '%');
        });
    }

    // Apply paper_id filter if provided
    if (isset($request->paper_id) && !empty($request->paper_id)) {
        $query->where('C.paper_id', '=', $request->paper_id);
    }

    // Apply subject_id filter if provided
    if (isset($request->subject_id) && !empty($request->subject_id)) {
        $query->where('C.subject_id', '=', $request->subject_id);
    }

    // Get filtered count after applying filters
    $filteredCount = $query->count();

    // Apply ordering
    if ($request->has('order')) {
        $orderColumnIndex = $request->order[0]['column'];
        $orderDir = $request->order[0]['dir'];
        $orderColumn = $request->columns[$orderColumnIndex]['data'];
        $query->orderBy($orderColumn, $orderDir);
    }

    // Apply pagination
    $query->skip($request->input('start', 0))->take($request->input('length', 10));

    // Fetch data
    $data = $query->get();

    // Return JSON response
    return response()->json([
        'draw' => $request->draw,
        'recordsTotal' => $totalCount,
        'recordsFiltered' => $filteredCount,
        'data' => $data,
    ]);
}

}
