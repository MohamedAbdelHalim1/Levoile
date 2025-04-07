<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMediaProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'website_admin_product_id',
        'status' // new | done
    ];


    public function websiteAdminProduct()
    {
        return $this->belongsTo(WebsiteAdminProduct::class);
    }

    public function platforms()
    {
        return $this->hasMany(SocialMediaProductPlatform::class);
    }
}
