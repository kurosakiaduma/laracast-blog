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

    public function show(User $user): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $roles = $user->roles; // Retrieve the roles associated with the user

        return view('admin.users.show', compact('user', 'roles'));
    }
}
