<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMaloaibbInBienbao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bien_baos', function (Blueprint $table) {
            $table->integer('id_LoaiBB')->unsigned();
            $table->foreign('id_LoaiBB')->references('id')->on('loai_bien_baos');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bien_baos', function (Blueprint $table) {
            Schema::dropIfExists('bien_baos');
        });
    }
}
