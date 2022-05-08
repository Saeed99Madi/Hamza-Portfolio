<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users_links extends Model
{
    protected $fillable = [
        'users_id', 'links_id'
    ];

    
    public function user()
    {
	                         //Table                      Foreign key     Primary k
        return $this->belongsTo(App\Models\User::class, "users_id", "id");
    }
	public function link()
    {
	                         //Table                      Foreign key     Primary k
        return $this->belongsTo(App\Models\Link::class, "links_id", "id");
    }
}
