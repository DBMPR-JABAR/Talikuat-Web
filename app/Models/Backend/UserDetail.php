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
    }
}
