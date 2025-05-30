<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WayOfShooting extends Model
{
    protected $table = 'ways_of_shooting';
    protected $fillable = ['name'];

    public function sessionWays()
    {
        return $this->hasMany(ShootingSessionWay::class, 'way_of_shooting_id');
    }
}
