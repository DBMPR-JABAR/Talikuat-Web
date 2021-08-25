<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterKontraktor extends Model
{
    use HasFactory;
    protected $connection= 'mysql';
    protected $table = 'master_kontraktor';
    protected $guarded = [];

    public function user_detail()
    {
        return $this->hasOne('App\Models\Backend\UserDetail', 'kontraktor_id');
    }
    public function kontraktor_gs()
    {
        return $this->hasMany('App\Models\Backend\MasterKontraktorGs', 'kontraktor_id');
    }
    public function user_detail_gsc()
    {
        return $this->hasMany('App\Models\Backend\UserDetail', 'kontraktor_id');

        // return $this->hasManyThrough('App\Models\Backend\UserDetail','App\Models\Backend\UserRule', 'id','rule_user_id','id')->where('is_delete',  null);

        // return $this->hasManyThrough('App\Models\Backend\UserDetail','App\Models\Backend\UserRule', 'kontraktor_id','ids','id','rule_user_id')->where('is_delete',  null);
        // return $this->hasManyThrough('App\Models\Backend\UserRule','App\Models\Backend\UserDetail', 'kontraktor_id','id','id','rule_user_id')->where('is_delete',  null);        
    }
}
