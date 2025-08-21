<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaterialRequestItem extends Model
{
    protected $fillable = [
        'request_id','design_material_color_id',
        'required_quantity','unit','delivery_date','status'
    ];

    public function request()
    {
        return $this->belongsTo(MaterialRequest::class, 'request_id');
    }

    public function color()
    {
        return $this->belongsTo(DesignMaterialColor::class, 'design_material_color_id');
    }

    public function receiptItems()
    {
        return $this->hasMany(MaterialReceiptItem::class, 'request_item_id');
    }
}
