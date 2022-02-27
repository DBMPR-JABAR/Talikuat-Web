<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'requests';
    protected $guarded = [];


    public function dataUmumDetail()
    {
        $detail = $this->belongsTo(DataUmumDetail::class, 'data_umum_detail_id');
        return $detail->with('dataUmum');
    }

    public function jadual()
    {
        return $this->belongsTo(Jadual::class, 'jadual_id');
    }

    public function historyStatus()
    {
        return $this->hasMany(HistoryStatusRequest::class, 'request_id');
    }

    public function historyRequest()
    {
        return $this->hasMany(HistoryRequest::class, 'request_id');
    }

    public function detailBahan()
    {
        return $this->hasMany(BahanMaterial::class, 'request_id');
    }

    public function detailPeralatan()
    {
        return $this->hasMany(Peralatan::class, 'request_id');
    }

    public function detailTenagaKerja()
    {
        return $this->hasMany(TenagaKerja::class, 'request_id');
    }

    public function detailBahanJMF()
    {
        return $this->hasMany(BahanJMF::class, 'request_id');
    }
}
