<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'content' => 'required',
        ]);

        $comment = new Comment;
        $comment->content = $validatedData['content'];
        $comment->user_id = Auth::id();
        $comment->post_id = $post->id;
        $comment->save();

        return redirect()->back()->with('success', 'Comment added successfully!');
    }
}
