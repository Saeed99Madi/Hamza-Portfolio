<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('file');
            $table->string('major');
            $table->string('address')->nullable();
            $table->string('link')->nullable();
            $table->string('exp_years')->nullable();
            $table->string('arch')->nullable();
            $table->string('cons')->nullable();
            $table->string('inte')->nullable();
            $table->string('year')->nullable();
            $table->integer('active')->nullable();
            $table->integer('users_id')->nullable();
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
        Schema::dropIfExists('members');
    }
}
