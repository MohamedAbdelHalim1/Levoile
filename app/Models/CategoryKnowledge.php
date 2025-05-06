<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryKnowledge extends Model
{
    protected $fillable = ['name'];

    public function subcategories()
    {
        return $this->hasMany(SubcategoryKnowledge::class);
    }
}
