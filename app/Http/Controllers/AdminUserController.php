<?php

// app/Http/Controllers/AdminUserController.php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $users = User::all(); // Retrieve all users

        return view('admin.users.index', compact('users'));
    }

    //Show a particular user's details
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
        // Delete the user
        $user->delete();

        // Redirect to the user index page or any other appropriate page
        return redirect()->route('admin.users.index');
    }
}
