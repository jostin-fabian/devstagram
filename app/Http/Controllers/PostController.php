<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function index(User $user)
    {
        $posts = Post::where('user_id', $user->id)->paginate(15);

        return view('dashboard', [
            'user' => $user, 'posts' => $posts
        ]);

    }

    //Show the form view
    public function create()
    {
        return view('posts.create');
    }

    //Adds the form data to the database
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'required',
        ]);

        $request->user()->posts()->create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $request->image,
            'user_id' => auth()->user()->id
        ]);
        return redirect()->route('posts.index', auth()->user()->username);
    }

    //display a specific publication
    public function show(User $user, Post $post)
    {
        return view('posts.show', [
            'post' => $post,
            'user' => $user
        ]);
    }

}
