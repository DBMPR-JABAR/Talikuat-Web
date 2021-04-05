<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Jadual extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadual', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_data_umum");
            $table->string("nmp");
            $table->string("uraian");
            $table->integer("hrg_satuan");
            $table->string("volume");
            $table->integer("jml_hrg");
            $table->string("bobot");
            $table->decimal('nilai_kontrak');
            $table->string("satuan");
            $table->string("nm_kegiatan");
            
            
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
