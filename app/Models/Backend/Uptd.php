<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uptd extends Model
{
    use HasFactory;
    protected $connection= 'db_users_dbmpr';
    protected $table = 'landing_uptd';

    public function user()
    {
        return $this->hasOne('App\Models\Backend\User', 'uptd_id');
    }
    public function data_umum()
    {
        return $this->HasMany('App\Models\Backend\DataUmum', 'id_uptd');
    }
    public function list_user()
    {
        // return $this->belongsToMany('App\Models\Backend\UserDetail', 'user_detail_has_uptd','uptd_id','user_detail_id');
        return $this->belongsToMany('App\Models\Backend\UserDetail', env('talikuat').'user_detail_has_uptd', 'uptd_id', 'user_detail_id');
    }
}
