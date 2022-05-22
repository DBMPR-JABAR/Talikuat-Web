<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RuasJalan extends Model
{
    use HasFactory;
    protected $connection= 'db_users_dbmpr';
    protected $table = 'master_ruas_jalan';
    protected $guarded =[];
}
