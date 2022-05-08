<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectKind extends Model
{
    use HasFactory;
    protected $fillable = ['project_id','kind_id'];
//    protected $table = "project_kinds";
//    public function kind(){
//        return $this->belongsTo(Kind::class);
//    }
//    public function project(){
//        return $this->belongsTo(Project::class);
//    }
}
