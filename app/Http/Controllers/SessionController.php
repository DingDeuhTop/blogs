<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        //validate the request
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        //attempt to authenticate and log in the user
        //based on the provided credentials

        if (auth()->attempt($attributes)) {
            // auth failed
            throw ValidationException::withMessages([
                'email' => 'Your provided crendentials could not be verified'
            ]);
            // return back()->withInput()->withErrors(['email' => 'Your  provided crendentials could not be verified']);
        }
        session()->regenerate();
        //redirect with a success flash message
        return redirect('/')->with('success', 'Welcome Back!');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/login')->with('success', 'Goodbye!');
    }
}
