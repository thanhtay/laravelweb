<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminRolesMapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_roles_map', function (Blueprint $table) {
            $table->bigInteger('admin_id');
            $table->integer('role_id');
            $table->integer('created_at');
            $table->unique(['admin_id', 'role_id']);
            $table->foreign('admin_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('admin_roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_roles_map');
    }
}
