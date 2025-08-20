<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaterialActivity extends Model
{
    protected $table = 'material_activities';

    protected $fillable = [
        'design_material_id',
        'design_material_color_id',
        'user_id',
        'action',
        'notes',
        'before',
        'after',
    ];

    protected $casts = [
        'before' => 'array',
        'after'  => 'array',
    ];

    public function material()
    {
        return $this->belongsTo(DesignMaterial::class, 'design_material_id');
    }

    public function color()
    {
        return $this->belongsTo(DesignMaterialColor::class, 'design_material_color_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
