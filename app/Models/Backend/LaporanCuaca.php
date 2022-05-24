<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanCuaca extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'laporan_cuaca';
    protected $guarded = [];
    public $timestamps = false;
}
