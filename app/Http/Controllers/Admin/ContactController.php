<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Contact;
use Validator;
use Dompdf\Dompdf;
use DB;
use Illuminate\Support\Facades\Storage;

class ContactController extends BaseController
{
    public function index()
    {
        return view('cp.contact.index');
    }
    public function ajax(Request $request)
    {
        $sort_by = $request->sort_by;
        $sort_type = $request->sort_type;

		$start = $request->start;
		$length = $request->length;
		$page = $start / $length;
		$page = $page + 1;
		
		$q = $request->q;

        $user = auth()->user();
        $userid = $user->id;

        $date_from = $request->date_from;
        $date_to = $request->date_to;
        $ch_date = $request->ch_date;

        $data = Contact::where(function($query) {
                $query->orWhere('id', '<>', -1);
            });

        if($q){
            $data = $data->where(function($query) use ($q){
                $query->orWhere('title', 'like', '%' . $q . '%');
                $query->orWhere('desccode', 'like', '%' . $q . '%');
            });
        }
        if($ch_date == 1){
            if($date_from){
                $date = explode('/', $date_from);
                $date_from = $date[2] . '-' . $date[1] . '-' . $date[0];

                $date = explode('/', $date_to);
                $date_to = $date[2] . '-' . $date[1] . '-' . $date[0] . ' 23:59:59';
            //dd($date_to . ' 23:59:59');
                $data = $data->whereBetween('created_at', [$date_from, $date_to]);
            }
        }

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
	}
    public function contact_active(Request $request)
	{
		$ids = $request->data;
        $active = $request->active;

        foreach($ids as $id){
            Contact::where('id',$id)->update([
				'active'   => $active
			]);
        }
		return response()->json([
			'status'=> 1, 
			'msg' => 's: ' . __('msg.done'), 
			'toastr' => true
			]);
	}
}
