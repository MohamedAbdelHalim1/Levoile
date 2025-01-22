<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'category_id',
        'season_id',
        'factory_id',
        'photo',
        'have_stock',
        'material_name',
        'marker_number',
        'status',
        'code',
        'name',
        'store_launch',
        'price',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function season()
    {
        return $this->belongsTo(Season::class);
    }

    public function factory()
    {
        return $this->belongsTo(Factory::class);
    }

    public function productColors()
    {
        return $this->hasMany(ProductColor::class);
    }

  
}
