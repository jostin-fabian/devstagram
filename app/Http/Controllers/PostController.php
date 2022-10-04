<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    public function __construct()
    {
        //restrict permissions for view controllers
        $this->middleware('auth')->except(['show', 'index']);
    }

    //
    public function index(User $user)
    {
        $posts = Post::where('user_id', $user->id)->latest()->paginate(15);

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

// delete a specific publication
    public function destroy(Post $post)
    {
        //Refers to the delete method of the `postPolicy` class.
        $this->authorize('delete', $post);
        $post->delete();

        // remove the image from the publication
        $image_path = public_path('uploads/' . $post->image);

        if (File::exists($image_path)) {
            unlink($image_path);
        }

        return redirect()->route('posts.index', auth()->user()->username);
    }

}
