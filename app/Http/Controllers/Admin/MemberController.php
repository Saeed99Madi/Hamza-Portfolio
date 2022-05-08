<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;
use Validator;
use Dompdf\Dompdf;
use DB;

class MemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin.permission');
        $this->middleware('admin.menu');
    }
    public function add()
    {
        return view('cp.member.add');
    }
    public function addpost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:200',
            'email' => 'required|max:50000',
            'phone' => 'required',
            'major' => 'required',
            'file' => 'required|max:2000|mimes:jpeg,png,jpg,gif,svg',
        ], [], __('member'));

        $active = $request->active ? 1 : 0;

        if ($validator->passes())
        {
            $img_cat = '';
            if($file = $request->hasFile('file')) {
                $file = $request->file('file');
                $img_cat = time().'.'.$request->file->getClientOriginalExtension();//$file->getClientOriginalName() ;
                $destinationPath = public_path().'/upload' ;
                $file->move($destinationPath,$img_cat);
            }

            $user = auth()->user();
            $userid = $user->id;

            $req = $request->all();
            $req["users_id"] = $user->id;

            $data = Member::create([
                'users_id' => $user->id,
                'name' => $request['name'],
                'email' => $request['email'],
                'phone' => $request['phone'],
                'major' => $request['major'],
                'address' => $request['address'],
                'link' => $request['link'],
                'exp_years' => $request['exp_years'],
                'arch' => $request['arch'],
                'cons' => $request['cons'],
                'inte' => $request['inte'],
                'year' => $request['year'],
                'file' => $img_cat,
                'active' => $active
            ]);
            return response()->json([
                'status'=> 1,
                'msg' => 's: ' . __('msg.done'),
                'toastr' => true,
                'reset' => true
            ]);
        }

        return response()->json([
            'error'=>$validator->errors()->messages(),
            //'ErrorController' => true
            'error_inner' => true
        ]);
    }
    public function edit($id)
    {
        $user = auth()->user();
        $userid = $user->id;
        $obj = Member::where('id', '=', ["{$id}"])->first();

        if($obj){
            //dd($myString);
            return view('cp.member.edit', compact('obj' ));
        }
        else{
            return null;
        }
    }
    public function editpost(Request $request)
    {
        if($request->hasFile('file')){
            $validator = Validator::make($request->all(), [
                'name' => 'required|max:200',
                'email' => 'required|max:50000',
                'phone' => 'required',
                'major' => 'required',
                'file' => 'required|max:2000|mimes:jpeg,png,jpg,gif,svg',
            ], [], __('member'));
        }
        else{
            $validator = Validator::make($request->all(), [
                'name' => 'required|max:200',
                'email' => 'required|max:50000',
                'phone' => 'required',
                'major' => 'required',
            ], [], __('member'));
        }
        $active = $request->active ? 1 : 0;
        //dd($request['desccode']);
        if ($validator->passes())
        {
            $img_cat = '';
            if($file = $request->hasFile('file')) {
                $file = $request->file('file');
                $img_cat = time().'.'.$request->file->getClientOriginalExtension();//$file->getClientOriginalName() ;
                $destinationPath = public_path().'/upload' ;
                $file->move($destinationPath,$img_cat);
            }
            $user = auth()->user();
            $userid = $user->id;
            $id = $request->id;

            $req = $request->all();
            $req["users_id"] = $user->id;
            $count = Member::where('id',$id)->count();

            if($count > 0){
                Member::where('id',$id)->update([
                    'users_id' => $user->id,
                    'name' => $request['name'],
                    'email' => $request['email'],
                    'phone' => $request['phone'],
                    'major' => $request['major'],
                    'address' => $request['address'],
                    'link' => $request['link'],
                    'exp_years' => $request['exp_years'],
                    'arch' => $request['arch'],
                    'cons' => $request['cons'],
                    'inte' => $request['inte'],
                    'year' => $request['year'],
                    'active' => $active
                ]);

                if($img_cat){
                    Member::where('id',$id)->update([
                        'file' => $img_cat
                    ]);
                }

            }
            else{
                return response()->json([
                    'status'=> -1,
                    'msg' => 'e: ' . __('msg.none'),
                    'toastr' => true
                ]);
            }

            //$count = Profile::where('users_id', '=', ["{$userid}"])->count();

            return response()->json([
                'status'=> 1,
                'msg' => 's: ' . __('msg.done'),
                'toastr' => true//,
                //'reset' => true
            ]);
        }

        return response()->json([
            'error'=>$validator->errors()->messages(),
            //'ErrorController' => true
            'error_inner' => true
        ]);
    }
    public function index()
    {
        return view('cp.member.index');
    }
    public function ajax(Request $request)
    {
        $sort_by = $request->sort_by;
        $sort_type = $request->sort_type;

        $start = $request->start;
        $length = $request->length;
        $page = $start / $length;
        $page = $page + 1;

        $q = $request->q;

        $user = auth()->user();
        $userid = $user->id;

        $date_from = $request->date_from;
        $date_to = $request->date_to;
        $ch_date = $request->ch_date;

        $data = Member::where(function($query) {
            $query->orWhere('id', '<>', -1);
        });

        if($q){
            $data = $data->where(function($query) use ($q){
                $query->orWhere('name', 'like', '%' . $q . '%');
                //$query->orWhere('desccode', 'like', '%' . $q . '%');
            });
        }
        if($ch_date == 1){
            if($date_from){
                $date = explode('/', $date_from);
                $date_from = $date[2] . '-' . $date[1] . '-' . $date[0];

                $date = explode('/', $date_to);
                $date_to = $date[2] . '-' . $date[1] . '-' . $date[0] . ' 23:59:59';

                $data = $data->whereBetween('created_at', [$date_from, $date_to]);
            }
        }

        if($sort_by){
            $data->orderBy($sort_by, $sort_type);
        }

        $total = $data->get()->count();

        $data = $data->paginate($length, ['*'], 'page', $page)->all();

        $totalRecords = $total;
        $totalDisplay = $total;
        $result = [
            'recordsTotal'    => $totalRecords,
            'recordsFiltered' => $totalDisplay,
            'data'            => $data,
        ];
        return response()->json($result);
    }
    public function member_active(Request $request)
    {
        $ids = $request->data;
        $active = $request->active;

        foreach($ids as $id){
            Member::where('id',$id)->update([
                'active'   => $active
            ]);
        }
        return response()->json([
            'status'=> 1,
            'msg' => 's: ' . __('msg.done'),
            'toastr' => true
        ]);
    }
    public function getimg($id, $type)
    {
        $obj = Member::where('id', '=', ["{$id}"])->first();
        if($obj){
            if($type == 1){
                return response()->file(public_path()."/upload/".$obj->file);
            }
            else if($type == 2){
                return response()->file("upload/".$obj->icon);
            }
            else{
                return response()->file("upload/".$obj->cover);
            }
        }
        else{
            return null;
        }
    }
}
