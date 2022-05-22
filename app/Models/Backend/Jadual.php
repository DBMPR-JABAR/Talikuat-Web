<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadual extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'jadual';
    protected $guarded = [];

    public function detail()
    {
        return $this->hasMany('App\Models\Backend\JadualDetail', 'jadual_id');
    }
}
