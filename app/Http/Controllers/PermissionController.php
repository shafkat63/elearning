<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:delete-permission', ['only' => ['destroy']]);
        $this->middleware('permission:update-permission', ['only' => ['edit']]);
        $this->middleware('permission:create-permission', ['only' => ['create']]);
        $this->middleware('permission:view-permission', ['only' => ['index']]);

    }

    public function index()
    {
        $permission = Permission::get();
        return view('role-permission.permission.index', ['permission' => $permission]);
    }

    public function create()
    {
        return view('role-permission.permission.create');
    }

    public function edit($id)
    {
        $permission = Permission::find($id);

        return view('role-permission.permission.edit', ['permission' => $permission]);
    }

    public function store(Request $request)
    {
        $req = $request->all();
        $rules = [
            'name' => 'required',
        ];
        $customMessages = [
            'name.required' => 'Name is required.',
        ];
        $validator = Validator::make($req, $rules);
        $validator->setCustomMessages($customMessages);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'data' => $validator->errors(),
            ]);
        }
        if ($request->id == "") {
            $papers = new Permission();
            $papers->name = $request->name;
            $papers->save();
            return response()->json([
                'code' => '200',
                'status' => 'Success',
                'msg' => $request->name . ' Added Successfully',
                'routeUrl' => url('Permission'),
            ]);
        } else {
            $papers = Permission::find($request->id);
            $papers->name = $request->name;
            $papers->save();
            return response()->json([
                'code' => '200',
                'status' => 'Success',
                'msg' => $request->name . ' Update Successfully',
                'routeUrl' => url('Permission'),
            ]);
        }
    }

    public function destroy($id)
    {
        try {
            $permission = Permission::find($id);
            $permission->delete();
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

    public function getAllpermission(Request $request)
    {
        $query = DB::table('permissions as p')
            ->select('p.id', 'p.name', 'p.guard_name');
        $totalCount = $query->count();
        if (isset($request->search['value'])) {
            $query->where('name', 'like', '%' . $request->search['value'] . '%');
        }
        $filteredCount = $query->count();

        if ($request->has('order')) {
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
