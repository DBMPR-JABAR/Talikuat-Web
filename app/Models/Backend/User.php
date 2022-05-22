<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
 
    use HasApiTokens, HasFactory, Notifiable;
    protected $connection= 'db_users_dbmpr';
    protected $table = 'users';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    protected $fillable = [
        'name', 'email', 'password',
    ];

    public function profile()
    {
        return $this->hasOne('App\Models\Backend\UserProfiles', 'user_id');
    }
    public function user_detail()
    {
        return $this->hasOne('App\Models\Backend\UserDetail', 'user_id');
    }
    public function uptd()
    {
        return $this->belongsTo('App\Models\Backend\Uptd', 'uptd_id');
    }

    public function user_rule()
    {
        return $this->belongsToMany('App\Models\Backend\UserRule', 'user_rule_user', 'user_id', 'rule_user_id');
    }
    public function user_se()
    {
        return $this->hasOne('App\Models\Backend\MasterKonsultanFt', 'se_user_id');
    }
    public function user_ie()
    {
        return $this->hasOne('App\Models\Backend\MasterKonsultanFt', 'ie_user_id');
    }
}

