<?php

namespace App\Http\Controllers;

use App\Models\Papers;
use App\Models\Subjects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PaperController extends Controller
{

    public function __construct(){
        $this->middleware('permission:paper-delete',['only'=>['destroy']]);
        $this->middleware('permission:paper-update',['only'=>['edit']]);
        $this->middleware('permission:paper-create',['only'=>['create']]);
        $this->middleware('permission:paper-view',['only'=>['index']]);

    }
    public function index(){

        $subjects = Subjects::get();
        return view('paper.index',['subject'=>$subjects]);
    }

    public function create(){
        $subject = Subjects::get();
        return view('paper.create',['subject'=>$subject]);
    }

    public function edit($id){
        $paper = Papers::find($id);
        $subject = Subjects::get();

        return view('paper.edit',['paper'=>$paper,'subject'=>$subject]);
    }

    public function store(Request $request){
        $req = $request->all();
        $rules = [
            'name' => 'required',
            'subject_id' => 'required',
        ];

        $customMessages = [
            'name.required' => 'Paper Name is required.',
            'subject_id.required' => 'Subject is required.',
            'subject_id.integer' => 'Subject should be a positive integer.',
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
            $papers = new Papers();
            $papers->name = $request->name;
            $papers->subject_id = $request->subject_id;
            $papers->status = 'A';
            $papers->create_by = 'A';
            $papers->create_date ='A';
            $papers->save();

            return response()->json([
                'code' => '200',
                'status' => 'Success',
                'msg' => $request->name.' Added Successfully',
                'routeUrl' => url('Paper'),
            ]);
        }else{
            $papers = Papers::find($request->id);
            $papers->name = $request->name;
            $papers->subject_id = $request->subject_id;
            $papers->status = 'A';
            $papers->update_by = 'A';
            $papers->update_date ='A';
            $papers->save();
            return response()->json([
                'code' => '200',
                'status' => 'Success',
                'msg' => $request->name.' Update Successfully',
                'routeUrl' => url('Paper'),
            ]);
        }

    }

    public function destroy($id){
        try {
            $paper = Papers::find($id);
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

    public function getAllPaper(Request $request){

        $query = DB::table('papers as p')
                ->select('p.id', 'p.subject_id', 'p.name', 'p.status', 's.name as subject_name')
                ->join('subjects as s', 'p.subject_id', '=', 's.id')
                ->where('p.status', '=', 'A');
        $totalCount = $query->count();
        if(isset($request->search['value'])){
            $query->where('name', 'like', '%'.$request->search['value'].'%');
        }
        if(isset($request->subject_id)){
            $query = $query->where('subject_id', '=', $request->subject_id);
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
