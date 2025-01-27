<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Permission;
use App\Models\RolePermission;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::with('role_permissions.permissions')->get();
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Role::create($validated);

        return redirect()->route('roles.index')->with('success', 'Role created successfully!');
    }
    public function show(Role $role)
    {
        $role->load('users', 'role_permissions.permissions');
        return view('roles.show', compact('role'));
    }

    public function edit(Role $role)
    {
        return view('roles.edit', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $role->update($validated);

        return redirect()->route('roles.index')->with('success', 'Role updated successfully!');
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('roles.index')->with('success', 'Role deleted successfully!');
    }

    public function editPermissions(Role $role)
    {
        $permissions = Permission::all();
    
        // Fetch role permissions with both `permission_id` and `action`
        $rolePermissions = $role->role_permissions->map(function ($rolePermission) {
            return $rolePermission->permission_id . '_' . $rolePermission->action;
        })->toArray();
    
        return view('roles.permissions', compact('role', 'permissions', 'rolePermissions'));
    }
    

    public function updatePermissions(Request $request, Role $role)
    {
        // Extract permissions from the input
        $permissions = $request->input('permissions', []);
    
        // Process permissions into a structured array
        $processedPermissions = [];
        foreach ($permissions as $permission) {
            [$id, $action] = explode('_', $permission);
            $processedPermissions[] = [
                'role_id' => $role->id,
                'permission_id' => $id,
                'action' => $action,
            ];
        }
    
        // Remove old permissions
        RolePermission::where('role_id', $role->id)->delete();
    
        // Add new permissions
        foreach ($processedPermissions as $perm) {
            RolePermission::create([
                'role_id' => $perm['role_id'],
                'permission_id' => $perm['permission_id'],
                'action' => $perm['action'],
            ]);
        }
    
        return redirect()->route('roles.index')->with('success', 'Permissions updated successfully!');
    }
    
    
}
