<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Beneficiary extends Model
{
    protected $fillable = [
        'identity',
        'name',
        'city',
        'project',
        'institute',
        'donor',
        'budget',
        'date',
        'project_type',
        'partnarId',
        'partnarName',
        'book',
    ];
}
