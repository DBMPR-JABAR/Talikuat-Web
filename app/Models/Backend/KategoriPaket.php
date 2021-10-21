<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriPaket extends Model
{
    use HasFactory;
    protected $connection= 'mysql';
    protected $table = 'kategori_paket';
    protected $guarded = [];
}
