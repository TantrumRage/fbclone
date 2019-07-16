<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;

class LikesController extends Controller
{
    public function like($postId) {
    	$like  = Like::firstOrCreate(['post_id' => $postId, 'user_id' => auth()->user()->id]);
    }
}

