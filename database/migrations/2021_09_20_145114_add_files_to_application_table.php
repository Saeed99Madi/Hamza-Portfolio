<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFilesToApplicationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->string('img_identity', 400)->nullable();
            $table->string('img_salary', 400)->nullable();
            $table->string('img_kafel_identity', 400)->nullable();
            $table->string('img_kafel_salary', 400)->nullable();
            $table->string('img_finance', 400)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->dropColumn('img_identity');
            $table->dropColumn('img_salary');
            $table->dropColumn('img_kafel_identity');
            $table->dropColumn('img_kafel_salary');
            $table->dropColumn('img_finance');
        });
    }
}
