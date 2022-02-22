<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryRequest extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'request_history';

    protected $guarded = [];
}
