<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Subjects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ContentController extends Controller
{
    public function __construct(){
        $this->middleware('permission:content-delete',['only'=>['destroy']]);
        $this->middleware('permission:content-update',['only'=>['edit']]);
        $this->middleware('permission:content-create',['only'=>['create']]);
        $this->middleware('permission:content-view',['only'=>['index']]);

    }

    public function index(){
        $content = Content::get();
        return view('content.index',['content'=>$content]);
    }


    public function create(){

        $subject = Subjects::all();
        return view('content.create',['subject'=>$subject]);
    }

    public function edit($id){
        $subject = Subjects::all();
        $content = Content::find($id);
        return view('content.edit',['subject'=>$subject,'content'=>$content]);
    }

    public function view($id){
        $content = Content::find($id);
        return view('content.view',['content'=>$content]);
    }

    public function store(Request $request){
        $req = $request->all();
      
        $rules = [
            'subject_id' => 'required',
            'paper_id' => 'required',
            'chapter_id' => 'required',
            'content_details' => 'required',
        ];
        $customMessages = [
            'subject_id.required' => 'Subject is required.',
            'paper_id.required' => 'Paper is required.',
            'chapter_id.integer' => 'Chapter is required.',
            'content_details.required' => 'Content Details is required.',
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
            $content = new Content();
            $content->subject_id =$request->subject_id;
            $content->paper_id =$request->paper_id;
            $content->chapter_id = $request->chapter_id;
            $content->content_name = $request->content_name;
            $content->content_details = $request->content_details;
            $content->save();
            return response()->json([
                'code' => '200',
                'status' => 'Success',
                'msg' => $request->content_name.' Added Successfully',
                'routeUrl' => url('Content'),
            ]);
        }else{
            $content = Content::find($request->id);
            $content->subject_id =$request->subject_id;
            $content->paper_id =$request->paper_id;
            $content->chapter_id = $request->chapter_id;
            $content->content_name = $request->content_name;
            $content->content_details = $request->content_details;
            $content->save();
            return response()->json([
                'code' => '200',
                'status' => 'Success',
                'msg' => $request->content_name.' Update Successfully',
                'routeUrl' => url('Content'),
            ]);
        }
    }

    public function destroy($id){
        try {
            $content = Content::find($id);
            $content->delete();
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


    public function getAllContent(Request $request){

        $query = DB::table('content')
                ->select('id', 'content_name');
        $totalCount = $query->count();
        if(isset($request->search['value'])){
            $query->where('content_name', 'like', '%'.$request->search['value'].'%');
        }
        $filteredCount = $query->count();

        if($request->has('order')){
            $query->orderBy($request->columns[$request->order[0]['column']]['data'], $request->order[0]['dir']);
        }

        return response()->json([
            'draw' => $request->draw,
            'recordsTotal' => $totalCount,
            'recordsFiltered' => $filteredCount,
            'data' => $query->take($request->length)->skip($request->start)->get(),
        ]);
    }
}
