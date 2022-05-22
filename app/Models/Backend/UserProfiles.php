<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfiles extends Model
{
    use HasFactory;
    protected $connection= 'db_users_dbmpr';
    protected $table = 'user_profiles';
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo('App\Models\Backend\User', 'user_id');
    }
    public function province()
    {
        return $this->belongsTo('App\Models\Backend\Province', 'province_id');
    }
    public function city()
    {
        return $this->belongsTo('App\Models\Backend\City', 'city_id');
    }
}
