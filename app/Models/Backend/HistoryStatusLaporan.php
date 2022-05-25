<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryStatusLaporan extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'history_status_laporan';
    protected $guarded = [];
}
