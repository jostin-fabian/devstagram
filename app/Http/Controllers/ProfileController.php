<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('profile.index');
    }

    public function store(Request $request)
    {
        // modify the request object
        $request->request->add(['username' => Str::slug($request->username)]);


        $this->validate($request, [
            'username' => ['required', 'unique:users,username,' . auth()->user()->id, 'min:3', 'max:20', 'not_in:twitter,edit-profile'],//not able to change the name to twitter or edit-profile
        ]);

        if ($request->image) {
            $image = $request->file('image');

            $imageName = Str::uuid() . "." . $image->extension();

            $serverImage = Image::make($image);
            $serverImage->fit(1000, 1000);

            $imagePath = public_path('profiles') . '/' . $imageName;
            $serverImage->save($imagePath);
        }

        // save request to database
        $user = User::find(auth()->user()->id);
        $user->username = $request->username;
        $user->image = $imageName ?? auth()->user()->image ?? null;
        $user->save();

        //change password to current user


        // redirect to profile
        return redirect()->route('posts.index', $user->username);

    }
}
