<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMabtInCauhoibaithi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cauhoibaithis', function (Blueprint $table) {
            $table->integer('id')->unsigned();
             
            $table->foreign('id')->references('id')->on ('bai_this');
          //  -> onDelete('cascade'); 
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
            Schema::dropIfExists('cauhoibaithis');
        });
    }
}
