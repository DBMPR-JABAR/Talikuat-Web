<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataUmum extends Model
{
    use HasFactory;
    protected $connection= 'mysql';
    protected $table = 'data_umum';
    protected $guarded = [];

    public function detail()
    {
        return $this->hasOne('App\Models\Backend\DataUmumDetail', 'data_umum_id')->where('is_active', 1);
    }
    public function list_details()
    {
        return $this->hasMany('App\Models\Backend\DataUmumDetail', 'data_umum_id');
    }
    public function ruas()
    {
        return $this->hasMany('App\Models\Backend\DataUmumRuas', 'data_umum_id');
    }
}
