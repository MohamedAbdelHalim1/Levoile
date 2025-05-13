<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OpenOrder extends Model
{
    protected $table = 'open_orders';

    protected $fillable = [
        'user_id',
        'is_opened',
        'is_closed',
        'notes',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
