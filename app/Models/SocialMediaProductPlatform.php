<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMediaProductPlatform extends Model
{
    protected $fillable = ['social_media_product_id', 'platform', 'publish_date', 'type'];

    public function socialMediaProduct()
    {
        return $this->belongsTo(SocialMediaProduct::class);
    }
}
