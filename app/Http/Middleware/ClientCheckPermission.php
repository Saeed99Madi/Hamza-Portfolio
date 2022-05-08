<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Link;
use Session;
use App\Models\Profile;
class ClientCheckPermission
{
    public function handle($request, Closure $next)
    {
        $request = $next($request);
        //جيب اسم الرابط الذي نحن به
        $routeName = \Route::currentRouteName();
        //هل الرابط المطلوب ضمن جدول الصلاحيات او اللينكات
        $inLinksTable = Link::where('route_name', $routeName)->count();
        //المستخدم الي داخل على النظام
        $user = auth()->user();

        if(!$user['active']){
            return redirect(route('client.logout'));
        }
        //Session::flash('menu', "gggggggg");
        //اذا كان هناك مستخدم والرابط المطلوب   ضمن جدول اللينكات
        if($inLinksTable && $user) {
            //هل الرابط المطلوب ضمن صلاحيات المستخدم؟؟
            $havePermission = $user->links()->where("route_name", $routeName)->count()>0;

            $haveRole = false;

            $listRoles = $user->roles()->get();
            foreach($listRoles as $rol){
                $hasPerm = $rol->links()->where("route_name", $routeName)->count()>0;
                if($hasPerm){
                    $haveRole = true;
                    break;
                }
            }

            //$haveRole = $user->roles()->links()->where("route_name", $routeName)->count()>0;

            if($havePermission || $haveRole){
                
            }
            else{
                return redirect(route('client-no-access'));
            }
            if(!$havePermission){
                //ان ما كان معه صلاحية يتسهل
                //return redirect(route('admin-no-access'));
            }
        }
        if(!$inLinksTable){
            return redirect(route('client-no-access'));
        }
        $prof = Profile::where('users_id', '=', ["{$user->id}"])->first();
        //dd($routeName);
        if(!$prof){
            if($routeName != "client.profile") {
                Session::flash('msg', "w: ".__('profile.profile'));
                return redirect(route('client.profile'));
            }
        }
        return $request;
    }
}
