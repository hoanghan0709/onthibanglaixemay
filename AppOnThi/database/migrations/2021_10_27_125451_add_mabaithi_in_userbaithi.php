<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMabaithiInUserbaithi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('userbaithis', function (Blueprint $table) {
            $table->integer('id_BT');
            $table->foreign('id_BT')->references('id')->on('bai_this');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('userbaithis', function (Blueprint $table) {
            Schema::dropIfExists('userbaithis');
        });
    }
}
