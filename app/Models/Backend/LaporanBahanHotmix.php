<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanBahanHotmix extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'laporan_bahan_hotmix';
    protected $guarded = [];
    public $timestamps = false;
}
