<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kind extends Model
{
    use HasFactory;
    protected $table ="kinds";
    protected $fillable=['title', 'name'];
     public function projects(){
         return $this->belongsToMany(Project::class , 'project_kinds');
     }
}
