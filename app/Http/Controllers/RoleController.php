<?php

// app/Http/Controllers/RoleController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    // Show a list of all roles
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    // Show the form for creating a new role
    public function create()
    {
        return view('admin.roles.create');
    }

    // Store a newly created role in the database
    public function store(Request $request)
    {
        // Validate and store the role data
    }

    // Show the form for editing a role
    public function edit(Role $role)
    {
        return view('admin.roles.edit', compact('role'));
    }

    // Update the specified role in the database
    public function update(Request $request, Role $role)
    {
        // Validate and update the role data
    }

    // Remove the specified role from the database
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'Role deleted successfully');
    }
}
