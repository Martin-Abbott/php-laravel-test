<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function submitPost(Request $request) {
        $postData = $request->validate([
            "title" => "required",
            "body" => "required"
        ]);

        $postData["title"] = strip_tags($postData["title"]);
        $postData["body"] = strip_tags($postData["body"]);
        $postData["user_id"] = auth()->id();

        Post::create($postData);

        return redirect("/");
    }

    public function postEditor(Post $post) {
        if (auth()->user()->id !== $post["user_id"]) {
            return redirect("/");
        }
        return view("post-editor", ["post" => $post]);
    }

    public function updatePost(Post $post, Request $request) {
        if (auth()->user()->id === $post["user_id"]) {
            $postData = $request->validate([
                "title" => "required",
                "body" => "required"
            ]);
    
            $postData["title"] = strip_tags($postData["title"]);
            $postData["body"] = strip_tags($postData["body"]);
    
            $post->update($postData);
        }

        return redirect("/");
    }

    public function deletePost(Post $post) {
        if (auth()->user()->id === $post["user_id"]) {
            $post->delete();
        }
        
        return redirect("/");
    }
}
