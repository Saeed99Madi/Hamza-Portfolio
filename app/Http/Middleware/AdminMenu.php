<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Link;
use Session;

use App\Models\Users_links;
use App\Models\Role_links;
use Illuminate\Support\Facades\View;
use DB;

class AdminMenu
{
    public function handle($request, Closure $next)
    {
        $user = auth()->user();

        if(!$user['active']){
            return redirect(route('admin.logout'));
        }
        //Session::flash('menu', "gggggggg");

        if ($user) {


            $links = Link::where('parent_id', 0)->get()->toArray();
            $tree = [];
            foreach($links as $link) {
                if($link['show_in_menu']){
                    $linkHasRoles = DB::table('role_links')->whereRaw('links_id = '.$link['id'].' and roles_id in (1, 3)')->get()
                        ->count();

                    if($linkHasRoles > 0){
                        $linkHasRole = true;
                    }
                    else{
                        $linkHasRole = false;
                    }

                    //dd($linkHasRole);

                    //   Role_links::whereRaw('links_id = ? and roles_id = ?',["{$link['id']}", "1"])
                    //->get()->count() > 0;

                    if($linkHasRole)
                    {
                        $havePermissions = $user->links()->where("route_name", $link['route_name'])->count();
                        if($havePermissions > 0){
                            $havePermission = true;
                        }
                        else{
                            $havePermission = false;
                        }
                        $haveRole = false;
                        $listRoles = $user->roles()->get();
                        foreach($listRoles as $rol){

                            $lnid = Link::where('route_name', $link['route_name'])->get()->first()['id'];

                            $hasPerms = DB::table('role_links')->whereRaw('links_id = '.$lnid.' and roles_id = '.$rol['id'])->get()
                                ->count();
                            //dd($hasPerms);
                            //$hasPerms = $rol->links()->where("route_name", $link['route_name']);//->count();

                            //dd($hasPerms);
                            if($hasPerms > 0){
                                $hasPerm = true;
                            }
                            else{
                                $hasPerm = false;
                            }
                            if($hasPerm){
                                $haveRole = true;
                                break;
                            }
                        }
                        if($havePermission || $haveRole) {
                            $icon = $link['icon'];
                            $count =  Link::where([['parent_id','=',$link['id']]])->get()->count();



                            $lk = $link['route_name'];
                            //$opened = $routeName == $lk;
                            //dd($opened);
                            $node = [
                                'id' => $link['id'],
                                'text' => $link['title'],
                                'url' => $lk,
                                'route_name' => Route($link['route_name']),

                                'state' => [
                                    'selected'	=> true,
                                    'opened'	=> true
                                ],
                                'icon' => $icon,
                            ];

                            //dd($link['route_name']);

                            if($count > 0){
                                $node["children"] = $this->perm_tree_fun($link['id'], $user->id, $user);//[ $this->perm_tree_fun($link['id'], $id) ];
                            }
                            array_push($tree, $node);
                        }
                    }
                }
            }
            $json = json_encode($tree);
        }
        view()->share('menu', $json);

        //dd(view());
        return $next($request);
    }
    public function perm_tree_fun($id, $userid, $user) {
        $padre =  Link::where([['parent_id','=',$id]])->get()->toArray();
        $arr = [];
        foreach($padre as $link){
            if($link['show_in_menu']) {

                $linkHasRole = Role_links::whereRaw('links_id = ? and roles_id in (1, 3)',["{$link['id']}"])
                        ->get()->count() > 0;

                if($linkHasRole) {
                    $havePermission = $user->links()->where("route_name", $link['route_name'])->count()>0;
                    $haveRole = false;
                    $listRoles = $user->roles()->get();
                    foreach($listRoles as $rol){
                        $hasPerms = $rol->links()->where("route_name", $link['route_name'])->count();
                        if($hasPerms > 0){
                            $hasPerm = true;
                        }
                        else{
                            $hasPerm = false;
                        }

                        if($hasPerm){
                            $haveRole = true;
                            break;
                        }
                    }

                    if($havePermission || $haveRole) {
                        $count =  Link::where([['parent_id','=',$link['id']]])->get()->count();
                        $icon = $link['icon'];

                        $node = [
                            'id'	=>	$link['id'],
                            'text' => $link['title'],
                            'url' => $link['route_name'],
                            'route_name' => Route($link['route_name']),
                            'state' => [
                                'selected'	=> true,//$hasperm > 0,
                                'opened'	=> true
                            ],
                            'icon' => $icon
                        ];

                        if($count > 0){
                            $node["children"] = $this->perm_tree_fun($link['id'], $userid, $user);//[ $this->perm_tree_fun($link['id'], $userid) ];
                        }
                        array_push($arr, $node);
                    }
                }
            }
        }
        return $arr;
    }
}
