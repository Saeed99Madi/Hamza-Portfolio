<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role_links extends Model
{
    protected $fillable = [
        'roles_id', 'links_id'
    ];

    
    public function role()
    {
	                         //Table                      Foreign key     Primary k
        return $this->belongsTo(App\Models\Role::class, "roles_id", "id");
    }
	public function link()
    {
	                         //Table                      Foreign key     Primary k
        return $this->belongsTo(Link::class, "links_id", "id");
    }
}
