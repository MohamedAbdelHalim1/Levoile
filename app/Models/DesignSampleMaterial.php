<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DesignSampleMaterial extends Model
{
    protected $fillable = [
        'design_sample_id',
        'design_material_id',
    ];

    public function designSample()
    {
        return $this->belongsTo(DesignSample::class);
    }

    public function material()
    {
        return $this->belongsTo(DesignMaterial::class);
    }
}
