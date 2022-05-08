<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'name',
        'identity',
        'account',
        'first_kafel_name',
        'first_kafel_account',
        'second_kafel_name',
        'second_kafel_account',
        'users_id'
    ];
    public function user(){
        //return $this->belongsTo(Country::class);
                                //table         //foriegn   //primary
        return $this->belongsTo(App\Models\User::class, 'users_id', 'id');
    }
    
}
