<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'facebook',
		'twitter',
		'instagram',
        'linkedin',
        'footer1',
        'footer2',
        'footer3',
        'footer4',
        'title',
        'users_id',
        'logo',
        'favicon'
    ];
}
