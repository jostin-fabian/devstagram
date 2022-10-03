<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function store(Request $request, User $user, Post $post)
    {
        //Validate
        $this->validate($request, [
            'comment' => 'required|max:255'
        ]);

        // store the result
        Comment::create([
            'user_id' => auth()->user()->id,
            'post_id' => $post->id,
            'comment' => $request->comment
        ]);

        // Print a message
        return back()->with('message', 'Comment Correctly Made');
    }
}
