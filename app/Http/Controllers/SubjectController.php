<?php

namespace App\Http\Controllers;

use App\Models\Subjects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class SubjectController extends Controller
{

    public function __construct(){
        $this->middleware('permission:subject-delete',['only'=>['destroy']]);
        $this->middleware('permission:subject-update',['only'=>['edit']]);
        $this->middleware('permission:subject-create',['only'=>['create']]);
        $this->middleware('permission:subject-view',['only'=>['index']]);

    }

    public function index(){
        $subject = Subjects::get();
        return view('subject.index',['subject'=>$subject]);
    }

    public function create(){
        return view('subject.create');
    }

    public function edit($id){
        $subject = Subjects::find($id);
        return view('subject.edit',['subject'=>$subject]);
    }

    public function store(Request $request){
        $req = $request->all();
        $rules = [
            'name' => 'required',
        ];
        $customMessages = [
            'name.required' => 'Subject Name is required.',
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
            $papers = new Subjects();
            $papers->name = $request->name;
            $papers->status = 'A';
            $papers->create_by = Auth::user()->id;
            $papers->create_date =Carbon::now();
            $papers->save();
            return response()->json([
                'code' => '200',
                'status' => 'Success',
                'msg' => $request->name.' Added Successfully',
                'routeUrl' => url('Subject\create'),
            ]);
        }else{
            $papers = Subjects::find($request->id);
            $papers->name = $request->name;
            $papers->status = 'A';
            $papers->update_by = Auth::user()->id;
            $papers->update_date =Carbon::now();
            $papers->save();
            return response()->json([
                'code' => '200',
                'status' => 'Success',
                'msg' => $request->name.' Update Successfully',
                'routeUrl' => url('Subject'),
            ]);
        }
    }

    public function destroy($id){
        try {
            $paper = Subjects::find($id);
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


    public function getAllSubject(Request $request){

        $query = DB::table('subjects as p')
                ->select('p.id', 'p.name', 'p.status')
                ->where('p.status', '=', 'A');
        $totalCount = $query->count();
        if(isset($request->search['value'])){
            $query->where('name', 'like', '%'.$request->search['value'].'%');
        }
        $filteredCount = $query->count();

        if($request->has('order')){
            $query->orderBy($request->columns[$request->order[0]['column']]['data'], $request->order[0]['dir']);
        }

        return response()->json([
            'draw' => $request->draw,
            'recordsTotal' => $totalCount,
            'recordsFiltered' => $filteredCount,
            'data' => $query ->take($request->length)->skip($request->start)->get(),
        ]);
    }
}
