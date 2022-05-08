<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('links', function (Blueprint $table) {
            $table->increments('id');
			$table->string('title');
            $table->string('route_name');
			$table->integer('parent_id')->default(0);
			$table->integer('show_in_menu')->default(0);
			$table->integer('order_id')->default(1);
			$table->string('icon')->nullable();
            $table->timestamp('created_at')->nullable();
			$table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('links');
    }
}
