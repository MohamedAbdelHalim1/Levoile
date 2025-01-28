<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
    use HasFactory;

    protected $table = 'role_permissions';

    protected $fillable = ['role_id', 'permission_id', 'action'];

    public function roles() {
        return $this->belongsTo(Role::class , 'role_id');
    }

    public function permissions() {
        return $this->belongsTo(Permission::class , 'permission_id');
    }
}