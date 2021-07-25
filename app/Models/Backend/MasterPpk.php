<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterPpk extends Model
{
    use HasFactory;
    protected $connection= 'mysql';
    protected $table = 'master_ppk';
    protected $guarded = [];
}
