<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'users_id',
        'title',
        'link',
        'order',
        'parentid',
        'active',
        'external',
        'typeid',
        'newtap'
    ];
    public function user(){
        //return $this->belongsTo(Country::class);
                                //table         //foriegn   //primary
        return $this->belongsTo(App\Models\User::class, 'users_id', 'id');
    }
    public function category(){
        //return $this->belongsTo(Country::class);
                                //table         //foriegn   //primary
        return $this->belongsTo(App\Models\Menu::class, 'parentid', 'id');
    }
}
