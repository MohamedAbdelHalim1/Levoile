<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OpenOrder extends Model
{
    protected $table = 'open_orders';

    protected $fillable = [
        'user_id',
        'is_opened',
        'closed_at',
        'notes',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(BranchOrderItem::class, 'open_order_id');
    }
}
