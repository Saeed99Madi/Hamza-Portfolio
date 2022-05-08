<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'users_id',
            'fullname',
            'dob',
            'identity',
            'address',
            'study',
            'mobile',
            'tell',
            'family_num',
            'income_1',
            'income_2',
            'income_3',
            'job_now',
            'job_prev',
            'income_monthly',
            'years_without_job',
            'partner_job',

            'project_title',
            'project_place',
            'project_type',
            'project_desc',
            'project_req',
            'project_beneficiary',

            'project_cost',
            'project_finance',
            'project_income_monthly_expected',
            'project_pay',
            'project_similar',
            'project_administrator',
            'project_administrator_other',

            'kafel1_name',
            'kafel1_identity',
            'kafel1_address',
            'kafel1_tell',
            'kafel1_salary',
            'kafel1_account',
            'kafel1_job_place',
            'kafel1_bank',

            'kafel2_name',
            'kafel2_identity',
            'kafel2_address',
            'kafel2_tell',
            'kafel2_salary',
            'kafel2_account',
            'kafel2_job_place',
            'kafel2_bank',

            'craft',
            'expected_period_for_total_cost'

    ];
    public function user(){
        //return $this->belongsTo(Country::class,
                                //table         //foriegn   //primary
        return $this->belongsTo(App\Models\User::class, 'users_id', 'id');
    }
}
