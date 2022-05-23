<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMaloailtInCauhoi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cau_hois', function (Blueprint $table) {
                $table->integer('id_LLT')->unsigned();
                $table->foreign('id_LLT')->references('id')->on('loai_ly_thuyets');
               
      
              //  ->onDelete('cascade');
            //   $table->integer('MaLT_id')->unsigned();
            //   $table->foreign('MaLT_id')->references('MaLT')->on('ly_thuyets');
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cau_hois', function (Blueprint $table) {
            //
            Schema::dropIfExists('cau_hois');
        });
    }
}
