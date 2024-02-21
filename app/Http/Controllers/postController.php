<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class postController extends Controller
{
    public function createPost(Request $request){
        $incomingRequest = $request->validate([
            "title"=> "required",
            "body" => "required",
        ]);
        $incomingRequest['title'] = strip_tags($incomingRequest['title']);
        $incomingRequest['body'] = strip_tags($incomingRequest['body']);
        $incomingRequest['user_id'] = auth()->id();
        Post::create($incomingRequest);
        return redirect('/');
    }
}
