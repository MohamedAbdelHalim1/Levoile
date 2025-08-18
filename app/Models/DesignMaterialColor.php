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
        'unit_of_current_quantity',
        'unit_of_required_quantity',
        'unit_of_received_quantity',
        'status',
    ];

    public function material()
    {
        return $this->belongsTo(DesignMaterial::class, 'design_material_id');
    }
}
