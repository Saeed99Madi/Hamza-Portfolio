<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('beneficiaries', function (Blueprint $table) {
            $table->string('identity', 20)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('partnarId', 200)->nullable();
            $table->string('partnarName', 400)->nullable();
            $table->string('project', 200)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('beneficiaries', function (Blueprint $table) {
            $table->dropColumn('identity');
            $table->dropColumn('city');
            $table->dropColumn('partnarId');
            $table->dropColumn('partnarName');
            $table->dropColumn('project');
        });
    }
}
