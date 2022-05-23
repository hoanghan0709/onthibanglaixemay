<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCascadeTableUserbaithi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('userbaithis', function (Blueprint $table) {
            //
            $table->dropForeign(['id_BT']);
            $table->foreign('id_BT')->references('id')->on ('bai_this')->onDelete('cascade');
            $table->dropForeign(['id']);
            $table->foreign('id')->references('id')->on ('users')->onDelete('cascade');
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
            //
        });
    }
}
