<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShootingDeliveryContent extends Model
{
    protected $fillable = [
        'shooting_delivery_id',
        'item_no',
        'description',
        'quantity',
        'unit',
        'primary_id',
        'is_received',
        'status',
    ];

    public function delivery()
    {
        return $this->belongsTo(ShootingDelivery::class, 'shooting_delivery_id');
    }
}
