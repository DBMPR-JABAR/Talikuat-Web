<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterKonsultan extends Model
{
    use HasFactory;
    protected $connection= 'mysql';
    protected $table = 'master_konsultan';
    protected $guarded = [];

    public function konsultan_ft()
    {
        return $this->hasMany('App\Models\Backend\MasterKonsultanFt', 'konsultan_id')->where('is_delete',  null);
    }
    public function user_detail()
    {
        return $this->hasMany('App\Models\Backend\UserDetail', 'konsultan_id')->where('is_delete',  null);
        
    }
    public function user_detail_sec()
    {
        return $this->hasManyThrough('App\Models\Backend\UserDetail','App\Models\Backend\UserRule', 'id','konsultan_id')->where('is_delete',  null);
        // return $this->hasManyThrough('App\Models\Backend\UserRule','App\Models\Backend\UserDetail', 'konsultan_id','id','id','rule_user_id')->where('is_delete',  null);        
    }

}
