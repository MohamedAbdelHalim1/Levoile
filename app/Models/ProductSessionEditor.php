<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ProductSessionEditor extends Model
{
    protected $fillable = ['reference','product_id','user_id','receiving_date','status'];
    public function product(){ return $this->belongsTo(ShootingProduct::class,'product_id'); }
    public function user(){ return $this->belongsTo(User::class,'user_id'); }
}
