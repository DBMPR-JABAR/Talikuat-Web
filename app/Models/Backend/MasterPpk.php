<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterPpk extends Model
{
    use HasFactory;
    protected $connection= 'mysql';
    protected $table = 'master_ppk';
    protected $guarded = [];

    public function uptd()
    {
        return $this->belongsTo('App\Models\Backend\Uptd', 'uptd_id');
    }
    public function user_ppk_detail()
    {
        return $this->belongsTo('App\Models\Backend\UserDetail', 'user_detail_id','id');
    }
    
}
