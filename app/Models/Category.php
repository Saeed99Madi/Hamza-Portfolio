<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'users_id',
        'title',
        'desccode',
        'file',
        'active'
    ];
    public function user(){
        //return $this->belongsTo(Country::class);
                                //table         //foriegn   //primary
        return $this->belongsTo(App\Models\User::class, 'users_id', 'id');
    }
}
