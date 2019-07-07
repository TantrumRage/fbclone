<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class PostsController extends Controller
{
    public function save(Request $request) {
    	$post = new Post;
    	$post->user_id = auth()->user()->id;
    	$post->body = $request->input('body');
    	$post->save();
    }
}
