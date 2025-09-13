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
        'main_image',
        'quantity',
        'custom_id',
        'shooting_method',
        'is_reviewed',
    ];

    public function shootingProductColors()
    {
        return $this->hasMany(ShootingProductColor::class);
    }

    public function gallery()
    {
        return $this->hasMany(ShootingGallery::class);
    }

    public function refreshStatusBasedOnColors()
    {
        $statuses = $this->shootingProductColors()->pluck('status');

        if ($statuses->every(fn($status) => $status === 'completed')) {
            $this->status = 'completed';
        } elseif ($statuses->every(fn($status) => $status === 'new')) {
            $this->status = 'new';
        } else {
            $this->status = 'partial';
        }

        $this->save();
    }

    public function readyToShoot()
    {
        return $this->hasMany(ReadyToShoot::class, 'shooting_product_id');
    }

    public function productSessionLinks()
    {
        return $this->hasMany(ProductSessionDriveLink::class, 'product_id');
    }
}
