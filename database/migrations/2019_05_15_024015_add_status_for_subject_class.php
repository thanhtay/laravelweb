<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusForSubjectClass extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subjects_classes', function (Blueprint $table) {
            $table->boolean('status')->default(0)->comment('0 is unactive | 1 is active');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subjects_classes', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
