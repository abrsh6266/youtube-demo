<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class postController extends Controller
{
    public function createPost(Request $request)
    {
        $incomingRequest = $request->validate([
            "title" => "required",
            "body" => "required",
        ]);
        $incomingRequest['title'] = strip_tags($incomingRequest['title']);
        $incomingRequest['body'] = strip_tags($incomingRequest['body']);
        $incomingRequest['user_id'] = auth()->id();
        Post::create($incomingRequest);
        return redirect('/');
    }
    public function ShowEditScreen(Post $post)
    {
        if (auth()->user()->id !== $post['user_id']) {
            return redirect('/');
        }
        return view('edit-post', ['post' => $post]);
    }
    public function actuallyUpdatePost(Post $post, Request $request)
    {
        if (auth()->user()->id !== $post['user_id']) {
            return redirect('/');
        }
        $incomingRequest = $request->validate([
            "title" => "required",
            "body" => "required",
        ]);
        $incomingRequest['title'] = strip_tags($incomingRequest['title']);
        $incomingRequest['body'] = strip_tags($incomingRequest['body']);

        $post->update($incomingRequest);
        return redirect('/');
    }
    public function deletePost(Post $post)
    {
        if (auth()->user()->id === $post['user_id']) {
            $post->delete();
        }
        return redirect('/');

    }
}
