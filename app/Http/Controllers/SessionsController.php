<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (! auth()->attempt($attributes)) {
            return response()->json(['message' => 'Your provided credentials could not be verified.'], 401);
        }

        session()->regenerate();

        return response()->json(['message' => 'Welcome Back!']);
    }


    public function destroy()
    {
        //logout the user from the session and revert to guest/anonymous
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye!');
    }
}
