<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterJenisPekerjaan extends Model
{
    use HasFactory;
    protected $connection= 'mysql';
    protected $table = 'master_jenis_pekerjaan';
    protected $guarded = [];
}
