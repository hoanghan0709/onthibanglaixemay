<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCauHoisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cau_hois', function (Blueprint $table) {
            $table->increments('id'); //nên dùng increments để khi tạo khóa ngoại ko bị lỗi
            $table->string('TenCH');
            $table->string('NoiDungCH');
            $table->string('HinhAnh')->nullable();
            $table->string('DapAnDung'); 
            $table->string('DapAnA');
            $table->string('DapAnB');
            $table->string('DapAnC');
            $table->string('DapAnD');
            $table->string('GiaiThich');
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
        Schema::dropIfExists('cau_hois');
    }
}
