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
}
