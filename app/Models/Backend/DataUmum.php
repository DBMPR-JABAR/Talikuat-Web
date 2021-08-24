<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataUmum extends Model
{
    use HasFactory;
    protected $connection= 'mysql';
    protected $table = 'data_umum';
    protected $guarded = [];

    
}
