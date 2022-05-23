<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCascadeTableChbaithi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cauhoibaithis', function (Blueprint $table) {
            //
            $table->dropForeign(['id']);
            $table->dropForeign(['id_CH']);
            $table->foreign('id')->references('id')->on ('bai_this')->onDelete('cascade');
            $table->foreign('id_CH')->references('id')->on ('cau_hois')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cauhoibaithis', function (Blueprint $table) {
            //
        });
    }
}
