<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataUmumDetail extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'data_umum_detail';
    protected $guarded = [];

    public function dataUmum()
    {
        return  $this->belongsTo(DataUmum::class, 'data_umum_id')->with('uptd');
    }

    public function konsultan()
    {
        return $this->belongsTo('App\Models\Backend\MasterKonsultan', 'konsultan_id');
    }
    public function ft()
    {
        return $this->belongsTo('App\Models\Backend\MasterKonsultanFt', 'ft_id');
    }
    public function kontraktor()
    {
        return $this->belongsTo('App\Models\Backend\MasterKontraktor', 'kontraktor_id');
    }
    public function gs()
    {
        return $this->belongsTo('App\Models\Backend\MasterKontraktorGs', 'gs_id');
    }
    public function ppk()
    {
        return $this->belongsTo('App\Models\Backend\UserDetail', 'ppk_id');
    }
    public function dirlap()
    {
        return $this->belongsTo('App\Models\Backend\UserDetail', 'dirlap_id');
    }
    public function jadualItems()
    {
        return $this->hasMany('App\Models\Backend\Jadual', 'data_umum_detail_id');
    }
    public function jadualItemsDetails()
    {
        return $this->hasMany('App\Models\Backend\Jadual', 'data_umum_detail_id')->with('detail');
    }

    public function ruas()
    {
        return $this->hasMany(DataUmumRuas::class, 'data_umum_detail_id');
    }

    public function ppkDetail()
    {
        return $this->belongsTo('App\Models\Backend\UserDetail', 'ppk_id')->with('user');
    }

    public function tenagaAhli()
    {
        return $this->hasMany(TenagaAhli::class, 'data_umum_detail_id');
    }
}
