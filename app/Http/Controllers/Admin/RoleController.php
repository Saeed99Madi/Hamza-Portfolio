<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Link;
use App\Models\Role_links;
use Validator;
use Dompdf\Dompdf;
use DB;

class RoleController extends BaseController
{
	public function view()
    {
        return view('cp.role.view');
    }
	public function role_get_data(Request $request)
    {
        $sort_by = $request->sort_by;
        $sort_type = $request->sort_type;

		$start = $request->start;
		$length = $request->length;
		$page = $start / $length;
		$page = $page + 1;

		$q = $request->d;

        $active = $request->active;


        $data = Role::where(function($query) use ($q){
            $query->where('id', '=', $q);
            $query->orWhere('title', 'LIKE', '%'.$q.'%');
        });

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
	public function role_permission($id)
    {
		$links = Link::where('parent_id', 0)->get()->toArray();
		$tree = [];
		foreach($links as $link){
			$icon = 'fa fa-folder text-warning';
			$count =  Link::where([['parent_id','=',$link['id']]])->get()->count();
			
			if($count > 0){
				$icon = 'fa fa-folder text-warning';
			}

			$hasperm = Role_links::whereRaw('links_id = ? and roles_id = ?',["{$link['id']}", "{$id}"])
			->get()->count();
			$node = [
			'id' => $link['id'],
			'text' => $link['title'],
			'state' => [
				'selected'	=> $hasperm > 0,
				'opened'	=> true
			],
			'icon' => $icon,
			];
			
			if($count > 0){
				$node["children"] = $this->perm_tree_fun($link['id'], $id);//[ $this->perm_tree_fun($link['id'], $id) ];
			}
			array_push($tree, $node);
		}
		$json = json_encode($tree);
		$roleid = $id;
        return view('cp.role.permission', compact("json", "roleid"));
    }
	public function perm_tree_fun($id, $roleid){
		$padre =  Link::where([['parent_id','=',$id]])->get()->toArray();  
        $arr = [];
        foreach($padre as $link){
			$count =  Link::where([['parent_id','=',$link['id']]])->get()->count();
			$icon = 'fa fa-folder text-warning';
			if($count > 0){
				$icon = 'fa fa-folder text-warning';
			}

			$hasperm = Role_links::whereRaw('links_id = ? and roles_id = ?',["{$link['id']}", "{$roleid}"])
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
					$node["children"] = $this->perm_tree_fun($link['id'], $roleid);
				}
                array_push($arr, $node);
				//return $node;
		}
        return $arr;
	}
	public function role_permission_store(Request $request)
	{
		$links = $request->data;
		$roleid = $request->id;

		Role_links::whereRaw('roles_id = ?', ["{$roleid}"])
		->delete();

        if(is_null($links) == false){
		    foreach($links as $link) {
			    Role_links::create([
				    'roles_id' =>  $roleid,
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
}
