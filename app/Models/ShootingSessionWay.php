<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShootingSessionWay extends Model
{
    protected $fillable = ['reference', 'way_of_shooting_id'];

    public function way()
    {
        return $this->belongsTo(WayOfShooting::class, 'way_of_shooting_id');
    }

    public function sessions()
    {
        return $this->hasMany(ShootingSession::class, 'reference', 'reference');
    }
}
