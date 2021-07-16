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
    }
}
