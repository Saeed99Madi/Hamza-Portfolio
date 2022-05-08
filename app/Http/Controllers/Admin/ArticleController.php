<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Article;
use App\Models\Link;
use App\Models\Users_links;
use App\Models\user_rols;
use App\Models\Role;
use Validator;
use Dompdf\Dompdf;
use DB;
use Illuminate\Support\Facades\Storage;

class ArticleController extends BaseController
{
	public function add()
    {
        $cats = Category::get();
        return view('cp.article.add', compact("cats"));
    }
    public function addpost(Request $request)
    {

		$validator = Validator::make($request->all(), [
            'title' => 'required|max:200',
            'subtitle' => 'required|max:200',
			'desccode' => 'required|max:20000',
            'date' => 'required|max:50',
            'catid' => 'required',
            'file' => 'required|max:2000|mimes:jpeg,png,jpg,gif,svg',
        ], [], __('art'));

        $active = $request->active ? 1 : 0;

		if ($validator->passes())
        {
            $img_art = '';
            if($file = $request->hasFile('file')) {
                $file = $request->file('file');
                $img_art = time().'.'.$request->file->getClientOriginalExtension();//$file->getClientOriginalName() ;
                $destinationPath = public_path().'/upload' ;
                $file->move($destinationPath,$img_art);
            }

            $user = auth()->user();
            $userid = $user->id;

            $req = $request->all();
            $req["users_id"] = $user->id;

            Article::create([
            'users_id' => $user->id,
            'title' => $request['title'],
            'subtitle' => $request['subtitle'],
            'date' => $request['date'],
            'catid' => $request['catid'],
			'desccode' => $request['desccode'],
            'file' => $img_art,
            'active' => $active
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
        $obj = Article::where('id', '=', ["{$id}"])->first();

        if($obj){
                $cats = Category::get();
                return view('cp.article.edit', compact('obj', 'cats'));
        }
        else{
            return null;
        }
    }
    public function editpost(Request $request)
    {
        if($request->hasFile('file')){
		    $validator = Validator::make($request->all(), [
                'title' => 'required|max:200',
                'subtitle' => 'required|max:200',
			    'desccode' => 'required|max:5000',
                'date' => 'required|max:50',
                'catid' => 'required',
                'file' => 'required|max:2000|mimes:jpeg,png,jpg,gif,svg',
            ], [], __('cat'));
        }
        else{
            $validator = Validator::make($request->all(), [
                'title' => 'required|max:200',
                'subtitle' => 'required|max:200',
			    'desccode' => 'required|max:20000',
                'date' => 'required|max:50',
                'catid' => 'required',
            ], [], __('art'));
        }
        $active = $request->active ? 1 : 0;

		if ($validator->passes())
        {
            $img_art = '';
            if($file = $request->hasFile('file')) {
                $file = $request->file('file');
                $img_art = time().'.'.$request->file->getClientOriginalExtension();//$file->getClientOriginalName() ;
                $destinationPath = public_path().'/upload' ;
                $file->move($destinationPath,$img_art);
            }

            $user = auth()->user();
            $userid = $user->id;
            $id = $request->id;

            $req = $request->all();
            $req["users_id"] = $user->id;

            $count = Article::where('id',$id)->count();

            if($count > 0){
                Article::where('id',$id)->update([
                    'title' => $request['title'],
                    'subtitle' => $request['subtitle'],
                    'date' => $request['date'],
                    'catid' => $request['catid'],
			        'desccode' => $request['desccode'],
                    'active' => $active
                ]);

                if($img_art){
                    Article::where('id',$id)->update([
                    'file' => $img_art
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
        return view('cp.article.index');
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

        $data = Article::where(function($query) {
                $query->orWhere('id', '<>', -1);
            });

        if($q){
            $data = $data->where(function($query) use ($q){
                $query->orWhere('title', 'like', '%' . $q . '%');
                $query->orWhere('desccode', 'like', '%' . $q . '%');
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
            Article::where('id',$id)->update([
				'active'   => $active
			]);
        }
		return response()->json([
			'status'=> 1,
			'msg' => 's: ' . __('msg.done'),
			'toastr' => true
			]);
	}
    public function getimg($id)
    {
        $obj = Article::where('id', '=', ["{$id}"])->first();
        if($obj){
        //dd(storage_path());
            return response()->file("upload/".$obj->file);
        }
        else{
            return null;
        }
    }
}
