<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubcategoryKnowledge extends Model
{
    protected $fillable = ['name', 'category_knowledge_id'];

    public function category()
    {
        return $this->belongsTo(CategoryKnowledge::class , 'category_knowledge_id');
    }

    public function products()
    {
        return $this->hasMany(ProductKnowledge::class , 'subcategory_knowledge_id');
    }
}
