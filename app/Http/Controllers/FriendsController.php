<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FriendRequest;
use App\Profile;
class FriendsController extends Controller
{
    public function add(Request $request, $user) {
    	if($user === $request->input('username')) {
    		$receiver = Profile::where('nickname', $user)->first();
    		$receiver = $receiver->user_id;
    		$friendRequest = new FriendRequest;
    		$friendRequest->sender = auth()->user()->id;
    		$friendRequest->receiver = $receiver;
    		$friendRequest->save();

    		return 1;
    	}else {
    		return 0;
    	}
    }
}
