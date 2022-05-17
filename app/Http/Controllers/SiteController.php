<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Projecttyp;
use App\Models\ProjectType;
use App\Models\StaticPage;
use App\Models\Setting;
use App\Models\Contact;
use App\Models\Kind;
use Validator;
use Dompdf\Dompdf;
use DB;
use Session;

class SiteController extends Controller
{
    public function __construct()
    {
        $this->middleware('site.menu');
    }
    public function getContact(){
        $settings = Setting::first();
        return view('home.contact',compact('settings'));
    }
	public function index()
    {
        $slider = Projecttyp::where('type_id', '=', 1);
        $ar1 = $slider->get()->toArray();
        $st1 = implode(',', array_column($ar1, 'project_id'));
        $sliderList = Project::orWhere(function($query) use ($st1){
            $ar = explode("," , $st1);
            foreach($ar as $ob){
                $query->orWhere('id', $ob);
            }
        })->where('active', 1)->get();

        $MainProjectType = implode(',', array_column(Projecttyp::where('type_id', '=', 2)->get()->toArray(), 'project_id'));
        $MainProject = Project::orWhere(function($query) use ($MainProjectType){
            $ar = explode("," , $MainProjectType);
            foreach($ar as $ob){
                $query->orWhere('id', $ob);
            }
        })->where('active', 1)->get();


        $thiredSectionString = implode(',', array_column(Projecttyp::where('type_id', '=', 3)->get()->toArray(), 'project_id'));
        $thiredSection = Project::orWhere(function($query) use ($thiredSectionString){
            $ar = explode("," , $thiredSectionString);
            foreach($ar as $ob){
                $query->orWhere('id', $ob);
            }
        })->where('active', 1)->get();


        $forthSectionString = implode(',', array_column(Projecttyp::where('type_id', '=', 4)->get()->toArray(), 'project_id'));
        $forthSection = Project::orWhere(function($query) use ($forthSectionString){
            $ar = explode("," , $forthSectionString);
            foreach($ar as $ob){
                $query->orWhere('id', $ob);
            }
        })->where('active', 1)->get();

        $fifthSectionString = implode(',', array_column(Projecttyp::where('type_id', '=', 5)->get()->toArray(), 'project_id'));
        $fifthSection = Project::orWhere(function($query) use ($fifthSectionString){
            $ar = explode("," , $fifthSectionString);
            foreach($ar as $ob){
                $query->orWhere('id', $ob);
            }
        })->where('active', 1)->get();

        $sixthSectionString = implode(',', array_column(Projecttyp::where('type_id', '=', 6)->get()->toArray(), 'project_id'));
        $sixthSection = Project::orWhere(function($query) use ($sixthSectionString){
            $ar = explode("," , $sixthSectionString);
            foreach($ar as $ob){
                $query->orWhere('id', $ob);
            }
        })->where('active', 1)->get();

        $sevenSectionString = implode(',', array_column(Projecttyp::where('type_id', '=', 7)->get()->toArray(), 'project_id'));
        $sevenSection = Project::orWhere(function($query) use ($sevenSectionString){
            $ar = explode("," , $sevenSectionString);
            foreach($ar as $ob){
                $query->orWhere('id', $ob);
            }
        })->where('active', 1)->get();

        $pt1 = ProjectType::where("id" , '=', 1)->first();
        $pt2 = ProjectType::where("id" , '=', 2)->first();
        $pt3 = ProjectType::where("id" , '=', 3)->first();
        $pt4 = ProjectType::where("id" , '=', 4)->first();
        $pt5 = ProjectType::where("id" , '=', 5)->first();
        $pt6 = ProjectType::where("id" , '=', 6)->first();
        $pt7 = ProjectType::where("id" , '=', 7)->first();
        //dd($MainProject);

        $st1 = StaticPage::where("id" , '=', 1)->first();
        $services = Service::all();
        $members = Member::all();
        $projects_m = Project::paginate(5);

		$cats = ProjectType::where("active" , '=', 1)->where("main" , '=', 1)->get();

        return view('home.index', compact('projects_m','members','services','sliderList', 'MainProject', 'thiredSection', 'forthSection', 'fifthSection', 'sixthSection', 'sevenSection', 'pt3', 'pt2', 'pt1', 'st1', 'pt4', 'pt5', 'pt6', 'pt7', 'cats'));
    }
	public function loadImage(Request $request){
		$catid = $request->catid;
		$skip = $request->skip;
		$take = $request->take;

		if($catid == 0){
			$String = implode(',', array_column(ProjectType::where('active', '=', 1)->where('main', '=', 1)->get()->toArray(), 'id'));
			
			$String2 = implode(',', array_column(
			Projecttyp::orWhere(function($query) use ($String){
				$ar = explode("," , $String);
				foreach($ar as $ob){
					$query->orWhere('type_id', $ob);
				}
			})->get()->toArray()
			, 'project_id'));

			$list = Project::orWhere(function($query) use ($String2){
				$ar = explode("," , $String2);
				foreach($ar as $ob){
					$query->orWhere('id', $ob);
				}
			})->where('active', 1)->skip($skip)->take($take)->get();
			//$list = Project::where("active" , '=', 1)->skip($skip)->take($take)->get();
		}
		else{
			$String = implode(',', array_column(Projecttyp::where('type_id', '=', $catid)->get()->toArray(), 'project_id'));
			$list = Project::orWhere(function($query) use ($String){
				$ar = explode("," , $String);
				foreach($ar as $ob){
					$query->orWhere('id', $ob);
				}
			})->where('active', 1)->skip($skip)->take($take)->get();
		}
		return response()->json([
        'list'=> $list
        ]);
	}
    public function project($id){
        if($id){
            $obj = Project::where('id', '=', ["{$id}"])->first();
            $cats = $obj->kinds;
            $pagetitle = $obj->title;
            $catsIDS = $obj->kinds->pluck('id')->toArray();

            $similarProjects  = Project::whereHas('kinds', function ($query) use ($catsIDS) {
                $query->where('kind_id', $catsIDS);
            })->limit(5)->get();
//            dd($similarProjects);
            return view('home.project', compact('obj', 'pagetitle','cats','similarProjects'));
        }
        return null;
    }
    public function page($id){


        if($id){
            $obj = StaticPage::where('id', '=', ["{$id}"])->first();
            $con = StaticPage::where('id', '=', 6)->first();
            return view('home.page', compact('obj', 'con'));
        }
        return null;
    }
    public function contact(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:200',
			'email' => 'required|email|max:200',
            'subjects' => 'required|max:200',
            'message' => 'required|max:200',
        ], [], __('contact'));
        if ($validator->passes())
        {
            Contact::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'subjects' => $request['subjects'],
			'message' => $request['message'],
            'active' => 1
            ]);
            Session::flash('msg','s: ' . 'تم إرسال الرسالة بنجاح سنتواصل معك في أقرب وقت ممكن');
            return redirect(route('home.contactGet'));
        }
        else{
            Session::flash('msg','e: ' . 'أدخل البيانات المطلوبة');
            //dd($validator->errors()->messages());
            return redirect(route('home.contactGet'))->withInput($request->input())->withErrors($validator);
        }
    }
    public function type($id){
        if($id){
            $obj = ProjectType::where('id', '=', ["{$id}"])->first();
            $q = request()->q;
            $items = Project::whereRaw('(fullname like ? or email like ?)',["%{$q}%", "%{$q}%"]);
            $idString = implode(',', array_column(Projecttyp::where('type_id', '=', $id)->get()->toArray(), 'project_id'));

            $items = Project::orWhere(function($query) use ($idString){
                $ar = explode("," , $idString);
                foreach($ar as $ob){
                    $query->orWhere('id', $ob);
                }
            })->where('active', 1);

            $items = $items->paginate(9)
                            ->appends([
                                'q'=>$q
                            ]);
            $paginator = $items->links()->paginator;
            $elements = $items->links()->elements;
            $cats = ProjectType::where("active" , '=', 1)->where("main" , '=', 1)->get();
                            //dd($items->links()->elements);
            //Session::flash("msg", "{$items->total()} Result(s) was found to your search");
            return view("home.type",compact('obj', 'items', 'paginator', 'elements','cats'));
        }
        return null;
    }
    public function search(){
        $q = trim(request()->search);
        if($q){
            $q = str_replace(" ", "%", $q);
            $items = Project::whereRaw('(title like ? or desccode like ?)',["%{$q}%", "%{$q}%"])
            ->where("active", "=", 1);

            $items = $items->paginate(100)
                    ->appends([
                        'search'=>$q
                    ]);
            $paginator = $items->links()->paginator;
            $elements = $items->links()->elements;

            return view("home.search",compact('items', 'paginator', 'elements'));
        }
        else{
            $items = Project::whereRaw('(id = ?)',["-1"])
            ->where("active", "=", 1);

            $items = $items->paginate(9)
                    ->appends([
                        'search'=>$q
                    ]);
            $paginator = $items->links()->paginator;
            $elements = $items->links()->elements;
            return view("home.search",compact('items', 'paginator', 'elements'));
        }
    }
    public function getimg($id,$type)
    {
        $obj = Project::where('id', '=', ["{$id}"])->first();
        if($obj){
            if($type == 1){
                return response()->file("upload/".$obj->file);
            }
            else if($type == 2){
                return response()->file("upload/".$obj->icon);
            }
            else if($type == 3){
                return response()->file("upload/".$obj->cover);
            }
        }
        else{
            return null;
        }
    }

    public function logo($type)
    {
        $obj = Setting::first();
        if($obj){
            if($type == 1){
                return response()->file("upload/".$obj->logo);
            }
            else{
                return response()->file("upload/".$obj->favicon);
            }
        }
        else{
            return null;
        }
    }
    public function no_access(){
        Session::flash('msg', "e: ".__('msg.noaccess'));
        return view('cp.admin.noaccess');
    }
}
