<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BahanJMF extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'request_jmf';

    protected $guarded = [];
}
