<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataUmumDetail extends Model
{
    use HasFactory;
    protected $connection= 'mysql';
    protected $table = 'data_umum_detail';
    protected $guarded = [];

    public function konsultan()
    {
        return $this->belongsTo('App\Models\Backend\MasterKonsultan', 'konsultan_id');
    }
    public function ft()
    {
        return $this->belongsTo('App\Models\Backend\MasterKonsultanFt', 'ft_id');
    }
    public function kontraktor()
    {
        return $this->belongsTo('App\Models\Backend\MasterKontraktor', 'kontraktor_id');
    }
    public function gs()
    {
        return $this->belongsTo('App\Models\Backend\MasterKontraktorGs', 'gs_id');
    }
    public function ppk()
    {
        return $this->belongsTo('App\Models\Backend\MasterPpk', 'ppk_id');
    }
}
