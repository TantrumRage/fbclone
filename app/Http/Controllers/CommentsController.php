<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentsController extends Controller
{
    public function create(Request $request) {
    	$comment = new Comment;

    	$comment->post_id = $request->input('postKey');
    	$comment->user_id = auth()->user()->id;
    	$comment->body = $request->input('body');
    	$comment->save();
    }
}
