<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenagaKerja extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'reuest_tenaga_kerja';

    protected $guarded = [];
}
