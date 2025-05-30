<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShootingSession extends Model
{
    protected $fillable = [
        'reference',
        'shooting_product_color_id',
        'status',
        'drive_link',
        'note',
    ];

    public function color()
    {
        return $this->belongsTo(ShootingProductColor::class, 'shooting_product_color_id');
    }

    public function sessionWays()
    {
        return $this->hasMany(ShootingSessionWay::class, 'shooting_session_id');
    }

    public function editSessions()
    {
        return $this->hasMany(EditSession::class, 'reference', 'reference');
    }
}
