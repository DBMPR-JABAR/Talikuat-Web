<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataUmumRuas extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'data_umum_ruas';
    protected $guarded = [];
}
