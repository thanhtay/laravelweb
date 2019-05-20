<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->unsigned(false);
            $table->string('name');
            $table->string('email', '250')->unique();
            // $table->timestamp('email_verified_at')->nullable();
            $table->integer('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            // $table->timestamps();
            $table->boolean('isAdmin')->default(0)->comment('0 is user | 1 is admin');
            $table->boolean('isTeacher')->default(0)->comment('0 is user | 1 is teacher');
            $table->boolean('status')->default(0)->comment('0 is block | 1 is active');
            $table->integer('created_at');
            $table->integer('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}