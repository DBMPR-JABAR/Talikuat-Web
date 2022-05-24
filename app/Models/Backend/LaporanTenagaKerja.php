<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanTenagaKerja extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'laporan_tenaga_kerja';
    protected $guarded = [];
    public $timestamps = false;
}
