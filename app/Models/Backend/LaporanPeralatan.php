<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanPeralatan extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'laporan_peralatan';
    protected $guarded = [];
    public $timestamps = false;
}
