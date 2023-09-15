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
}
