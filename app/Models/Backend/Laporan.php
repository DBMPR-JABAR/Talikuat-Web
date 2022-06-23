<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'laporan';
    protected $guarded = [];

    public function dataUmum()
    {
        return $this->hasOne('App\Models\Backend\DataUmum', 'id', 'data_umum_id');
    }

    public function LaporanBahanBeton()
    {
        return $this->hasMany('App\Models\Backend\LaporanBahanBeton', 'laporan_id', 'id');
    }

    public function LaporanBahanHotmix()
    {
        return $this->hasMany('App\Models\Backend\LaporanBahanHotmix', 'laporan_id', 'id');
    }
    
    public function LaporanBahanMaterial()
    {
        return $this->hasMany('App\Models\Backend\LaporanBahanMaterial', 'laporan_id', 'id');
    }

    public function LaporanCuaca()
    {
        return $this->hasMany('App\Models\Backend\LaporanCuaca', 'laporan_id', 'id');
    }

    public function LaporanPeralatan()
    {
        return $this->hasMany('App\Models\Backend\LaporanPeralatan', 'laporan_id', 'id');
    }

    public function LaporanTenagaKerja()
    {
        return $this->hasMany('App\Models\Backend\LaporanTenagaKerja', 'laporan_id', 'id');
    }

    public function historyStatusLaporan()
    {
        return $this->hasMany('App\Models\Backend\HistoryStatusLaporan', 'laporan_id', 'id');
    }
}
