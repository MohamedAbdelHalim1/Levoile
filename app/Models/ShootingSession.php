<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShootingSession extends Model
{
    protected $fillable = [
        'reference',
        'shooting_product_color_id',
    ];

    public function color()
    {
        return $this->belongsTo(ShootingProductColor::class, 'shooting_product_color_id');
    }
}
