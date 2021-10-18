<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterMk extends Model
{
    use HasFactory;
    protected $connection= 'mysql';
    protected $table = 'master_mk';
    protected $guarded = [];
    // public function uptd()
    // {
    //     return $this->belongsTo('App\Models\Backend\Uptd', 'uptd_id');
    // }
    // public function user_detail()
    // {
    //     return $this->belongsTo('App\Models\Backend\UserDetail', 'user_detail_id','id');
    // }
    public function user_lists()
    {
        return $this->hasMany('App\Models\Backend\UserDetail', 'mk_id');
    }
}
