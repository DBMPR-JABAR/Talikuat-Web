<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataUmum extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'data_umum';
    protected $guarded = [];

    public function detail()
    {
        $detail = $this->hasOne('App\Models\Backend\DataUmumDetail', 'data_umum_id')->where('is_active', 1);
        return $detail->with('konsultan')->with('kontraktor')->with('ppk')->with('ruas');
    }
    public function jadual()
    {
        $detail = $this->hasOne('App\Models\Backend\DataUmumDetail', 'data_umum_id')->where('is_active', 1);
        return $detail->with('jadualItems');
    }

    public function list_details()
    {
        return $this->hasMany('App\Models\Backend\DataUmumDetail', 'data_umum_id');
    }
    public function uptd()
    {
        return $this->belongsTo('App\Models\Backend\Uptd', 'id_uptd', 'id');
    }
    public function kategori_paket()
    {
        return $this->belongsTo('App\Models\Backend\KategoriPaket', 'kategori_paket_id', 'id');
    }
}
