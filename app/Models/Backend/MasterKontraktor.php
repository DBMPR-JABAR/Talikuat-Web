<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterKontraktor extends Model
{
    use HasFactory;
    protected $connection= 'mysql';
    protected $table = 'master_penyedia_jasa';
    protected $guarded = [];
}
