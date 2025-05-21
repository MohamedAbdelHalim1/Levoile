<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShootingSessionWay extends Model
{
    protected $fillable = ['shooting_session_id', 'way_of_shooting_id'];

    public function session()
    {
        return $this->belongsTo(ShootingSession::class, 'shooting_session_id');
    }

    public function way()
    {
        return $this->belongsTo(WayOfShooting::class, 'way_of_shooting_id');
    }
}
