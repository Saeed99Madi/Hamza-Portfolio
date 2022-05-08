<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kind;
use App\Models\ProjectKind;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Project;
use App\Models\Link;
use App\Models\Users_links;
use App\Models\user_rols;
use App\Models\Role;
use App\Models\ProjectType;
use App\Models\Projecttyp;
use Validator;
use Dompdf\Dompdf;
use DB;

class ProjectController extends BaseController
{
	public function add()
    {
        $kinds = Kind::all();
        $cats = ProjectType::get();
        return view('cp.project.add', compact("cats" , "kinds"));
    }
    public function addpost(Request $request)
    {
//        $files=array();

		$validator = Validator::make($request->all(), [
            'title' => 'required|max:200',
			'desccode' => 'required|max:50000',
            'cost' => 'required|numeric',
            'catid' => 'required',
            'file' => 'required|max:2000|mimes:jpeg,png,jpg,gif,svg',
            'images' => 'max:20000|mimes:jpeg,png,jpg,gif,svg',
        ], [], __('project'));

        $active = $request->active ? 1 : 0;
        $catid = $request['catid'];
        $kindid = $request['kindid'];

		if ($validator->passes())
        {
            $img_cat = '';
            if($file = $request->hasFile('file')) {
                $file = $request->file('file');
                $img_cat = time().'.'.$request->file->getClientOriginalExtension();//$file->getClientOriginalName() ;
                $destinationPath = public_path().'/upload' ;
                $file->move($destinationPath,$img_cat);
            }
            $imagesname = '';
            if($images = $request->hasFile('images')) {

                foreach ($request->images as $key => $image_g){
                    $imageName = time().'.'.$image_g->getClientOriginalExtension();
                    $destinationPath = public_path().'/upload' ;
                    $image_g->move()($destinationPath,$imageName);
                    $imagesname = $imagesname .',' .$imageName;
                }
            }
//            if($files =  $request->file('files')) {
//                $img_name = '';
//                $files = $request->file('files');
//                foreach ($files as $image){
//                    $img_name = time().'.'.$request->file->getClientOriginalExtension();//$file->getClientOriginalName() ;
//                    $destinationPath = public_path().'/upload/images' ;
//                    $file->move($destinationPath,$img_name);
//                    $images = $img_name;
//                }
//
//            }

            $img_icon = '';

            if($file = $request->hasFile('icon')) {
                $file = $request->file('icon');
                $img_icon = 'ic' . time().'.'.$request->icon->getClientOriginalExtension();//$file->getClientOriginalName() ;
                $destinationPath = public_path().'/upload' ;
                $file->move($destinationPath,$img_icon);
            }

            $img_cover = '';
            if($file = $request->hasFile('cover')) {
                $file = $request->file('cover');
                $img_cover = 'ic' . time().'.'.$request->cover->getClientOriginalExtension();//$file->getClientOriginalName() ;
                $destinationPath = public_path().'/upload' ;
                $file->move($destinationPath,$img_cover);
            }

            $user = auth()->user();
            $userid = $user->id;

            $req = $request->all();
            $req["users_id"] = $user->id;

            $data = Project::create([
            'users_id' => $user->id,
            'title' => $request['title'],
            'subtitle' => $request['subtitle'],
            'youtube' => $request['youtube'],
			'desccode' => $request['desccode'],
            'file' => $img_cat,
            'icon' => $img_icon,
            'cover' => $img_cover,
            'cost' => $request['cost'],
            'images'=>$imagesname,
            'active' => $active
            ]);
            //$count = Profile::where('users_id', '=', ["{$userid}"])->count();
            foreach($catid as $x){
                Projecttyp::create([
                    'project_id' => $data->id,
                    'type_id' => $x
                ]);
            }
            foreach($kindid as $x){
                ProjectKind::create([
                    'project_id' => $data->id,
                    'kind_id' => $x
                ]);
            }

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
        $obj = Project::where('id', '=', ["{$id}"])->first();

        if($obj){
                $cats = ProjectType::get();
                $kinds = Kind::get();
            $kinds_obj = $obj->kinds->toArray();

//            foreach ($kinds as $kind){dd($kind->id);}
                $typs = $obj->projectTypes->toArray();
                $typeString = implode(',', array_column($typs, 'id'));

                $typeString_k = implode(',', array_column($kinds_obj, 'id'));

                //dd($myString);
                return view('cp.project.edit', compact('kinds','obj', 'cats', 'typs', 'typeString','typeString_k'));
        }
        else{
            return null;
        }
    }
    public function editpost(Request $request)
    {
        echo ('sdsdsdssdsds');

        if($request->hasFile('file')){
		    $validator = Validator::make($request->all(), [
                'title' => 'required|max:200',
			    'desccode' => 'required|max:5000',
                'cost' => 'required|numeric',
                //'catid' => 'required',
                'file' => 'required|max:2000|mimes:jpeg,png,jpg,gif,svg',
            ], [], __('project'));
        }
        else{
            $validator = Validator::make($request->all(), [
                'title' => 'required|max:200',
			    'desccode' => 'required|max:5000',
                'cost' => 'required|numeric',
            ], [], __('project'));
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



            $img_icon = '';
            if($file = $request->hasFile('icon')) {
                $file = $request->file('icon');
                $img_icon = 'ic' . time().'.'.$request->icon->getClientOriginalExtension();//$file->getClientOriginalName() ;
                $destinationPath = public_path().'/upload' ;
                $file->move($destinationPath,$img_icon);
            }

            $img_cover = '';
            if($file = $request->hasFile('cover')) {
                $file = $request->file('cover');
                $img_cover = 'ic' . time().'.'.$request->cover->getClientOriginalExtension();//$file->getClientOriginalName() ;
                $destinationPath = public_path().'/upload' ;
                $file->move($destinationPath,$img_cover);
            }

            $user = auth()->user();
            $userid = $user->id;
            $id = $request->id;

            $req = $request->all();
            $req["users_id"] = $user->id;
            $catid = $request['catid'];
            $kindid = $request['kindid'];
            $count = Project::where('id',$id)->count();
            if($request->images){
                $project = Project::findOrFail($id);
                $images =explode(',',$project->images) ;
                foreach ($images as $image){
                    unlink(public_path().'/upload'.$image);
                }
                $imagesname = '';
                foreach ($request->images as $key => $image_g){
                    $imageName = time().'.'.$image_g->getClientOriginalExtension();
                    $destinationPath = public_path().'/upload';
                    $image_g->move()($destinationPath,$imageName);
                    $imagesname = $imagesname .','.$imageName;
                }
            }
            if($count > 0){
                Project::where('id',$id)->update([
                'title' => $request['title'],
			    'desccode' => $request['desccode'],
                'cost' => $request['cost'],
                'subtitle' => $request['subtitle'],
                'youtube' => $request['youtube'],
                'active' => $active
                ]);

                if($img_cat){
                    Project::where('id',$id)->update([
                    'file' => $img_cat
                    ]);
                }
                if($img_icon){
                    Project::where('id',$id)->update([
                    'icon' => $img_icon
                    ]);
                }if($imagesname){
                    Project::where('id',$id)->update([
                    'images' => $imagesname,
                    ]);
                }
                if($img_cover){
                    Project::where('id',$id)->update([
                    'cover' => $img_cover
                    ]);
                }
                Projecttyp::where('project_id',$id)->delete();
                if($catid){
                    foreach($catid as $x){
                        Projecttyp::create([
                            'project_id' => $id,
                            'type_id' => $x
                        ]);
                    }
                }
                ProjectKind::where('project_id',$id)->delete();
                if($kindid){
                    foreach($kindid as $x){
                        ProjectKind::create([
                            'project_id' => $id,
                            'kind_id' => $x
                        ]);
                    }
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
        return view('cp.project.index');
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

        $data = Project::where(function($query) {
                $query->orWhere('id', '<>', -1);
            });

        if($q){
            $data = $data->where(function($query) use ($q){
                $query->orWhere('title', 'like', '%' . $q . '%');
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
    public function project_active(Request $request)
	{
		$ids = $request->data;
        $active = $request->active;

        foreach($ids as $id){
            Project::where('id',$id)->update([
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
        $obj = Project::where('id', '=', ["{$id}"])->first();
        if($obj){
          if($type == 1){
              return response()->file("upload/".$obj->file);
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
