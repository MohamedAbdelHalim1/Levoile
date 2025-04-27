<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DesignSample extends Model
{
    protected $fillable = [
        'description',
        'season_id',
        'category_id',
        'image',
    ];

    public function season()
    {
        return $this->belongsTo(Season::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function materials()
    {
        return $this->hasMany(DesignSampleMaterial::class , 'design_sample_id');
    }
}
