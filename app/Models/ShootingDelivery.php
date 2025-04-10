<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShootingDelivery extends Model
{



    protected $fillable = ['filename', 'user_id', 'sent_by'];
    public $timestamps = true; 




}
