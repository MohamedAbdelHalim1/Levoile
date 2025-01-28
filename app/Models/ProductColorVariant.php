<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColorVariant extends Model
{
    use HasFactory;

    protected $table = 'product_color_variants';
    protected $fillable = [
        'product_color_id',
        'expected_delivery',
        'quantity',
        'receiving_quantity',
        'parent_id', // Added parent_id
        'status', // Add status here
        'note',
    ];


    public function productcolor()
    {
        return $this->belongsTo(ProductColor::class, 'product_color_id');
    }

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

}
