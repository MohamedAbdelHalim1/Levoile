<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShootingDelivery extends Model
{
    protected $fillable = ['filename', 'uploaded_at'];
    public $timestamps = false;
}
