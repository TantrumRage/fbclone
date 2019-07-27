<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\PostImage;

class PostsController extends Controller
{
    public function save(Request $request) {
        // Process image upload 

        // get filename with extension
        $filenameWithExt = $request->file('postImage')->getClientOriginalName();

        //get filename without extension
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

        // get extension
        $extension = $request->file('postImage')->extension();

        // filename to store
        $filenameToStore = $filename . time() . '.' . $extension;

        // Upload image
        $path = $request->file('postImage')->storeAs('public/post_images', $filenameToStore);

        // Save to database
        if ($path) {
            $post = new Post;
            $post->user_id = auth()->user()->id;
            $post->body = $request->input('body');
            $post->save();

            $postImage = new PostImage;
            $postImage->post_id = $post->id;
            $postImage->user_id = auth()->user()->id;
            $postImage->image = $filenameToStore;
            $postImage->save();
        }
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
