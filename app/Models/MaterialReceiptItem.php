<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaterialReceiptItem extends Model
{
    protected $fillable = [
        'receipt_id','request_item_id','design_material_color_id','quantity','unit'
    ];

    public function receipt()
    {
        return $this->belongsTo(MaterialReceipt::class, 'receipt_id');
    }

    public function requestItem()
    {
        return $this->belongsTo(MaterialRequestItem::class, 'request_item_id');
    }

    public function color()
    {
        return $this->belongsTo(DesignMaterialColor::class, 'design_material_color_id');
    }
}
