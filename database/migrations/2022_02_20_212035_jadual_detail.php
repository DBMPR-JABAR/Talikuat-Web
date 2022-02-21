<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class JadualDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadual_detail', function (Blueprint $table) {
            $table->id();
            $table->integer('jadual_id');
            $table->string('nmp');
            $table->string('uraian');
            $table->string('harga_satuan');
            $table->string('volume');
            $table->string('satuan');
            $table->string('bobot');
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
        Schema::dropIfExists('jadual_detail');
    }
}
