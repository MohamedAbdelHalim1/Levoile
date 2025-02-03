<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $table = 'histories';

    protected $fillable = [
        'product_id',
        'type',
        'action_by',
        'note'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
