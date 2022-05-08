<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projecttyp extends Model
{
    protected $table = 'projecttypes';
    protected $fillable = [
        'project_id',
        'type_id'
    ];
    public function project(){
        //return $this->belongsTo(Country::class);
        //table         //foriegn   //primary
        return $this->belongsTo(App\Models\Project::class, 'project_id', 'id');
    }
    public function projectType(){
        //return $this->belongsTo(Country::class);
                                //table         //foriegn   //primary
        return $this->belongsTo(App\Models\ProjectType::class, 'type_id', 'id');
    }
}
