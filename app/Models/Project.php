<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';
    protected $fillable = [
        'users_id',
        'title',
        'desccode',
        'file',
        'cost',
        'subtitle',
        'youtube',
        'active',
        'icon',
        'images',
        'cover',
        'address',
    ];

    public function kinds(){
        return $this->belongsToMany(Kind::class , 'project_kinds');
    }

    public function user(){
        //return $this->belongsTo(Country::class
        //);
                                //table         //foriegn   //primary
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
    public function projectTypes()
    {
        return $this->belongsToMany(ProjectType::class,'Projecttyps','project_id', 'type_id');
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function images(){
        return $this->hasMany(Image::class);
    }
}
