<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    // show register form
    public function create()
    {
        return view("users.register");
    }

    //create new user

    public function store(Request $request)
    {
        $formFields = $request->validate([
            "name" => ['required', 'min:3'],
            "email" => ['required', 'email', Rule::unique("users", "email")],
            "password" => ['required', 'confirmed', 'min:6']
        ]);

        //hash password

        $formFields['password'] = bcrypt($formFields['password']);

        //create user
        $user = User::create($formFields);

        auth()->login($user);

        return redirect("/")->with("message", "User created and login");
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect("/")->with("message", "You have been logout");
    }
    //show login form
    public function login()
    {
        return view('users.login');
    }

    public function authenticate(Request $request)
    {

        $formFields = $request->validate([
            "email" => ['required', 'email'],
            "password" => ['required',]
        ]);

        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect("/")->with("message", "You are now log in");
        }

        return back()->withErrors(['email' => "Invalid credential"])->onlyInput("email");
    }
}
