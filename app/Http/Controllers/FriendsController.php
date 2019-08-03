<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FriendRequest;
use App\Profile;
use App\Friend;
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

    public function accept(Request $request, $user) {
    	if($user === $request->input('username')) {
    		$friendId = Profile::where('nickname', $user)->first();
    		$friendId = $friendId->user_id;

    		// Save friend data for current user
    		$friend = new Friend;
    		$friend->user_id = auth()->user()->id;
    		$friend->friend_id = $friendId;
    		$friend->save();

    		// Save friend data for other user
    		$friend = new Friend;
    		$friend->user_id = $friendId;
    		$friend->friend_id = auth()->user()->id;
    		$friend->save();

    		// Delete friend request
    		$friendRequest = FriendRequest::where([
    			['sender', '=', $friendId],
    			['receiver', '=', auth()->user()->id],
    		])->delete();

    		return 1;
    	}else {
    		return 0;
    	}
    }

    public function cancel(Request $request, $user) {
    	if($user === $request->input('username')) {
    		$receiver = Profile::where('nickname', $user)->first();
    		$receiver = $receiver->user_id;
    		
    		$friends = FriendRequest::where([
    			['sender', '=', auth()->user()->id],
    			['receiver', '=', $receiver]
    		])->delete();

    		return 1;
    	}else {
    		return 0;
    	}
    }
}
