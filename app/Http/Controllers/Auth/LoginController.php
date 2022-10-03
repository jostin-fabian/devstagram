<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    // METHOD GET
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        //Validations
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (!auth()->attempt($request->only('email', 'password'), $request->remember)) {
            //Returns to the previous page displaying the following message "'Incorrect credentials'"
            return back()->with('message', 'Incorrect credentials');
        }

        return redirect()->route('posts.index', auth()->user()->username);
    }
}
