<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeatureCategory extends Model
{
    use HasFactory;
    protected $connection= 'mysql';
    protected $table = 'feature_categories';

    protected $guarded = [];
    public function features()
    {
        return $this->hasMany('App\Models\Backend\Feature', 'feature_category_id');
    }
}
