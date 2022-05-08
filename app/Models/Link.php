<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = [
        'title', 'icon', 'route_name', 'parent_id', 'show_in_menu', 'order_id'
    ];

    
    public function users()
    {
        return $this->belongsToMany(App\Models\User::class,'users_links','links_id','users_id');
    }
    public function roles()
    {
        return $this->belongsToMany(App\Models\Role::class,'Role_links','links_id','roles_id');
    }
}
