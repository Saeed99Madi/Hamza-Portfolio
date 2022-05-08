<?php

namespace App\Http\Controllers\AuthClient;

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
use App\Models\UserVerify;
use Hash;
use Illuminate\Support\Str;
use Mail;

class AuthClientController extends Controller
{
	public function index()
    {
        if (Auth::check()) {
            //return redirect()->route('admin.tohome');
        }
        return view('cp.client.login');
    }
    public function signup()
    {
        return view('cp.client.signup');
    }
    public function postSignup(Request $request)
    {
        $email = $request['email'];
        $firstname = $request['first-name'];
        $lastname = $request['last-name'];

        $request->validate([
            'first-name' => 'required|max:50',
            'last-name' => 'required|max:50',
			'email' => 'required|email|max:50',
			'password' => 'required|confirmed|min:6',
        ], [], __('signup'));
        $users = User::where('email', '=' ,$email)->count();
        if($users > 0){
            Session::flash('msg', "e: ". __('signup.exist'));
            return redirect()->route('client.signup')
            ->with('email', $email)
            ->with('first-name', $firstname)
            ->with('last-name', $lastname);
            ;
        }
        $createUser = User::create([
				'name' =>  $request['first-name'] . ' ' , $request['last-name'],
				'email' => $request['email'],
				'password' => bcrypt($request['password']),
				'active'   => 1
			]);

            user_rols::create([
				    'users_id' =>  $createUser->id,
				    'roles_id' => 2
			    ]);

            $token = Str::random(64);

            UserVerify::create([
              'user_id' => $createUser->id, 
              'token' => $token
            ]);

        Mail::send('email.emailVerificationEmail', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject(__('signup.EmailVerification'));
          });
        Session::flash('msg', "w: ". __('signup.verifyEmail'));

        return redirect()->route('client.login');
    }
    
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {
            //dd(Auth::user()->id);
            $uid = Auth::user()->id;

            $count = user_rols::whereRaw('users_id = ? and roles_id = ?',["{$uid}", 2])
			->get()->count();
            
            if(!$count){

                Session::flash('msg', "e: ". __('login.userAdmin'));
                return redirect(route("client.login"));
            }

            return redirect()->route('client.home');
        }
        Session::flash('msg', "e: ". __('signup.loginFailed'));
        return redirect(route("client.login"));
    }
  
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect(route("client.login"));
        /*return response()->json([
            'message' => 'Successfully logged out'
        ]);*/
    }

    public function user(Request $request)
    {
        return response()->json($request->user());
    }
    public function verifyAccount($token)
    {
        $verifyUser = UserVerify::where('token', $token)->first();

        $message = __('signup.emailNotfound');
  
        if(!is_null($verifyUser) ){
         
            $user = $verifyUser->user;
            if(!$user->is_email_verified) {
                $verifyUser->user->is_email_verified = 1;
                $verifyUser->user->save();
                $message = __('signup.emailFound');
            } else {
                $message = __('signup.emailVerified');
            }
        }
      Session::flash('msg', "s: ". $message);
      return redirect()->route('client.login');
    }
}
