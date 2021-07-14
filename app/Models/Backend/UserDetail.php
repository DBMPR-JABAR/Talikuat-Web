<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;
    protected $table = 'user_details';
    public function user()
    {
        return $this->belongsTo('App\Models\Backend\User', 'user_id');
    }
}
