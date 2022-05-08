<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->integer('users_id');
            $table->string('fullname', 200);
            $table->string('dob', 50);
            $table->string('identity', 9);
            $table->string('address', 200);
            $table->string('study', 100);
            $table->string('mobile', 15);
            $table->string('tell', 20)->nullable();
            $table->string('family_num', 5);
            $table->string('income_1', 50);
            $table->string('income_2', 50)->nullable();
            $table->string('income_3', 50)->nullable();
            $table->string('job_now', 100);
            $table->string('job_prev', 100)->nullable();
            $table->string('income_monthly', 50);
            $table->string('years_without_job', 50);
            $table->string('partner_job', 100);

            $table->string('project_title', 200);
            $table->string('project_place', 100);
            $table->string('project_type');
            $table->string('project_desc', 2000);
            $table->string('project_req', 2000);
            $table->string('project_beneficiary', 2000);

            $table->integer('project_cost');
            $table->integer('project_finance');
            $table->integer('project_income_monthly_expected');
            $table->string('project_pay');
            $table->integer('project_similar');
            $table->integer('project_administrator');
            $table->string('project_administrator_other')->nullable();

            $table->string('kafel1_name', 200);
            $table->string('kafel1_identity', 9);
            $table->string('kafel1_address', 100);
            $table->string('kafel1_tell');
            $table->string('kafel1_salary');
            $table->string('kafel1_account');
            $table->string('kafel1_job_place');
            $table->string('kafel1_bank', 100);

            $table->string('kafel2_name', 200);
            $table->string('kafel2_identity', 9);
            $table->string('kafel2_address', 100);
            $table->string('kafel2_tell');
            $table->string('kafel2_salary');
            $table->string('kafel2_account');
            $table->string('kafel2_job_place');
            $table->string('kafel2_bank', 100);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applications');
    }
}
