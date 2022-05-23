<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaiThisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bai_this', function (Blueprint $table) {
            $table->increments('id');
            $table->string('TenBT');    
            $table->integer('Phut');
            $table->integer('Giay');
            $table->integer('Diem')->nullable();
            $table->string('KetQua')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bai_this');
    }
}
