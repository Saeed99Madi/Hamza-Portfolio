<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Excel;
use App\Models\User;
use App\Exports\UsersExport;
use Cookie;
class ExportExcelController extends Controller
{
    function excel()
    {
     $customer_data = DB::table('users')->get()->toArray();
     $customer_array[] = array('Name', 'Email', 'Created_at');
     foreach($customer_data as $customer)
     {
      $customer_array[] = array(
       'name'  => $customer->name,
       'email'   => $customer->email,
       'created_at'    => $customer->created_at
      );
     }

     $collection = collect([
        (object) [
            'website' => 'twitter',
            'url' => 'twitter.com'
        ],
        (object) [
            'website' => 'google',
            'url' => 'google.com'
        ]
    ]);
    //dd(new UsersExport);
     return Excel::download(new UsersExport(1), 'users.xlsx');

     
    }
}
