<?php

// app/Models/ProductSessionDriveLink.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSessionDriveLink extends Model
{
    protected $fillable = ['product_id', 'reference', 'drive_link'];

    public function product()
    {
        return $this->belongsTo(ShootingProduct::class, 'product_id');
    }
}
