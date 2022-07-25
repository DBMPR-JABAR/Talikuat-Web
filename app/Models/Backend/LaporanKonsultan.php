<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanKonsultan extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'laporan_konsultan';
    protected $guarded = [];


    public function dataUmum()
    {
        return $this->belongsTo(DataUmum::class, 'data_umum_id');
    }

    public function history()
    {
        return $this->hasMany(HistoryLaporanKonsultan::class, 'laporan_konsultan_id');
    }
}
