<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DesignComment extends Model
{
    protected $fillable = ['design_sample_id', 'user_id', 'content', 'image'];

    public $timestamps = false; // لأن created_at فقط وليس updated_at

    protected $dates = ['created_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function designSample()
    {
        return $this->belongsTo(DesignSample::class);
    }
}
