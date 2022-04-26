<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BahanMaterial extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'request_bahan_material';
    protected $guarded = [];

    public function request()
    {
        return $this->belongsTo(Request::class, 'request_id');
    }
}
