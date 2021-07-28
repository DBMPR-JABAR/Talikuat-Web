<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterKonsultan extends Model
{
    use HasFactory;
    protected $connection= 'mysql';
    protected $table = 'master_konsultan';
    protected $guarded = [];

    public function konsultan_ft()
    {
        return $this->hasMany('App\Models\Backend\MasterKonsultanFt', 'konsultan_id');
    }
}
