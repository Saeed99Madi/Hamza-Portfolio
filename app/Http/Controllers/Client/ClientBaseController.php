<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Cookie;

class ClientBaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('authClient');
        $this->middleware('client.permission');
        $menu = $this->middleware('client.menu');

        //$co = Cookie::get('menuCl');
        //dd($co);
        //View::share('menuCl', $co);
    }

}
