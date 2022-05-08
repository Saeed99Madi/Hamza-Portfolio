<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;
use App\Models\Link;
use App\Models\Users_links;
use App\Models\user_rols;
use App\Models\Role;
use App\Models\Beneficiary;
use App\Models\Temp;
use Validator;
use Dompdf\Dompdf;
use DB;
use Maatwebsite\Excel\Facades\Excel;
//use Input;
//use Excel;
use App\Imports\BeneficiarysImport;
use App\Imports\TempImport;
use App\Imports\BeneficiarysEditImport;
use Response;
use App\Exports\BeneExport;
use Session;

class BeneficiaryController extends ClientBaseController
{
    public function view()
    {
        return view('cp.client.beneficiary.view');
    }
    public function ajax(Request $request)
    {
        $sort_by = $request->sort_by;
        $sort_type = $request->sort_type;

		$start = $request->start;
		$length = $request->length;
		$page = $start / $length;
		$page = $page + 1;
		
		//$q = $request->d;

        $user = auth()->user();
        $userid = $user->id;

        //DB::enableQueryLog(); // Enable query log


        /*$data = Beneficiary::where(function($query) use ($q){
            $query->where('id', 'LIKE', '%'.$q.'%');
            $query->orWhere('name', 'LIKE', '%'.$q.'%');
            $query->orWhere('identity', '=', $q);
            $query->orWhere('city', 'like', '%'.$q.'%');
            $query->orWhere('project', 'like', '%'.$q.'%');
            $query->orWhere('partnarId', '=', $q);
            $query->orWhere('partnarName', '=', '%'.$q.'%');
        });*/

        $identity = $request->identity;
        $name = $request->name;
        $donor = $request->donor;
        $institute = $request->institute;
        $project = $request->project;
        $project_type = $request->project_type;
        $date_from = $request->date_from;
        $date_to = $request->date_to;
        $p_project_type = $request->p_project_type;
        $p_project = $request->p_project;
        $p_date = $request->p_date;
        $book = $request->book;
        $ch_date = $request->ch_date;
        $city = $request->city;

        $data = Beneficiary::where(function($query) {
                $query->orWhere('identity', '<>', -1);
            });

        if($identity){
            $data = $data->where(function($query) use ($identity){
                $query->orWhere('identity', '=', $identity);
                $query->orWhere('partnarId', '=', $identity);
            });
        }
        if($name){
            $name = str_replace(' ', '%', $name);
            $data = $data->where(function($query) use ($name){
                $query->orWhere('name', 'like', '%' . $name . '%');
                $query->orWhere('partnarName', 'like', '%' . $name . '%');
            });
        }
        if($donor){
            $data = $data->where(function($query) use ($donor){
                $query->orWhere('donor', 'like', $donor);
            });
        }
        if($book){
            $data = $data->where(function($query) use ($book){
                $query->orWhere('book', '=', $book);
            });
        }
        if($city){
            $data = $data->where(function($query) use ($city){
                $query->orWhere('city', '=', $city);
            });
        }
        if($institute){
            $data = $data->where(function($query) use ($institute){
                $query->orWhere('institute', 'like', $institute);
            });
        }
        if($project){
            $data = $data->where(function($query) use ($project){
                $query->orWhere('project', 'like', $project);
            });
        }
        if($project_type){
            $data = $data->where(function($query) use ($project_type){
                $query->orWhere('project_type', 'like', $project_type);
            });
        }
        if($date_from){
            $date = explode('/', $date_from);
            $date_from = $date[2] . '-' . $date[1] . '-' . $date[0];

            $date = explode('/', $date_to);
            $date_to = $date[2] . '-' . $date[1] . '-' . $date[0];
            //$from = date('d/m/Y',$date_from);//date('2018-01-01');
            //$to = date('d/m/Y',strtotime($date_to));//date('2018-05-02');

            //dd($date_from);
            $data = $data->whereBetween('date', [$date_from, $date_to]);
        }
        if($p_project_type || $p_project){
            $v_date = '';
            if($ch_date == 1){
                $date = explode('/', $p_date);
                $p_date = $date[2] . '-' . $date[1] . '-' . $date[0];

                $v_date = 'YEAR(be.date) = '.$date[2].' and';
            }

            $type = '';
            if($p_project_type){
                $type = 'and be.project_type = \''.$p_project_type.'\'';
            }
            $v_project = '';
            if($p_project){
                $v_project = 'and be.project = \''.$p_project.'\'';
            }
             $data->whereRaw('(select count(1) from beneficiaries be where '.$v_date.'  be.identity = beneficiaries.identity '.$type.' '.$v_project.') = 0');
        }
        

        
        //$data->where('users_id',$userid);

        /*if(is_null($active) == false){
            $data->where('active',$active);
        }*/
        if($sort_by){
            $data->orderBy($sort_by, $sort_type);
        }

		$total = $data->get()->count();

		$data = $data->paginate($length, ['*'], 'page', $page)->all();

        //dd(DB::getQueryLog()); // Show results of log
        
		$totalRecords = $total;
		$totalDisplay = $total;
		$result = [
            'recordsTotal'    => $totalRecords,
            'recordsFiltered' => $totalDisplay,
            'data'            => $data,
        ];
		return response()->json($result);
	}
    public function typeahead(Request $request){
        //$parm = $request->parm;
        //$data = Beneficiary::select('name')->distinct()->get();

        $parm = $request->parm;
        $query = $request->all()["query"];
        $query = str_replace(' ', '%', $query);
        $q = '%' . $query . '%';
        $data = DB::table('beneficiaries')
        ->where($parm, 'like', $q)
        ->select($parm . ' as name')
        ->distinct($parm)->get();


        //$data = Beneficiary::select('project_type')->distinct()->get();//::where($parm, 'like', $query)
        //dd($data);

        return response()->json($data);
    }

    public function export(Request $request)
    {
        $user = auth()->user();
        $userid = $user->id;

        $identity = $request->identity;
        $name = $request->name;
        $donor = $request->donor;
        $institute = $request->institute;
        $project = $request->project;
        $project_type = $request->project_type;
        $date_from = $request->date_from;
        $date_to = $request->date_to;
        $p_project_type = $request->p_project_type;
        $p_project = $request->p_project;
        $p_date = $request->p_date;
        $book = $request->book;
        $ch_date = $request->ch_date;
        $city = $request->city;

        $data = Beneficiary::where(function($query) {
                $query->orWhere('identity', '<>', -1);
            });

        if($identity){
            $data = $data->where(function($query) use ($identity){
                $query->orWhere('identity', '=', $identity);
                $query->orWhere('partnarId', '=', $identity);
            });
        }
        if($name){
            $name = str_replace(' ', '%', $name);
            $data = $data->where(function($query) use ($name){
                $query->orWhere('name', 'like', '%' . $name . '%');
                $query->orWhere('partnarName', 'like', '%' . $name . '%');
            });
        }
        if($donor){
            $data = $data->where(function($query) use ($donor){
                $query->orWhere('donor', 'like', $donor);
            });
        }
        if($book){
            $data = $data->where(function($query) use ($book){
                $query->orWhere('book', '=', $book);
            });
        }
        if($city){
            $data = $data->where(function($query) use ($city){
                $query->orWhere('city', '=', $city);
            });
        }
        if($institute){
            $data = $data->where(function($query) use ($institute){
                $query->orWhere('institute', 'like', $institute);
            });
        }
        if($project){
            $data = $data->where(function($query) use ($project){
                $query->orWhere('project', 'like', $project);
            });
        }
        if($project_type){
            $data = $data->where(function($query) use ($project_type){
                $query->orWhere('project_type', 'like', $project_type);
            });
        }
        if($date_from){
            $date = explode('/', $date_from);
            $date_from = $date[2] . '-' . $date[1] . '-' . $date[0];

            $date = explode('/', $date_to);
            $date_to = $date[2] . '-' . $date[1] . '-' . $date[0];
            
            $data = $data->whereBetween('date', [$date_from, $date_to]);
        }
        if($p_project_type || $p_project){
            $v_date = '';
            if($ch_date == 1){
                $date = explode('/', $p_date);
                $p_date = $date[2] . '-' . $date[1] . '-' . $date[0];

                $v_date = 'YEAR(be.date) = '.$date[2].' and';
            }

            $type = '';
            if($p_project_type){
                $type = 'and be.project_type = \''.$p_project_type.'\'';
            }
            $v_project = '';
            if($p_project){
                $v_project = 'and be.project = \''.$p_project.'\'';
            }
             $data->whereRaw('(select count(1) from beneficiaries be where '.$v_date.'  be.identity = beneficiaries.identity '.$type.' '.$v_project.') = 0');
        }
        $header = ["#", "الإسم", "تاريخ الإدخال", "تاريخ التعديل", "رقم الهوية", "المنطقه", "هوية الشريك", "إسم الشريك", "إسم المشروع", "المؤوسسه", "الممول", "الميزانية", "العملة", "تاريخ الإستفاده", "نوع المشروع", "الكشف" ];
        return Excel::download(new BeneExport($data, $header), 'bene.xlsx');
	}
	public function upload()
    {
        return view('cp.client.beneficiary.upload');
    }
    public function postUploadCsv(Request $request)
    {
        $rules = array(
            'file' => 'required|max:2000|mimes:xlsx',
            //'num_records' => 'required',
        );

        $validator = Validator::make($request->all(), $rules);
        // process the form
        if ($validator->fails()) 
        {
            //return Redirect::to('cp.client.beneficiary.upload')->withErrors($validator);
            return response()->json([
            'error'=>$validator->errors()->messages(),
            //'ErrorController' => true
            'error_inner' => true
            ]);
        }
        else 
        {
            $excel = '';
            $destinationPath = '';
                if($file = $request->hasFile('file')) {
                    $file = $request->file('file');
                    $excel = time().'.'.$request->file->getClientOriginalExtension();//$file->getClientOriginalName() ;
                    $destinationPath = public_path().'\upload' ;
                    $file->move($destinationPath,$excel);
                }

            try {
            //dd($destinationPath .'\\'. $excel);
                Excel::import(new BeneficiarysImport, $destinationPath .'\\'. $excel);

                /*Excel::load($destinationPath .'\\'. $excel, function ($reader) {

                    foreach ($reader->toArray() as $row) {
                        //User::firstOrCreate($row);
                    }
                });*/
                return response()->json([
			    'status'=> 1, 
			    'msg' => 's: ' . __('msg.done'), 
			    'toastr' => true//,
			    //'reset' => true
			    ]);

            } catch (\Exception $e) {
                return response()->json([
			    'status'=> -1, 
			    'msg' => 'e: ' . $e->getMessage(), 
			    'toastr' => true//,
			    //'reset' => true
			    ]);

                //\Session::flash('error', $e->getMessage());
                //return redirect(route('cp.client.beneficiary.upload'));
            }
        } 
    }
    public function create()
    {
        return view('cp.client.beneficiary.create');
    }
	public function createPost(Request $request)
    {
		$validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
			'identity' => 'required|numeric|digits:9',
			'city' => 'required|max:50',
            'project' => 'required|max:100',
            'institute' => 'required|max:100',
            'donor' => 'required|max:100',
            'budget' => 'required|numeric',
            'date' => 'required',
            'project_type' => 'required',
            'book' => 'required',
        ], [], __('ben'));
		if ($validator->passes()) {
            $user = auth()->user();
            $userid = $user->id;

            $date = explode('/',$request['date']);
            $date_val = $date[2] . '-' . $date[1] . '-' . $date[0];

            Beneficiary::create([
				    'name' =>  $request['name'],
				    'identity' => $request['identity'],
				    'city' => $request['city'],
                    'project' => $request['project'],
                    'institute' => $request['institute'],
                    'donor' => $request['donor'],
                    'budget' => $request['budget'],
                    'project_type' => $request['project_type'],
                    'book' => $request['book'],
                    'date' => $date_val,
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
        'toastr' => true,
        //'ErrorController' => true
        ]);
    }
    public function edit($id)
    {
         $ob = Beneficiary::where('id', $id)->first();
        return view('cp.client.beneficiary.edit', compact('ob'));
    }
    public function editPost(Request $request)
    {
		$validator = Validator::make($request->all(), [
            'id' => 'required',
            'name' => 'required|max:50',
			'identity' => 'required|numeric|digits:9',
			'city' => 'required|max:50',
            'project' => 'required|max:100',
            'institute' => 'required|max:100',
            'donor' => 'required|max:100',
            'budget' => 'required|numeric',
            'date' => 'required',
            'project_type' => 'required',
            'book' => 'required',
        ], [], __('ben'));
		if ($validator->passes()) {
            $user = auth()->user();
            $userid = $user->id;
            $id = $request['id'];

                $date = explode('/',$request['date']);
                $date_val = $date[2] . '-' . $date[1] . '-' . $date[0];

                Beneficiary::where('id', $id)->update([
				    'name' =>  $request['name'],
				    'identity' => $request['identity'],
				    'city' => $request['city'],
                    'project' => $request['project'],
                    'institute' => $request['institute'],
                    'donor' => $request['donor'],
                    'budget' => $request['budget'],
                    'project_type' => $request['project_type'],
                    'book' => $request['book'],
                    'date' => $date_val,
			    ]);
                

			return response()->json([
			'status'=> 1, 
			'msg' => 's: ' . __('msg.done'), 
			'toastr' => true,
			//'reset' => true
			]);
        }
    	return response()->json([
        'error'=>$validator->errors()->messages(),
        'toastr' => true,
        //'ErrorController' => true
        ]);
    }
    public function getDownload()
    {
        $file= public_path(). "/download/file.xlsx";

        $headers = array(
                  'Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                );

        return Response::download($file, 'file.xlsx', $headers);
    }
    public function getDownload2()
    {
        $file= public_path(). "/download/file2.xlsx";

        $headers = array(
                  'Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                );

        return Response::download($file, 'file.xlsx', $headers);
    }

    public function uploadEdit()
    {
        return view('cp.client.beneficiary.uploadEdit');
    }
    public function postUploadEditCsv(Request $request)
    {
        $rules = array(
            'file' => 'required|max:2000|mimes:xlsx',
            //'num_records' => 'required',
        );

        $validator = Validator::make($request->all(), $rules);
        // process the form
        if ($validator->fails()) 
        {
            //return Redirect::to('cp.client.beneficiary.upload')->withErrors($validator);
            return response()->json([
            'error'=>$validator->errors()->messages(),
            //'ErrorController' => true
            'error_inner' => true
            ]);
        }
        else 
        {
            $excel = '';
            $destinationPath = '';
                if($file = $request->hasFile('file')) {
                    $file = $request->file('file');
                    $excel = time().'.'.$request->file->getClientOriginalExtension();//$file->getClientOriginalName() ;
                    $destinationPath = public_path().'\upload' ;
                    $file->move($destinationPath,$excel);
                }

            try {
                $rows = Excel::toArray(new BeneficiarysEditImport, $destinationPath .'\\'. $excel);
                    foreach($rows as $row) {
                        $identity = $row[0][0];
                        $partnarId = $row[0][1];
                        $partnarName = $row[0][2];
                        Beneficiary::where('identity', $identity)->update([
				            'partnarId' =>  $partnarId,
				            'partnarName' => $partnarName
			            ]);

                        //dd($row[0][0]);
                    }

                return response()->json([
			    'status'=> 1, 
			    'msg' => 's: ' . __('msg.done'), 
			    'toastr' => true//,
			    //'reset' => true
			    ]);

            } catch (\Exception $e) {
                return response()->json([
			    'status'=> -1, 
			    'msg' => 'e: ' . $e->getMessage(), 
			    'toastr' => true
			    ]);
            }
        } 
    }

    public function postCheckViewCsv(){
        return view('cp.client.beneficiary.checkCsv');
    }

    public function postCheckCsv(Request $request)
    {
        /*$rules = array(
            'file' => 'required|max:2000|mimes:xlsx',
        );*/

        //$validator = Validator::make($request->all(), $rules);
        $validator = Validator::make($request->all(), [
            'file' => 'required|max:2000|mimes:xlsx'
        ], [], __('ben'));

        if ($validator->fails()) 
        {
            /*return response()->json([
            'error'=>$validator->errors()->messages(),
            //'ErrorController' => true
            'error_inner' => true
            ]);*/
            
            \Session::flash('msg','e: '. $validator->errors()->messages()["file"][0]);
            return redirect(route('client.beneficiary.postCheckViewCsv'));
        }
        else 
        {
            $excel = '';
            $time = time();
            $destinationPath = '';
                if($file = $request->hasFile('file')) {
                    $file = $request->file('file');
                    $excel = $time.'.'.$request->file->getClientOriginalExtension();//$file->getClientOriginalName() ;
                    $destinationPath = public_path().'\upload' ;
                    $file->move($destinationPath,$excel);
                }

            try {
                Excel::import(new TempImport($time), $destinationPath .'\\'. $excel);

                $data = Temp::where(function($query) use ($time){
                    $query->orWhere('name', '=', $time);
                });
                $filter = $request->filter;

                $arr = $data->pluck('identity')->toArray();
                $str = implode("," , $data->pluck('identity')->toArray());


                if($filter == 1){
                    $list = Beneficiary::where(function($query) use ($arr){
                        $query->whereIn('identity', $arr);
                    });
                }
                else{
                    $list = Beneficiary::where(function($query) use ($arr){
                        foreach($arr as $r){
                            $query->orWhereRaw('partnarId like' . '\'%' .$r . '%\'');
                        }
                        //$query->whereIn('partnarId', $arr);
                    });
                }

                $project = $request->project;
                $project_type = $request->type;

                if($project){
                    //$project = implode("," , $project);
                    $list = $list->where(function($query) use ($project){
                        foreach($project as $r){
                            $query->orWhereRaw('project =' . '\'' .$r . '\'');
                        }
                    });
                }
                if($project_type){
                    //$project_type = implode("," , $project_type);
                    $list = $list->where(function($query) use ($project_type){
                        foreach($project_type as $r){
                            $query->orWhereRaw('project_type =' . '\'' .$r . '\'');
                        }
                    });
                }

                $list->selectRaw('`id`, `name`, `created_at`, `updated_at`, `identity`, `city`, `partnarId`, `partnarName`, `project`, `institute`, `donor`, `budget`, `currency`, `date`, `project_type`, `book`, (select id from `temps` where temps.identity = beneficiaries.identity and name = '.$time.' LIMIT 1) AS  `order`');
                $list->orderBy('order', 'asc');

                $header = ["#", "الإسم", "تاريخ الإدخال", "تاريخ التعديل", "رقم الهوية", "المنطقه", "هوية الشريك", "إسم الشريك", "إسم المشروع", "المؤوسسه", "الممول", "الميزانية", "العملة", "تاريخ الإستفاده", "نوع المشروع", "الكشف", "order" ];
                return Excel::download(new BeneExport($list, $header), 'bene.xlsx');

                //dd();

                return response()->json([
			    'status'=> 1, 
			    'msg' => 's: ' . __('msg.done'), 
			    'toastr' => true//,
			    ]);

            } catch (\Exception $e) {
                /*return response()->json([
			    'status'=> -1, 
			    'msg' => 'e: ' . $e->getMessage(), 
			    'toastr' => true//,
			    //'reset' => true
			    ]);
                */
                \Session::flash('msg','e: '. $e->getMessage());
                return redirect(route('client.beneficiary.postCheckViewCsv'));
            }
        } 
    }
    public function getDownload3()
    {
        $file= public_path(). "/download/file3.xlsx";

        $headers = array(
                  'Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                );

        return Response::download($file, 'file.xlsx', $headers);
    }
}
