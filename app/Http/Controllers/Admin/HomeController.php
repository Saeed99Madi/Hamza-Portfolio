<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Link;
use App\Models\Role_links;
use Validator;
use Dompdf\Dompdf;
use DB;
use Session;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.menu');
    }
    public function toindex()
    {
        return view('cp.admin.tohome');
    }
	public function index()
    {
        return view('cp.admin.home');
    }
    public function no_access(){
        Session::flash('msg', "e: ".__('msg.noaccess'));
        return view('cp.admin.noaccess');
    }
}
