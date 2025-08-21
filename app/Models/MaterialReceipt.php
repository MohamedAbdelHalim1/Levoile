<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaterialReceipt extends Model
{
    protected $fillable = ['request_id','user_id','received_at','increase_current','notes'];

    protected $casts = [
        'increase_current' => 'boolean',
        'received_at' => 'datetime',
    ];

    public function request()
    {
        return $this->belongsTo(MaterialRequest::class, 'request_id');
    }

    public function items()
    {
        return $this->hasMany(MaterialReceiptItem::class, 'receipt_id');
    }
}
