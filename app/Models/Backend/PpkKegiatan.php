<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PpkKegiatan extends Model
{
    use HasFactory;
    protected $connection= 'mysql';
    protected $table = 'ppk_kegiatan';
}
