<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRule extends Model
{
    use HasFactory;
    protected $connection= 'mysql';
    protected $table = 'rule_user';

    protected $guarded = [];

    public function user_detail()
    {     
        return $this->hasOne('App\Models\Backend\UserDetail', 'user_id');
        // return $this->belongsToMany('App\Models\Backend\UserRule', 'user_rule_user', 'rule_user_id', 'user_id');
    }
    public function rule_user()
    {
        return $this->belongsToMany('App\Models\Backend\UserRule', 'user_rule_user', 'rule_user_id', 'user_id');
    }
    public function permissions()
    {
        return $this->belongsToMany('App\Models\Backend\Permission', 'rule_has_permission','rule_id','permission_id');
    }
}
