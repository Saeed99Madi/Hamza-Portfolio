<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Link;
use App\Models\Users_links;
use App\Models\user_rols;
use App\Models\Role;
use Validator;
use Dompdf\Dompdf;
use DB;

class UserController extends BaseController
{
	public function create()
    {
        
        return view('cp.user.create');
    }
	public function store(Request $request)
    {
		$validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
			'email' => 'required|email|max:50',
			'password' => 'required|confirmed|min:6',
        ]);
		if ($validator->passes()) {
			User::create([
				'name' =>  $request['name'],
				'email' => $request['email'],
				'password' => bcrypt($request['password']),
				'active'   => $request->active == null? 0 : 1
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
        ]);
    }
    public function user_update($id)
    {
        $user = User::find($id);

        return view('cp.user.edit', compact("user"));
    }
    public function user_update_store(Request $request)
    {
        $password = $request['password'];
        $userId = $request['userId'];
		$validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
        ]);
        $validatorPassword = Validator::make($request->all(), [
			'password' => 'required|confirmed|min:6',
        ]);
        if(is_null($password) == false){
            if ($validatorPassword->passes() == false) {
                return response()->json(['error'=>$validatorPassword->errors()->messages()]);
            }
        }
		if ($validator->passes()) {
            $user = User::where('id',$userId);
			$user->update([
				'name' =>  $request['name'],
			]);
            if(is_null($password) == false){
                $user->update([
				    'password' => bcrypt($request['password']),
			    ]);
            }
			return response()->json([
			'status'=> 1, 
			'msg' => 's: ' . __('msg.done'), 
			'toastr' => true,
			'reset' => true,
            'popup_close' => true
			]);
        }
    	return response()->json(['error'=>$validator->errors()->messages()]);
    }
    public function user_role_view($id)
    {
    
        $user = User::find($id);
        $items = Role::get();
        $data = DB::table('user_rols')->where("users_id" , $id)->get();

        //dd($data->get());
        return view('cp.user.role', compact("user", "items", "data"));
    }
    public function user_role_store(Request $request)
	{
		$links = $request->data;
        
		$userid = $request->userid;

		user_rols::where('users_id', '=', ["{$userid}"])
		->delete();

        if(is_null($links) == false){
		    foreach($links as $link) {

            /*User::create([
				'name' =>  'asa@tt.ty',
				'email' => 'asa@tt.ty',
				'password' => bcrypt('1234567'),
				'active'   =>  1
			]);*/
            /*DB::table('user_rols')::create([
				    'users_id' =>  $userid,
				    'roles_id' => $link
			    ]);
                */
                user_rols::create([
				    'users_id' =>  $userid,
				    'roles_id' => $link
			    ]);

		    }
        }
		return response()->json([
			'status'=> 1, 
			'msg' => 's: ' . __('msg.done'), 
			'toastr' => true
			]);
	}

	public function view(Request $request)
    {
    /*user_rols::create([
				    'users_id' =>  1,
				    'roles_id' => 1
			    ]);*/
                        //$request->attributes->add(['myAttribute' => 'ggggggg']);

                $rr = $request->get('myAttribute');
         //dd($rr);
        return view('cp.user.view');
    }
	public function user_get_data(Request $request)
    {
	//dd($request->columns[$request->order[0]['column']]["data"]);
	//dd($request->order[0]['column']);
	//dd($request->order[0]['dir']);

	//$sort_by = $request->columns[$request->order[0]['column']]["data"];
	//$sort_type = $request->order[0]['dir'];

    $sort_by = $request->sort_by;
    $sort_type = $request->sort_type;

		$start = $request->start;
		$length = $request->length;
		$page = $start / $length;
		$page = $page + 1;
		//dd($page);
		$q = $request->d;
		//dd($request);
		//dd($request->start);
		//dd($request->length);
		//dd($request->d);
		//dd($request->order);
        $active = $request->active;


        $data = User::where(function($query) use ($q){
            $query->where('id', 'LIKE', '%'.$q.'%');
            $query->orWhere('name', 'LIKE', '%'.$q.'%');
            $query->orWhere('email', 'LIKE', '%'.$q.'%');
        });

        if(is_null($active) == false){
            //$data->whereRaw('active = ?',["{$active}"]);
            $data->where('active',$active);
        }
        if($sort_by){
            $data->orderBy($sort_by, $sort_type);
        }

		$total = $data->get()->count();
		//dd(count($data));

		$data = $data->paginate($length, ['*'], 'page', $page)->all();

		//dd($data);

		$totalRecords = $total;
		$totalDisplay = $total;
		$result = [
            'recordsTotal'    => $totalRecords,
            'recordsFiltered' => $totalDisplay,
            'data'            => $data,
        ];
		return response()->json($result);


		dd($request);
	}
	public function user_permission($id)
    {
		//dd(Link::where('parent_id', 0)->get()->count());
		$links = Link::where('parent_id', 0)->get()->toArray();
		$tree = [];
		foreach($links as $link){
		//dd($link);
			$icon = 'fa fa-folder text-warning';
			$count =  Link::where([['parent_id','=',$link['id']]])->get()->count();
			
			if($count > 0){
				$icon = 'fa fa-folder text-warning';
			}

			$hasperm = Users_links::whereRaw('links_id = ? and users_id = ?',["{$link['id']}", "{$id}"])
			->get()->count();
			//dd($hasperm > 0);
			$node = [
			'id' => $link['id'],
			'text' => $link['title'],
			'state' => [
				'selected'	=> $hasperm > 0,
				'opened'	=> true
			],
			'icon' => $icon,
			//'children' => perm_tree_fun($link['id'])
			];
			
			if($count > 0){
				$node["children"] = $this->perm_tree_fun($link['id'], $id);//[ $this->perm_tree_fun($link['id'], $id) ];
			}
			//dd($link);
			array_push($tree, $node);
			
			//$this->perm_tree_fun($link['id'], $tree);
		}
		$json = json_encode($tree);
		//dd($tree);
		$userid = $id;
        return view('cp.user.permission', compact("json", "userid"));
    }
	public function perm_tree_fun($id, $userid){
		$padre =  Link::where([['parent_id','=',$id]])->get()->toArray();  
        $arr = [];
        foreach($padre as $link){
			$count =  Link::where([['parent_id','=',$link['id']]])->get()->count();
			$icon = 'fa fa-folder text-warning';
			if($count > 0){
				$icon = 'fa fa-folder text-warning';
			}

			$hasperm = Users_links::whereRaw('links_id = ? and users_id = ?',["{$link['id']}", "{$userid}"])
			->get()->count();

			$node = [
				'id'	=>	$link['id'],
				'text' => $link['title'],
				'state' => [
					'selected'	=> $hasperm > 0,
					'opened'	=> true
				],
				'icon' => $icon
			];

			if($count > 0){
				$node["children"] = $this->perm_tree_fun($link['id'], $userid);//[ $this->perm_tree_fun($link['id'], $userid) ];
			}
			//return $node;
			array_push($arr, $node);
		}
        return $arr;
	}
	public function user_permission_store(Request $request)
	{
		$links = $request->data;
		$userid = $request->id;

		Users_links::whereRaw('users_id = ?', ["{$userid}"])
		->delete();

        if(is_null($links) == false){
		    foreach($links as $link) {
			    Users_links::create([
				    'users_id' =>  $userid,
				    'links_id' => $link
			    ]);
		    }
        }
		return response()->json([
			'status'=> 1, 
			'msg' => 's: ' . __('msg.done'), 
			'toastr' => true
			]);
	}
    public function user_active(Request $request)
	{
		$ids = $request->data;
        $active = $request->active;

        foreach($ids as $id){
            User::where('id',$id)->update([
				'active'   => $active
			]);
        }
		return response()->json([
			'status'=> 1, 
			'msg' => 's: ' . __('msg.done'), 
			'toastr' => true
			]);
	}
	public function test_pdf()
    {
		$dompdf = new Dompdf();
		$dompdf->loadHtml(view('welcome'));
		$dompdf->setPaper('A4', 'portrait');
		$dompdf->render();
		$dompdf->stream('demo.pdf', ['Attachment' => false]);
        return view('welcome');
    }
    
}
