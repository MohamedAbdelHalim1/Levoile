<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShootingDelivery extends Model
{



    protected $fillable = [
        'filename',
        'user_id',
        'sent_by',
        'status',
        'total_records',
        'sent_records',
        'new_records',
        'old_records',
    ];

    public $timestamps = true;


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'sent_by');
    }

    public function contents()
    {
        return $this->hasMany(ShootingDeliveryContent::class, 'shooting_delivery_id');
    }
}
