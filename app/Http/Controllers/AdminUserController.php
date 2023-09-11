<?php

// app/Http/Controllers/AdminUserController.php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function show(User $user)
    {
        $roles = $user->getRoles(); // This ports from the getRoles() method in User model

        return view('admin.users.show', compact('user', 'roles'));
    }
}
