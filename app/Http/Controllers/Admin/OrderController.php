<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Order;
use App\Models\Link;
use App\Models\Users_links;
use App\Models\user_rols;
use App\Models\Role;
use Validator;
use Dompdf\Dompdf;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use App\Exports\BeneExport;

class OrderController extends BaseController
{
    public function index()
    {
        return view('cp.order.index');
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

        $data = Order::where(function($query) {
                $query->orWhere('id', '<>', -1);
            });

        if($q){
            $data = $data->where(function($query) use ($q){
                $query->orWhere('firstname', 'like', '%' . $q . '%');
                $query->orWhere('lastname', 'like', '%' . $q . '%');
                $query->orWhere('phone', 'like', '%' . $q . '%');
                $query->orWhere('email', 'like', '%' . $q . '%');
                $query->orWhere('city', 'like', '%' . $q . '%');
                $query->orWhere('country', 'like', '%' . $q . '%');
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

    public function export(Request $request)
    {

        $q = $request->q;

        $user = auth()->user();
        $userid = $user->id;

        $date_from = $request->date_from;
        $date_to = $request->date_to;
        $ch_date = $request->ch_date;

        $data = Order::where(function($query) {
            $query->orWhere('id', '<>', -1);
        });

        if($q){
            $data = $data->where(function($query) use ($q){
                $query->orWhere('firstname', 'like', '%' . $q . '%');
                $query->orWhere('lastname', 'like', '%' . $q . '%');
                $query->orWhere('phone', 'like', '%' . $q . '%');
                $query->orWhere('email', 'like', '%' . $q . '%');
                $query->orWhere('city', 'like', '%' . $q . '%');
                $query->orWhere('country', 'like', '%' . $q . '%');
            });
        }
        //if($ch_date == 1){
            if($date_from){
                $date = explode('/', $date_from);
                $date_from = $date[2] . '-' . $date[1] . '-' . $date[0];

                $date = explode('/', $date_to);
                $date_to = $date[2] . '-' . $date[1] . '-' . $date[0] . ' 23:59:59';
                //dd($date_to . ' 23:59:59');
                $data = $data->whereBetween('created_at', [$date_from, $date_to]);
            }
        //}
        $data = $data->select('id','subtotal','fees','forCompany','firstname','lastname','phone','email','line1','city','country','on_behalf_off','status','created_at');
        //dd($data->get()->toArray());
        $header = ["#", "المجموع الفرعي", "رسوم الدفع", "دعم المؤسسة", "الاسم الاول", "اسم العائلة", "الموبايل", "الايميل", "العنوان", "المدينة", "الدولة", "نيابة عن", "الحالة", "تاريخ الإستفاده" ];
         return Excel::download(new BeneExport($data, $header), 'order.xlsx');

    }


    public function details($id)
    {
        $cats = Category::get();
        return view('cp.order.details', compact("cats"));
    }
    /*public function tbl_active(Request $request)
	{
		$ids = $request->data;
        $active = $request->active;

        foreach($ids as $id){
            Article::where('id',$id)->update([
				'active'   => $active
			]);
        }
		return response()->json([
			'status'=> 1,
			'msg' => 's: ' . __('msg.done'),
			'toastr' => true
			]);
	}*/
}
