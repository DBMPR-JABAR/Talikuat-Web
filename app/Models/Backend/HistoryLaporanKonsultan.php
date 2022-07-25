<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryLaporanKonsultan extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'history_laporan_konsultan';
    protected $guarded = [];

    public function laporan()
    {
        return $this->belongsTo(LaporanKonsultan::class, 'laporan_konsultan_id');
    }
}
