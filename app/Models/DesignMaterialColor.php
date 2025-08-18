<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DesignMaterialColor extends Model
{
    protected $fillable = [
        'design_material_id',
        'name',
        'code',     
        'required_quantity',   
        'received_quantity',
        'delivery_date',
        'current_quantity',
    ];

    public function material()
    {
        return $this->belongsTo(DesignMaterial::class, 'design_material_id');
    }
}
