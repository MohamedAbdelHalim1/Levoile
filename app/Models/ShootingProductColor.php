<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShootingProductColor extends Model
{
    use HasFactory;

    protected $fillable = [
        'shooting_product_id',
        'name',
        'code',
        'image',
        'price',
        'status',
        'type_of_shooting',
        'location',
        'date_of_shooting',
        'photographer', //multiple selection so it will be an array
        'date_of_editing',
        'editor', //multiple selection so it will be an array
        'date_of_delivery',
        'shooting_method',
        'color_code',
        'size_code',
        'size_name',
    ];

    public function shootingProduct()
    {
        return $this->belongsTo(ShootingProduct::class);
    }

    public function sessions(){
        return $this->hasMany(ShootingSession::class);
    }

    
}
