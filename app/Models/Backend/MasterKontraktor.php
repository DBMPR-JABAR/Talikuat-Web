<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterKontraktor extends Model
{
    use HasFactory;
    protected $connection= 'mysql';
    protected $table = 'master_kontraktor';
    protected $guarded = [];

    public function user_detail()
    {
        return $this->hasOne('App\Models\Backend\UserDetail', 'kontraktor_id');
    }
    public function kontraktor_gs()
    {
        return $this->hasMany('App\Models\Backend\MasterKontraktorGs', 'kontraktor_id');
    }
}
