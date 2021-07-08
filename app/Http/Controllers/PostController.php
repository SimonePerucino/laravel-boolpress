<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        // va a prendere tutti i dati 
        $data = [
            "posts" => Post::all()
        ];
        return view("gust.posts.index", $data);
    }
}
