<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StaticPage extends Model
{
    protected $table = 'staticpages';
    protected $fillable = [
        'users_id',
        'title',
        'desccode',
        'file',
        'active',
        'parentid'
    ];
    public function user(){
        //return $this->belongsTo(Country::class);
                                //table         //foriegn   //primary
        return $this->belongsTo(App\Models\User::class, 'users_id', 'id');
    }
    public function category(){
        //return $this->belongsTo(Country::class);
                                //table         //foriegn   //primary
        return $this->belongsTo(App\Models\StaticPage::class, 'parentid', 'id');
    }
}
