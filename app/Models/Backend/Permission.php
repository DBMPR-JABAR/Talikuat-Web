<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $connection= 'mysql';
    protected $table = 'permissions';

    protected $guarded = [];
    public function roles()
    {
        return $this->belongsToMany('App\Models\Backend\UserRule', 'rule_has_permission','permission_id','rule_id');
    }
    public function feature()
    {
        return $this->belongsTo('App\Models\Backend\Feature', 'feature_id');
    }
}
