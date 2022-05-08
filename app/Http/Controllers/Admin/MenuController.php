<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Menu;
use App\Models\Link;
use App\Models\Users_links;
use App\Models\user_rols;
use App\Models\Role;
use Validator;
use Dompdf\Dompdf;
use DB;
use Illuminate\Support\Facades\Storage;

class MenuController extends BaseController
{
	public function add()
    {
        $cats = Menu::get();
        return view('cp.menu.add', compact("cats"));
    }
    public function addpost(Request $request)
    {
    
		$validator = Validator::make($request->all(), [
            'title' => 'required|max:200',
            'link' => 'required|max:200',
            'order' => 'required|numeric',
            'typeid'   => 'required|numeric'
        ], [], __('menu'));

        $active = $request->active ? 1 : 0;
        $external = $request->external ? 1 : 0;
        $newtap = $request->newtap ? 1 : 0;
        
		if ($validator->passes()) 
        {
            $user = auth()->user();
            $userid = $user->id;

            $req = $request->all();
            $req["users_id"] = $user->id;

            menu::create([
            'users_id' => $user->id,
            'title' => $request['title'],
            'link' => $request['link'],
            'order' => $request['order'],
            'parentid' => $request['parentid'],
            'active' => $active,
            'external' => $external,
            'typeid' => $request['typeid'],
            'newtap'    => $request['newtap']
            ]);
            //$count = Profile::where('users_id', '=', ["{$userid}"])->count();
            
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
        $obj = menu::where('id', '=', ["{$id}"])->first();
        //dd($obj->first()->active);
        if($obj){
                $cats = Menu::get();
                return view('cp.menu.edit', compact('obj', 'cats'));
        }
        else{
            return null;
        }
    }
    public function editpost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:200',
            'link' => 'required|max:200',
            'order' => 'required',
            'typeid'   => 'required'
        ], [], __('menu'));
        
        $active = $request->active ? 1 : 0;
        $external = $request->external ? 1 : 0;
        $newtap = $request->newtap ? 1 : 0;

		if ($validator->passes()) 
        {
            $user = auth()->user();
            $userid = $user->id;
            $id = $request->id;

            $req = $request->all();
            $req["users_id"] = $user->id; 

            $count = menu::where('id',$id)->count();
             
            if($count > 0){
                menu::where('id',$id)->update([
                    'title' => $request['title'],
                    'link' => $request['link'],
                    'order' => $request['order'],
                    'parentid' => $request['parentid'],
                    'active' => $active,
                    'external' => $external,
                    'typeid' => $request['typeid'],
                    'newtap' => $newtap,
                ]);
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
        $cats = Menu::get();
        return view('cp.menu.index', compact("cats"));
    }
    public function ajax(Request $request)
    {
        $sort_by = $request->sort_by;
        $sort_type = $request->sort_type;

		$stmenu = $request->stmenu;
		$length = $request->length;
		$page = $stmenu / $length;
		$page = $page + 1;
		
		$q = $request->q;
        $typeid = $request->typeid;
        $parentid = $request->parentid;

        $user = auth()->user();
        $userid = $user->id;

        $date_from = $request->date_from;
        $date_to = $request->date_to;
        $ch_date = $request->ch_date;

        $data = menu::where(function($query) {
                $query->orWhere('id', '<>', -1);
            });

        if($q){
            $data = $data->where(function($query) use ($q){
                $query->orWhere('title', 'like', '%' . $q . '%');
            });
        }
        if($typeid){
            $data = $data->where(function($query) use ($typeid){
                $query->orWhere('typeid', '=', $typeid);
            });
        }
        if($parentid){
            $data = $data->where(function($query) use ($parentid){
                $query->orWhere('parentid', '=', $parentid);
            });
        }
        if($ch_date == 1){
            if($date_from){
                $date = explode('/', $date_from);
                $date_from = $date[2] . '-' . $date[1] . '-' . $date[0];

                $date = explode('/', $date_to);
                $date_to = $date[2] . '-' . $date[1] . '-' . $date[0] . ' 23:59:59';
            //dd($date_to . ' 23:59:59');
                $data = $data->whereBetween('created_at', [$date_from, $date_to]);
            }
        }

        if($sort_by){
            $data->orderBy($sort_by, $sort_type);
        }

		$total = $data->get()->count();

        //$data = $data->select("`id`, (select `title` from `menus` where `parentid` = `id`) AS `dd`"); // (select `title` from `menus` where `parentid` = id) as pt
        //dd($data->get()->toArray());

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
    public function tbl_active(Request $request)
	{
		$ids = $request->data;
        $active = $request->active;

        foreach($ids as $id){
            menu::where('id',$id)->update([
				'active'   => $active
			]);
        }
		return response()->json([
			'status'=> 1, 
			'msg' => 's: ' . __('msg.done'), 
			'toastr' => true
			]);
	}
}
