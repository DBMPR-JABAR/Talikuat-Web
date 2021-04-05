<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DataUmum extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_umum', function (Blueprint $table) {
            $table->id();
            $table->string('pemda');
            $table->string('opd');
            $table->string('unor');
            $table->string('kategori');
            $table->string('nm_paket');
            $table->string('no_kontrak');
            $table->date('tgl_kontrak');
            $table->integer('nilai_kontrak');
            $table->string('no_spmk');
            $table->date('tgl_spmk');
            $table->integer('panjang_km');
            $table->integer('lama_waktu');
            $table->string('ppk');
            $table->string('penyedia');
            $table->string('konsultan');
            $table->string('nm_ppk');
            $table->string('nm_se');
            $table->string('nm_gs');
            $table->string('file_dkh')->nullable();
            $table->string('file_perjanjian_kontrak')->nullable();
            $table->string('file_spmk')->nullable();
            $table->string('file_syarat_umum')->nullable();
            $table->string('file_syarat_khusus')->nullable();
            $table->string('file_jadual_pelaksanaan')->nullable();
            $table->string('file_rencana')->nullable();
            $table->string('file_sppbj')->nullable();
            $table->string('file_spl')->nullable();
            $table->string('file_spec_umum')->nullable();
            $table->string('file_jaminan')->nullable();
            $table->string('file_spkmp')->nullable();
            $table->integer('is_adendum');
            

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
