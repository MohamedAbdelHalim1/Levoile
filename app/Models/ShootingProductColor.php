<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShootingProductColor extends Model
{
    use HasFactory;

    protected $fillable = ['shooting_product_id', 'name' ,  'code', 'image'];

    public function shootingProduct()
    {
        return $this->belongsTo(ShootingProduct::class);
    }
}
