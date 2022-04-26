<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;
    
    protected $connection= 'mysql';
    protected $table = 'user_details';
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo('App\Models\Backend\User', 'user_id');
    }
    public function role()
    {
        return $this->belongsTo('App\Models\Backend\UserRule', 'rule_user_id');
        // return $this->belongsToMany('App\Models\Backend\UserRule', 'user_rule_user', 'user_id', 'rule_user_id','user_id');
        
    }
    public function kontraktor()
    {
        return $this->belongsTo('App\Models\Backend\MasterKontraktor', 'kontraktor_id');
    }
    public function user_se_detail()
    {
        return $this->hasOne('App\Models\Backend\MasterKonsultanFt', 'se_user_id','user_id');
    }
    public function user_ie_detail()
    {
        return $this->hasOne('App\Models\Backend\MasterKonsultanFt', 'ie_user_id','user_id');
    }
    public function user_gs_detail()
    {
        return $this->hasOne('App\Models\Backend\MasterKontraktorGs', 'gs_user_id','user_id');
    }
    public function gs()
    {
        return $this->hasOne('App\Models\Backend\MasterKontraktorGs', 'gs_user_detail_id');
    }
    public function konsultan()
    {
        return $this->belongsTo('App\Models\Backend\MasterKonsultan', 'konsultan_id');
        // return $this->belongsToMany('App\Models\Backend\UserRule', 'user_rule_user', 'user_id', 'rule_user_id','user_id');
    }
    public function ppk()
    {
        return $this->hasOne('App\Models\Backend\MasterPpk', 'user_detail_id');
    }
    // public function lists_uptd()
    // {
    //     return $this->hasMany('App\Models\Backend\UserDetailUptd', 'user_detail_id')->orderBy('uptd_id', 'asc');
    // }
    public function master_admin()
    {
        return $this->hasOne('App\Models\Backend\MasterAdmin', 'user_detail_id');
    }
    public function uptd()
    {
        return $this->belongsTo('App\Models\Backend\Uptd', 'uptd_id');
    }
    public function list_uptd()
    {
        // return $this->belongsToMany('App\Models\Backend\Uptd', 'user_detail_has_uptd','user_detail_id','uptd_id');
        return $this->belongsToMany('App\Models\Backend\Uptd', 'talikuat_fix.user_detail_has_uptd', 'user_detail_id', 'uptd_id');

    }
}
