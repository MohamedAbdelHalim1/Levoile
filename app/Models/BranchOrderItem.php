<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BranchOrderItem extends Model
{
    protected $fillable = [
        'user_id',
        'product_knowledge_id',
        'requested_quantity',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
