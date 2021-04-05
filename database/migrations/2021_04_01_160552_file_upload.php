<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FileUpload extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_dkh', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_data_umum");
            $table->string("dkh");
            $table->timestamps();
        });
        Schema::create('file_kontrak', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_data_umum");
            $table->string("kontrak");
            $table->timestamps();
        });
        Schema::create('file_spmk', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_data_umum");
            $table->string("spmk");
            $table->timestamps();
        });
        Schema::create('file_syarat_umum', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_data_umum");
            $table->string("syarat_umum");
            $table->timestamps();
        });
        Schema::create('file_syarat_khusus', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_data_umum");
            $table->string("syarat_khusus");
            $table->timestamps();
        });
        Schema::create('file_jpp', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_data_umum");
            $table->string("jpp");
            $table->timestamps();
        });
        Schema::create('file_rencana', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_data_umum");
            $table->string("rencana");
            $table->timestamps();
        });
        Schema::create('file_sppbj', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_data_umum");
            $table->string("sppbj");
            $table->timestamps();
        });
        Schema::create('file_spl', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_data_umum");
            $table->string("spl");
            $table->timestamps();
        });
        Schema::create('file_spek_umum', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_data_umum");
            $table->string("spek_umum");
            $table->timestamps();
        });
        Schema::create('file_jaminan', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_data_umum");
            $table->string("jaminan");
            $table->timestamps();
        });
        Schema::create('file_spkmp', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_data_umum");
            $table->string("spkmp");
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
