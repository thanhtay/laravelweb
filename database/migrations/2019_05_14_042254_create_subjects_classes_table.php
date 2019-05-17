<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectsClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects_classes', function (Blueprint $table) {
            $table->increments('id')->unsigned(false);
            $table->integer('id_class');
            $table->integer('id_subject');
            $table->index(['id_class', 'id_subject']);
            $table->integer('created_at');
            $table->foreign('id_class')
                ->references('id')->on('classes')
                ->onDelete('cascade');
            $table->foreign('id_subject')
                ->references('id')->on('subjects')
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
        Schema::dropIfExists('subjects_classes');
    }
}
