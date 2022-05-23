<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMauserInUserbaithi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('userbaithis', function (Blueprint $table) {
            $table->integer('id'); 
            $table->foreign('id')->references('id')->on('users');
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
