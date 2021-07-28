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
}
