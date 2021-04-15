<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DataUmumRuas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_umum_ruas', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_data_umum");
            $table->string("ruas_jalan");
            $table->string("segment_jalan");
            $table->string("lat_awal");
            $table->string("long_awal");
            $table->string("lat_akhir");
            $table->string("long_akhir");
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
        //
    }
}
