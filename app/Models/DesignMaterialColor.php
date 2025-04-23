<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DesignMaterialColor extends Model
{
    protected $fillable = [
        'design_material_id',
        'name',
        'code',     
        'image',   
    ];

    public function material()
    {
        return $this->belongsTo(DesignMaterial::class, 'design_material_id');
    }
}
