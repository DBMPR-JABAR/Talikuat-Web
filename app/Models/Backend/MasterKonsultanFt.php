<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterKonsultanFt extends Model
{
    use HasFactory;
    protected $connection= 'mysql';
    protected $table = 'master_konsultan_ft';
    protected $guarded = [];

    public function konsultan()
    {
        return $this->belongsTo('App\Models\Backend\MasterKonsultan', 'konsultan_id');
    }
    public function user_se()
    {
        return $this->belongsTo('App\Models\Backend\User', 'se_user_id');
    }
    public function user_ie()
    {
        return $this->belongsTo('App\Models\Backend\User', 'ie_user_id');
    }
    public function user_se_detail()
    {
        return $this->belongsTo('App\Models\Backend\UserDetail', 'se_user_id','user_id');
    }
    public function user_ie_detail()
    {
        return $this->belongsTo('App\Models\Backend\UserDetail', 'ie_user_id','user_id');
    }
}
