<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MismatchedProduct extends Model
{
    protected $fillable = ['open_order_id', 'no_code', 'quantity'];

    public function order()
    {
        return $this->belongsTo(OpenOrder::class, 'open_order_id');
    }
}
