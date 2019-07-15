<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;

class LikesController extends Controller
{
    public function like($postId) {
    	$like = new Like;

    	$like->post_id = $postId;
    	$like->user_id = auth()->user()->id;
    	$like->save();
    }
}
