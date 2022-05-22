<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenagaAhli extends Model
{
    use HasFactory;
    protected $connection= 'mysql';
    protected $table = 'tenaga_ahli';
    protected $guarded =[];
}
