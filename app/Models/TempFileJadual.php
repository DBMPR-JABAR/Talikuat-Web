<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempFileJadual extends Model
{
    use HasFactory;
    protected $table = 'file_temp_jadual';
    protected $guarded = [];
}
