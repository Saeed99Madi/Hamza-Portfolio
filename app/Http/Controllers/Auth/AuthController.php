<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Link;
use App\Models\Role_links;
use App\Models\user_rols;
use Validator;
use Dompdf\Dompdf;
use DB;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Hash;

class AuthController extends Controller
{
	public function index()
    {
        if (Auth::check()) {
            //return redirect()->route('admin.tohome');
        }
        return view('cp.admin.login');
    }

    /*public function signup(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed'
        ]);
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        $user->save();
        return response()->json([
            'message' => 'Successfully created user!'
        ], 201);
    }*/
  
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:50',
            'password' => 'required|min:6',
        ]);
        $remember_me = $request->has('remember') ? true : false;

        $credentials = $request->only('email', 'password', $remember_me);
        
        if (Auth::attempt($credentials)) {
            //dd(Auth::user()->id);
            $uid = Auth::user()->id;

            $count = user_rols::whereRaw('users_id = ? and roles_id = ?',["{$uid}", 1])
			->get()->count();
            
            if(!$count){

                Session::flash('msg', "e: ". __('login.userAdmin'));
                return redirect(route("admin.login"));
            }

            /*if($remember_me){
                Auth::login(Auth::user()->id, true);
            }*/
            return redirect()->route('admin.home')
              ->withSuccess('You have Successfully loggedin');
        }
        return redirect(route("admin.login"));
    }
  
    public function logout()
    {
        Auth::logout();
        return redirect(route("admin.login"));
        /*return response()->json([
            'message' => 'Successfully logged out'
        ]);*/
    }

    public function user(Request $request)
    {
        return response()->json($request->user());
    }
}
