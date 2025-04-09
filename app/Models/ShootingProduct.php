<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShootingProduct extends Model
{
    use HasFactory;

    protected $table = 'shooting_products';

    protected $fillable = [
        'name',
        'description',
        'number_of_colors',
        'price',
        'status',
        'type_of_shooting',
        'location',
        'date_of_shooting',
        'photographer', //multiple selection so it will be an array
        'date_of_editing',
        'editor', //multiple selection so it will be an array
        'date_of_delivery',
        'drive_link',
        'main_image',
        'quantity'
    ];

    public function shootingProductColors()
    {
        return $this->hasMany(ShootingProductColor::class);
    }

    public function gallery()
    {
        return $this->hasMany(ShootingGallery::class);
    }
}
