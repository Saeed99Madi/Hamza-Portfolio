<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Application;
use App\Models\User;
use App\Models\Link;
use App\Models\Users_links;
use App\Models\user_rols;
use App\Models\Role;
use Validator;
use Dompdf\Dompdf;
use DB;
//use File;
class ApplicationController extends ClientBaseController
{
    public function view()
    {
        return view('cp.client.application.view');
    }
    public function ajax(Request $request)
    {
        $sort_by = $request->sort_by;
        $sort_type = $request->sort_type;

		$start = $request->start;
		$length = $request->length;
		$page = $start / $length;
		$page = $page + 1;
		
		$q = $request->d;

        $user = auth()->user();
        $userid = $user->id;

        $data = Application::where(function($query) use ($q){
            $query->where('id', 'LIKE', '%'.$q.'%');
            $query->orWhere('project_title', 'LIKE', '%'.$q.'%');
            $query->orWhere('project_place', 'LIKE', '%'.$q.'%');
        });

        $data->where('users_id',$userid);

        /*if(is_null($active) == false){
            $data->where('active',$active);
        }*/
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


		dd($request);
	}
    public function index()
    {
        $user = auth()->user();
        $userid = $user->id;
        $prof = Profile::where('users_id', '=', ["{$userid}"])->first();
        //dd($prof);
        return view('cp.client.application.add', compact('prof'));
    }
	public function store(Request $request)
    {
    
		$validator = Validator::make($request->all(), [
            'name' => 'required|max:200',
			'identity' => 'required|numeric|digits:9',
			'study' => 'required|max:100',
            'dob' => 'required|max:50',
            'mobile' => 'required|numeric',
            'address' => 'required|max:200',
            'family_num' => 'required|numeric',
            'income_1' => 'required',
            'job_now' => 'required|max:100',
            'income_monthly' => 'required',
            'craft' => 'required',
            'years_without_job' => 'required',
            'partner_job' => 'required|max:100',

            'project_title' => 'required|max:200',
            'project_place' => 'required|max:100',
            'project_type' => 'required|numeric',
            'project_desc'=> 'required|max:2000',
            'project_req'=> 'required|max:2000',
            'project_beneficiary'=> 'required|max:2000',
            'project_cost' => 'required|numeric',
            'project_finance' => 'required|numeric',
            'project_income_monthly_expected' => 'required|numeric',
            'project_pay' => 'required',
            'project_similar' => 'required|numeric',
            'project_administrator' => 'required|numeric',

            'kafel1_name' => 'required|max:200',
            'kafel1_identity' => 'required|numeric|digits:9',
            'kafel1_address' => 'required|max:100',
            'kafel1_tell' => 'required|max:50',
            'kafel1_salary' => 'required|max:50',
            'kafel1_account' => 'required',
            'kafel1_job_place' => 'required',
            'kafel1_bank' => 'required|max:100',


            'kafel2_name' => 'required|max:200',
            'kafel2_identity' => 'required|numeric|digits:9',
            'kafel2_address' => 'required|max:100',
            'kafel2_tell' => 'required|max:50',
            'kafel2_salary' => 'required|numeric',
            'kafel2_account' => 'required|numeric',
            'kafel2_job_place' => 'required',
            'kafel2_bank' => 'required|max:100',

            'img_identity' => 'required|max:2000|mimes:jpeg,png,jpg,gif,svg',
            //'img_identity' => '',

            'img_salary' => 'required|max:2000|mimes:jpeg,png,jpg,gif,svg',


            'img_kafel_identity' => 'required|max:2000|mimes:jpeg,png,jpg,gif,svg',


            'img_kafel_salary' => 'required|max:2000|mimes:jpeg,png,jpg,gif,svg',


            'img_finance' => 'required|max:2000|mimes:jpeg,png,jpg,gif,svg',

            
        ], [], __('appadd'));
        
		if ($validator->passes()) 
        {
            if($request['project_administrator'] == 2 && is_null($request["project_administrator_other"])){
                return response()->json([
			    'status'=> 1, 
			    'msg' => 'e: ' . __('appadd.project_administrator'), 
			    'toastr' => true,
			    ]);
            }
            $img_identity = '';
            if($file = $request->hasFile('img_identity')) {
                $file = $request->file('img_identity');
                $img_identity = time().'.'.$request->img_identity->getClientOriginalExtension();//$file->getClientOriginalName() ;
                $destinationPath = public_path().'/upload' ;
                $file->move($destinationPath,$img_identity);
            }

            $img_salary = '';
            if($file2 = $request->hasFile('img_salary')) {
                $file2 = $request->file('img_salary') ;
                $img_salary = '4'.time().'.'.$request->img_salary->getClientOriginalExtension();//$file->getClientOriginalName() ;
                $destinationPath = public_path().'/upload' ;
                $file2->move($destinationPath,$img_salary);
            }

            $img_kafel_identity = '';
            if($file3 = $request->hasFile('img_kafel_identity')) {
                $file3 = $request->file('img_kafel_identity') ;
                $img_kafel_identity = '1'. time().'.'.$request->img_kafel_identity->getClientOriginalExtension();//$file->getClientOriginalName() ;
                $destinationPath = public_path().'/upload' ;
                $file3->move($destinationPath,$img_kafel_identity);
            }

            $img_kafel_salary = '';
            if($file4 = $request->hasFile('img_kafel_salary')) {
                $file4 = $request->file('img_kafel_salary') ;
                $img_kafel_salary = '2'.time().'.'.$request->img_kafel_salary->getClientOriginalExtension();//$file->getClientOriginalName() ;
                $destinationPath = public_path().'/upload' ;

                $file4->move($destinationPath,$img_kafel_salary);
            }

            $img_finance = '';
            if($file5 = $request->hasFile('img_finance')) {
                $file5 = $request->file('img_finance') ;
                $img_finance = '3'.time().'.'.$request->img_finance->getClientOriginalExtension();//$file->getClientOriginalName() ;
                $destinationPath = public_path().'/upload' ;
                $file5->move($destinationPath,$img_finance);
            }

            $user = auth()->user();
            $userid = $user->id;

            $req = $request->all();
            $req["users_id"] = $user->id;

            

            Application::create([
            'users_id' => $user->id,
            'fullname' => $request['name'],
			'identity' => $request['identity'],
			'study' => $request['study'],
            'dob' => $request['dob'],
            'mobile' => $request['mobile'],
            'address' => $request['address'],
            'family_num' => $request['family_num'],
            'income_1' => $request['income_1'],
            'job_now' => $request['job_now'],
            'income_monthly' => $request['income_monthly'],
            'craft' => $request['craft'],
            'years_without_job' => $request['years_without_job'],
            'partner_job' => $request['partner_job'],

            'project_title' => $request['project_title'],
            'project_place' => $request['project_place'],
            'project_type' => $request['project_type'],
            'project_desc'=> $request['project_desc'],
            'project_req'=> $request['project_req'],
            'project_beneficiary'=> $request['project_beneficiary'],
            'project_cost' => $request['project_cost'],
            'project_finance' => $request['project_finance'],
            'project_income_monthly_expected' => $request['project_income_monthly_expected'],
            'project_pay' => $request['project_pay'],
            'project_similar' => $request['project_similar'],
            'project_administrator' => $request['project_administrator'],

            'kafel1_name' => $request['kafel1_name'],
            'kafel1_identity' => $request['kafel1_identity'],
            'kafel1_address' => $request['kafel1_address'],
            'kafel1_tell' => $request['kafel1_tell'],
            'kafel1_salary' => $request['kafel1_salary'],
            'kafel1_account' => $request['kafel1_account'],
            'kafel1_job_place' => $request['kafel1_job_place'],
            'kafel1_bank' => $request['kafel1_bank'],


            'kafel2_name' => $request['kafel2_name'],
            'kafel2_identity' => $request['kafel2_identity'],
            'kafel2_address' => $request['kafel2_address'],
            'kafel2_tell' => $request['kafel2_tell'],
            'kafel2_salary' => $request['kafel2_salary'],
            'kafel2_account' => $request['kafel2_account'],
            'kafel2_job_place' => $request['kafel2_job_place'],
            'kafel2_bank' => $request['kafel2_bank']
            ]);
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
    public function page4($id){
        $user = auth()->user();
        $userid = $user->id;
        $prof = Profile::where('users_id', '=', ["{$userid}"])->first();

        $app = Application::where('users_id', '=', ["{$userid}"])
        ->where('id', '=', ["{$id}"])
        ->first();

        if(!$app){
            return redirect(route('client-no-access'));
        }
        //dd($app);
        return view('cp.client.pdf.page4', compact('app', 'prof'));
    }
}
