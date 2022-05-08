<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCol2ToBeneficiariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('beneficiaries', function (Blueprint $table) {
             $table->string('institute', 200)->nullable();
             $table->string('donor', 200)->nullable();
             $table->string('budget', 50)->nullable();
             $table->string('currency', 20)->nullable();
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
            $table->dropColumn('institute');
            $table->dropColumn('donor');
            $table->dropColumn('budget');
            $table->dropColumn('currency');
        });
    }
}
