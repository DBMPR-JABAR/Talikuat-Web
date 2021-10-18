<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterKontraktorGs extends Model
{
    use HasFactory;
    protected $connection= 'mysql';
    protected $table = 'master_kontraktor_gs';
    protected $guarded = [];

    public function kontraktor()
    {
        return $this->belongsTo('App\Models\Backend\MasterKontraktor', 'kontraktor_id');
    }
    public function user_gs()
    {
        return $this->belongsTo('App\Models\Backend\User', 'gs_user_id');
    }
    public function user_gs_detail()
    {
        return $this->belongsTo('App\Models\Backend\UserDetail', 'gs_user_detail_id');
    }
}
