<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReadyToShoot extends Model
{
    use SoftDeletes;

    protected $table = 'ready_to_shoot';

    protected $fillable = [
        'shooting_product_id',
        'item_no',
        'description',
        'quantity',
        'status',
        'type_of_shooting',
    ];

    public function shootingProduct()
    {
        return $this->belongsTo(ShootingProduct::class);
    }
}
