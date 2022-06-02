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

}
