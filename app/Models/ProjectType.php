<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectType extends Model
{
    protected $table = 'projecttypes';
    protected $fillable = [
        'users_id',
        'title',
        'subtitle',

        'active'
    ];
    public function user(){
        //return $this->belongsTo(Country::class);
                                //table         //foriegn   //primary
        return $this->belongsTo(App\Models\User::class, 'users_id', 'id');
    }
    public function projects()
    {
        return $this->belongsToMany(App\Models\Project::class,'Projecttyp', 'type_id', 'project_id');
    }
}
