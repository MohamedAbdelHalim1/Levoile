<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = [
        'access',
    ];

    public function role_permissions()
    {
        return $this->hasMany(RolePermission::class , 'permission_id');
    }
}