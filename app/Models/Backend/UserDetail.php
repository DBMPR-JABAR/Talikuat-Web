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
    public function rule()
    {
        return $this->belongsTo('App\Models\Backend\UserRule', 'rule_user_id');
        // return $this->belongsToMany('App\Models\Backend\UserRule', 'user_rule_user', 'user_id', 'rule_user_id','user_id');
        
    }
    public function company()
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
    public function konsultan()
    {
        return $this->belongsTo('App\Models\Backend\MasterKonsultan', 'konsultan_id');
        // return $this->belongsToMany('App\Models\Backend\UserRule', 'user_rule_user', 'user_id', 'rule_user_id','user_id');
    }
}
