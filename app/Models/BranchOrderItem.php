<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BranchOrderItem extends Model
{
    protected $fillable = [
        'user_id',
        'product_knowledge_id',
        'requested_quantity',
        'open_order_id',
        'delivered_quantity',
        'receiving_status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(ProductKnowledge::class , 'product_knowledge_id');
    }

       public function order()
    {
        return $this->belongsTo(OpenOrder::class, 'open_order_id');
    }

}
