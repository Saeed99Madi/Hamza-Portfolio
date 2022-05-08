<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\StaticPage;
use App\Models\Setting;
use Session;

use App\Models\Menu;
use Illuminate\Support\Facades\View;

class SiteMenu
{
    public function handle($request, Closure $next)
    {

        $links = Menu::where('parentid', null)->orderBy("order")->get()->toArray();
		$menu = [];
		foreach($links as $link) {
            if($link['active']){
			    $count =  Menu::where([['parentid','=',$link['id']]])->orderBy("order")->get()->count();
                $lk = $link['link'];
			    $node = [
			        'id' => $link['id'],
			        'title' => $link['title'],
                    'link' => $lk,
			        'ch' => $count,
                    'typeid' => $link['typeid'],
                    'external' => $link['external'],
                    'newtap' => $link['newtap'],
                    'order' => $link['order'],
			    ];

			    if($count > 0){
                    $submenu =  Menu::where([['parentid','=',$link['id']]])->orderBy("order", "asc")->get()->toArray();
				    $node["submenu"] = $submenu;
			    }
			    array_push($menu, $node);
            }
		}
        view()->share('menu', $menu);
        //dd($menu);
        $footerContact = StaticPage::where("id" , "=", 7)->first();
        view()->share('footerContact', $footerContact);

        $Copyright = StaticPage::where("id" , "=", 8)->first();
        view()->share('Copyright', $Copyright);

        $setting = Setting::first();
        view()->share('setting', $setting);

        $pagetitle = '';
        view()->share('pagetitle', $pagetitle);

        return $next($request);
	}
}
