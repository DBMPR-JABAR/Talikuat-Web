<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;
    protected $connection= 'db_users_dbmpr';
    protected $table = 'indonesia_provinces';

   
    public function profile()
    {
        return $this->hasOne('App\Models\Backend\UserProfiles', 'province_id');
    }

}
