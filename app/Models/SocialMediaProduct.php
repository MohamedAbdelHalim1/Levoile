<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMediaProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'website_admin_product_id',
        'platforms', // json (array of platforms)
        'publish_datetime',
        'post_type', // post | story | reel
        'status' // new | done
    ];

    protected $casts = [
        'platforms' => 'array',
        'publish_datetime' => 'datetime',
    ];

    public function websiteAdminProduct()
    {
        return $this->belongsTo(WebsiteAdminProduct::class);
    }
}
