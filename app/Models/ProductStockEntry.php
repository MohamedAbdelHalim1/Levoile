<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductStockEntry extends Model
{

    protected $table = 'product_stock_entries';

    protected $fillable = [
        'product_knowledge_id',
        'stock_id',
        'quantity',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(ProductKnowledge::class, 'product_knowledge_id');
    }

    public function stock(): BelongsTo
    {
        return $this->belongsTo(Stock::class);
    }
}
