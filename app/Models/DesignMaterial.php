<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DesignMaterial extends Model
{
    protected $fillable = [
        'name',
        'image', // لو عايز تحط صورة للخامة أو التصميم
    ];

    public function colors()
    {
        return $this->hasMany(DesignMaterialColor::class, 'design_material_id');
    }

    public function materials()
    {
        return $this->hasMany(DesignSampleMaterial::class);
    }
}
