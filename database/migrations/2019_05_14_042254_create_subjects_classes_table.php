<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->boolean('status')->default(0)->comment('0 is unactive | 1 is active');
            $table->integer('created_at');
            $table->integer('updated_at');
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
