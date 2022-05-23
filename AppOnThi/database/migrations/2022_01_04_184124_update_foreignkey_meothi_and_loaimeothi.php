<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateForeignkeyMeothiAndLoaimeothi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('meo_this', function (Blueprint $table) {
             
            $table->dropForeign(['id_LoaiMT']);  
            $table->foreign('id_LoaiMT')->references('id')->on('loai_meo_this')->onDelete('cascade');
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
            //
        });
    }
}
