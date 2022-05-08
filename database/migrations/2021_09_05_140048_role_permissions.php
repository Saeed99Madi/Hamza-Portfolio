<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RolePermissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_links', function (Blueprint $table) {
				$table->increments('id');
				$table->integer('roles_id')->default(0);
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
        Schema::dropIfExists('role_links');
    }
}
