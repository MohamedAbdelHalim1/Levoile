<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EditSession extends Model
{
    protected $table = 'edit_sessions';

    protected $fillable = [
        'reference',
        'drive_link',
        'status',
        'photo_drive_link'
    ];

    public $timestamps = true;
}
