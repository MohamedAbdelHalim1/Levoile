<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DesignMaterialColor extends Model
{
    protected $fillable = [
        'design_material_id',
        'name',
        'code',
        'current_quantity',
        'unit_of_current_quantity',
        'status', // احتفظ بيها لو بتستخدمها لوسم اللون (new مثلاً)
    ];

    protected $casts = [
        'current_quantity' => 'float',
    ];

    public function material()
    {
        return $this->belongsTo(DesignMaterial::class, 'design_material_id');
    }

    public function requestItems()
    {
        return $this->hasMany(MaterialRequestItem::class, 'design_material_color_id');
    }

    public function receiptItems()
    {
        return $this->hasMany(MaterialReceiptItem::class, 'design_material_color_id');
    }
}
