<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetailUptd extends Model
{
    use HasFactory;
    
    protected $connection= 'mysql';
    protected $table = 'user_detail_has_uptd';
    protected $guarded = [];
    public function uptd()
    {
        return $this->belongsTo('App\Models\Backend\Uptd', 'uptd_id');
    }
}
