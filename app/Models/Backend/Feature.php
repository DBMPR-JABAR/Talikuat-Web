<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;
    protected $connection= 'mysql';
    protected $table = 'features';

    protected $guarded = [];

    public function permission()
    {
        return $this->hasMany('App\Models\Backend\Permission', 'feature_id');
    }
    public function category()
    {
        return $this->belongsTo('App\Models\Backend\FeatureCategory', 'feature_category_id');
    }
}
