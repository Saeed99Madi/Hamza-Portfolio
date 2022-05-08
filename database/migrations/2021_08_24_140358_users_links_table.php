<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('users_links', function (Blueprint $table) {
				$table->increments('id');
				$table->integer('users_id')->default(0);
				$table->integer('links_id')->default(1);
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
		Schema::dropIfExists('users_links');
    }
}
