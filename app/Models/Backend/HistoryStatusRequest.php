<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryStatusRequest extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'history_status_request';

    protected $guarded = [];

    public function request()
    {
        return $this->belongsTo(Request::class, 'request_id');
    }
}
