<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Dompdf\Dompdf;
use DB;
use PDF;
use Session;
use App\Models\Profile;
use Auth;
class ClientHomeController extends Controller
{
    public function __construct()
    {
        //$this->middleware('is_verify_email');
        $this->middleware('client.menu');
    }
    public function index(){
        $user = Auth::user();
        $prof = Profile::where('users_id', '=', ["{$user->id}"])->first();
        if(!$prof){
            Session::flash('msg', "w: ".__('profile.profile'));
            return redirect(route('client.profile'));
        }

        return view('cp.client.home');
    }
    public function no_access(){
        Session::flash('msg', "e: ".__('msg.noaccess'));
        return view('cp.client.noaccess');
    }

	public function report()
    {
        return view('client.report');
    }

    public function pdf()
    {
        //dd(php_ini_loaded_file());
		define('_MPDF_TTFONTPATH', __DIR__ . '/fonts');

        /*$mpdf = new \Mpdf\Mpdf([
            'default_font_size' => 12,
            'default_font' => 'font2'
        ]);*/
        
        $mpdf = new \Mpdf\Mpdf([
            'fontDir' => [
                public_path().'/fonts',
            ],
            'fontdata' => [
                'frutiger' => [
                    'R' => 'Khebrat Musamim 2018 Regular.ttf',
                    'useOTL' => 0xFF,
                ],
                'frutiger3' => [
                    'R' => '(A) Arslan Wessam B (A) Arslan Wessam B.ttf',
                    'useOTL' => 0xFF,
                ]
            ],
        ]);
        
		//$css = file_get_contents('style.css');
		//$mpdf->WriteHtml($css, \Mpdf\HTMLParserMode::HEADER_CSS);

        //$css = file_get_contents('Ticket/ticket.css');
        //$mpdf->WriteHtml($css, \Mpdf\HTMLParserMode::HEADER_CSS);


		//$mpdf->SetHTMLHeader('<img src="maxresdefault.jpg"/>');

        //$mpdf->SetHTMLFooter('<img src="maxresdefault.jpg"/>');

        //$mpdf->SetDefaultBodyCSS('background', "url('images.jpg')");
        //$mpdf->SetDefaultBodyCSS('background-repeat', "no-repeat");

		$mpdf->WriteHtml($this->pdfFun());  


		$mpdf->Output('myPdf.pdf', 'I');
    }
	public function pdfFun(){
		return view('client.pdf2');
	}

    /*public function pdf4()
    {
        $pdf = PDF::loadView('client.report2');
	    return $pdf->stream('document.pdf');
    }*/


    public function pdf4($id)
    {
		define('_MPDF_TTFONTPATH', __DIR__ . '/fonts');
        
        $mpdf = new \Mpdf\Mpdf([
            'fontDir' => [
                public_path().'/fonts1',
            ],
            'fontdata' => [
                'frutiger' => [
                    'R' => 'Khebrat Musamim 2018 Regular.ttf',
                    'useOTL' => 0xFF,
                ],
                'frutiger3' => [
                    'R' => '(A) Arslan Wessam B (A) Arslan Wessam B.ttf',
                    'useOTL' => 0xFF,
                ]
            ],
        ]);
        
		$css = file_get_contents('print/assets/css/print.css');
		$mpdf->WriteHtml($css, \Mpdf\HTMLParserMode::HEADER_CSS);

		$mpdf->WriteHtml($this->pdfFun4($id));  
		$mpdf->Output('myPdf.pdf', 'I');
    }
    public function pdfFun4($id){
		return view('client.pdf'.$id);
	}
}
