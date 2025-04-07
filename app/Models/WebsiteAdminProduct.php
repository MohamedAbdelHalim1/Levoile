<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteAdminProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'shooting_product_id',
        'name',
        'status',
        'note',
        'published_at',
    ];

    public function shootingProduct()
    {
        return $this->belongsTo(ShootingProduct::class);
    }
}
