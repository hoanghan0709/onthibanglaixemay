<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUnique2colTableCauhoibaithi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cauhoibaithis', function (Blueprint $table) {
            $table->unique(['id','id_CH']);
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
        });
    }
}
