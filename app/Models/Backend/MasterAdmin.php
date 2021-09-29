<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterAdmin extends Model
{
    use HasFactory;
    protected $connection= 'mysql';
    protected $table = 'master_admin';
    protected $guarded = [];
    public function uptd()
    {
        return $this->belongsTo('App\Models\Backend\Uptd', 'uptd_id');
    }
    public function user_detail()
    {
        return $this->belongsTo('App\Models\Backend\UserDetail', 'user_detail_id','id');
    }
}
