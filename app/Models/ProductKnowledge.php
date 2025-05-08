<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductKnowledge extends Model
{
    protected $fillable = [
        'subcategory_knowledge_id', 'description', 'gomla', 'item_family_code',
        'season_code', 'product_item_code', 'color', 'size',
        'created_at_excel', 'unit_price', 'image_url', 'quantity', 'no_code',
        'product_code', 'color_code', 'size_code'
    ];

    public function subcategory()
    {
        return $this->belongsTo(SubcategoryKnowledge::class, 'subcategory_knowledge_id');
    }
}
