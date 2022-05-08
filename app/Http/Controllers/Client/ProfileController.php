<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;
use App\Models\Link;
use App\Models\Users_links;
use App\Models\user_rols;
use App\Models\Role;
use Validator;
use Dompdf\Dompdf;
use DB;

class ProfileController extends ClientBaseController
{
	public function index2()
    {
        return view('cp.client.home');
    }
    public function index()
    {
        $user = auth()->user();
        $userid = $user->id;
        $prof = Profile::where('users_id', '=', ["{$userid}"])->first();
        //dd($prof);
        return view('cp.client.profile', compact('prof'));
    }
	public function store(Request $request)
    {
		$validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
			'identity' => 'required|numeric|digits:9',
			'account' => 'required|max:50',
            'first_kafel_name' => 'required|max:50',
            'first_kafel_account' => 'required|numeric|digits_between:1,10',
            'second_kafel_name' => 'required|max:50',
            'second_kafel_account' => 'required|numeric|digits_between:1,10',
        ]);
		if ($validator->passes()) {
            $user = auth()->user();
            $userid = $user->id;
            $count = Profile::where('users_id', '=', ["{$userid}"])->count();
            if($count == 0){
			    Profile::create([
				    'name' =>  $request['name'],
				    'identity' => $request['identity'],
				    'account' => $request['account'],
                    'first_kafel_name' => $request['first_kafel_name'],
                    'first_kafel_account' => $request['first_kafel_account'],
                    'second_kafel_name' => $request['second_kafel_name'],
                    'second_kafel_account' => $request['second_kafel_account'],
                    'users_id' => $user->id,
			    ]);
            }
            else{
                Profile::where('users_id',$userid)->update([
				    'name' =>  $request['name'],
				    'identity' => $request['identity'],
				    'account' => $request['account'],
                    'first_kafel_name' => $request['first_kafel_name'],
                    'first_kafel_account' => $request['first_kafel_account'],
                    'second_kafel_name' => $request['second_kafel_name'],
                    'second_kafel_account' => $request['second_kafel_account'],
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
        'ErrorController' => true
        ]);
    }
    
}
