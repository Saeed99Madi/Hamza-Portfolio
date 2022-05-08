<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'users_id',
        'title',
        'subtitle',
        'desccode',
        'file',
        'active',
        'catid',
        'date'
    ];
    public function user(){
        //return $this->belongsTo(Country::class);
                                //table         //foriegn   //primary
        return $this->belongsTo(App\Models\User::class, 'users_id', 'id');
    }
    public function category(){
        //return $this->belongsTo(Country::class);
                                //table         //foriegn   //primary
        return $this->belongsTo(App\Models\Category::class, 'catid', 'id');
    }
}
