<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLoaimeothiInMeothi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('meo_this', function (Blueprint $table) {
            $table->integer('id_LoaiMT')->unsigned();
            $table->foreign('id_LoaiMT')->references('id')->on('loai_meo_this');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('meo_this', function (Blueprint $table) {
            Schema::dropIfExists('meo_this');
        });
    }
}
