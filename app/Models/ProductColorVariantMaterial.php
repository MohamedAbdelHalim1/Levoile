<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColorVariantMaterial extends Model
{
    use HasFactory;

    protected $fillable = ['product_color_variant_id', 'material_id'];

    public function productColorVariant()
    {
        return $this->belongsTo(ProductColorVariant::class);
    }

    public function material()
    {
        return $this->belongsTo(Material::class);
    }
}
