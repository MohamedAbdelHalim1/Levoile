<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaterialRequest extends Model
{
    protected $fillable = ['design_material_id', 'user_id', 'requested_at', 'notes', 'status'];

    // App\Models\MaterialRequest
    protected $casts = [
        'requested_at' => 'datetime',
    ];

    public function material()
    {
        return $this->belongsTo(DesignMaterial::class, 'design_material_id');
    }

    public function items()
    {
        return $this->hasMany(MaterialRequestItem::class, 'request_id');
    }

    public function receipts()
    {
        return $this->hasMany(MaterialReceipt::class, 'request_id');
    }
}
