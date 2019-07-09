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

    public function edit(Request $request) {
    	return Post::find($request->input('id'));
    }

    public function update(Request $request) {
    	$post = Post::find($request->input('id'));
    	$post->body = $request->input('body');
    	$post->save();
    }

    public function delete(Request $request) {
        $post = Post::find($request->input('id'));
        $post->delete();
    }
}
