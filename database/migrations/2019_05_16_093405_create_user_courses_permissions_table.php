<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserCoursesPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_courses_permissions', function (Blueprint $table) {
            $table->integer('id_user');
            $table->integer('id_course');
            $table->integer('created_at');
            $table->index(['id_user', 'id_course']);
            $table->foreign('id_user')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreign('id_course')
                ->references('id')->on('subjects_classes')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_courses_permissions');
    }
}