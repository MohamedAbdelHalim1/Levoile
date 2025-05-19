<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Stock extends Model
{
    protected $fillable = ['name'];

    public $timestamps = false;

    public function entries(): HasMany
    {
        return $this->hasMany(ProductStockEntry::class);
    }
}
