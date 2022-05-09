<?php

    namespace App\Http\Middleware;

    use Closure;
    use App\Models\Link;
    use Session;
    use DB;
    class AdminCheckPermission
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
                return redirect(route('admin.logout'));
            }
            //Session::flash('menu', "gggggggg");
            //اذا كان هناك مستخدم والرابط المطلوب   ضمن جدول اللينكات
            if($inLinksTable && $user){
                //هل الرابط المطلوب ضمن صلاحيات المستخدم؟؟
                $havePermissions = $user->links()->where("route_name", $routeName)->count();
                if($havePermissions > 0){
                    $havePermission = true;
                }
                else{
                    $havePermission = false;
                }
                $haveRole = false;

                $listRoles = $user->roles()->get();
                //dd($listRoles);
                $haveRole = false;
                foreach($listRoles as $rol){

                    $lnid = Link::where('route_name', $routeName)->get()->first()['id'];

                    $hasPerms = DB::table('role_links')->whereRaw('links_id = '.$lnid.' and roles_id = '.$rol['id'])->get()
                        ->count();
                    //$hasPerm = false;

                    if($hasPerms > 0) {
                        $haveRole = true;
                        break;
                    }

                    /*$hasPerm = $rol->links()->where("route_name", $routeName)->count()>0;
                    if($hasPerm){
                        $haveRole = true;
                        break;
                    }
                    */
                }

                //$haveRole = $user->roles()->links()->where("route_name", $routeName)->count()>0;

                if($havePermission || $haveRole){

                }
                else{
                    return redirect(route('admin-no-access'));
                }
                if(!$havePermission){
                    //ان ما كان معه صلاحية يتسهل
                    //return redirect(route('admin-no-access'));
                }
            }
            return $request;
        }
    }
