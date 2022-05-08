<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class LayoutController extends BaseController
{
	public function index()
    {
        return view('cp.home');
    }
}
