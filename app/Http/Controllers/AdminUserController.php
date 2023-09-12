<?php

// app/Http/Controllers/AdminUserController.php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $users = User::with('roles')->get(); // Retrieve all users

        return view('admin.users.index', compact('users'));
    }

    //Show a particular user's roles
    public function show(User $user): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $roles = $user->roles; // Retrieve the roles associated with the user

        return view('admin.users.show', compact('user', 'roles'));
    }

    // Display the user role editing form
    public function edit(User $user): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    // Update user roles
    public function update(Request $request, User $user): \Illuminate\Http\RedirectResponse
    {
        $this->validate($request, [
            'roles' => 'required|array|min:1',
        ]);

        $user->roles()->sync($request->input('roles'));

        return redirect()->route('admin.users.show', $user)
            ->with('success', 'User roles updated successfully.');
    }

    public function destroy(User $user)
    {
        // Get user details before deletion
        $userName = $user->name;
        $userEmail = $user->email;
        $userRoles = $user->getRoles();

        //DDD details
        //dd($userName, $userEmail);

        // Convert user details to a string
        $userDetails = "User '$userName' ($userEmail) with roles '$userRoles' has been deleted successfully.";

        // Delete the user
        $user->delete();

        // Flash a success message with user details
        return redirect()->route('admin.users.index')->with('success', $userDetails);
    }
}
