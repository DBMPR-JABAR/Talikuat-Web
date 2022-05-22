<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadualDetail extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'jadual_detail';
    protected $guarded = [];
}
