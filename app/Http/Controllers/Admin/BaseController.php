<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Cookie;

class BaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin.permission');
        $this->middleware('admin.menu');
        //$this->middleware('admin.menujson');
        //$co = Cookie::get('menu555');

        //dd("ffffffffff");

        //dd($co);
         
        //View::share('menu', $co);
    }

}
