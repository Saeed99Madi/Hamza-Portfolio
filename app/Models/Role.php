<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'title'
    ];

    public function users()
    {
        return $this->belongsToMany('App\Models\User','user_rols','roles_id','users_id');
    }

    public function links()
    {
        return $this->belongsToMany('App\Models\Link','Role_links','roles_id','links_id');
    }
}
