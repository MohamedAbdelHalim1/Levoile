<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Material extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function variantMaterials()
    {
        return $this->hasMany(ProductColorVariantMaterial::class, 'material_id');
    }
    
}
