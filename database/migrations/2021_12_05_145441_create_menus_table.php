<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->integer('users_id')->nullable();
            $table->string('title', 200)->nullable();
            $table->string('link', 1000)->nullable();
            $table->integer('order')->nullable();
            $table->integer('active')->nullable();
            $table->integer('parentid')->nullable();
            $table->integer('external')->nullable();
            $table->integer('typeid')->nullable();
            $table->integer('newtap')->nullable();
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
        Schema::dropIfExists('menus');
    }
}
