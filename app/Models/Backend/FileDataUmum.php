<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileDataUmum extends Model
{
    use HasFactory;
    protected $connection= 'mysql';
    protected $table = 'file_data_umum';
    protected $guarded = [];
}
