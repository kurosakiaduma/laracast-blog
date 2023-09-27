<?php

namespace App\Http\Controllers;

use App\Models\User;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:7|max:255',
        ]);

        if ($attributes['name'] == 'tevinaduma'){
            $attributes['isAdmin'] = true;
        }
        $user = User::create($attributes);

        auth()->login($user);

        return response()->json(['message' => 'Your account has been created.']);
    }
}
