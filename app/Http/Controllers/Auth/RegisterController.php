<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    //METHOD GET
    public function index()
    {
        return view('auth.register');
    }

    //METHOD POST
    public function store(Request $request)
    {
        //Validations
        $this->validate($request, [
            'name' => 'required|max:30',
            'username' => 'required|unique:users|min:3|max:20',
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required|confirmed|min:6',
        ]);
        //If the data is validated, it will be added to the "Insta" database in the users table.
        User::create([
            'name' => $request->name,
            'username' => Str::slug($request->username),
            'email' => $request->email,
            'password' => Hash::make($request->password),

        ]);
        //Authentication
        auth()->attempt([
            'email' => $request->email,
            'password' => $request->password,

        ]);
        //Other Authentication
        /*
        auth()->attempt($request->only('email','password'));
        */
        //Redirections
        return redirect()->route('posts.index', auth()->user());
    }
}
