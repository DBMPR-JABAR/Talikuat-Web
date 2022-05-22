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
            $table->integer('data_umum_detail_id');
            $table->string('nmp');
            $table->string('uraian');
            $table->string('total_harga');
            $table->string('total_volume');
            $table->string('satuan');
            $table->string('bobot');
            $table->string('volume_request');
            $table->dateTime('tgl_request');
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
        Schema::dropIfExists('jadual');
    }
}
