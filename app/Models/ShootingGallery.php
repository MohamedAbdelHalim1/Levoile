<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShootingGallery extends Model
{
    use HasFactory;

    protected $table = 'shooting_galleries';

    protected $fillable = [
        'shooting_product_id',
        'image',
    ];

    public function product()
    {
        return $this->belongsTo(ShootingProduct::class, 'shooting_product_id');
    }
}
