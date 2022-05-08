<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class user_rols extends Model
{
    protected $fillable = [
        'users_id', 'roles_id'
    ];
    public function user()
    {
	                         //Table                      Foreign key     Primary k
        return $this->belongsTo(App\Models\User::class, "users_id", "id");
    }
	public function role()
    {
	                         //Table                      Foreign key     Primary k
        return $this->belongsTo(App\Models\Role::class, "roles_id", "id");
    }
}
