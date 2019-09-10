<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\User;
use App\Conversation;
class MessagesController extends Controller
{
	/***
    public function getSelected(Request $request) {
    	$contact = Profile::where('nickname', $request->input('contact'))->first();
    	$contact = User::find($contact->user_id);
    	$contactData = [
    		'name' => $contact->fname . ' ' . $contact->lname,
    		'picture' => $contact->profile->profile_picture,
    	];
    	$conversation = Conversation::where([
    		['user_id', '=', auth()->user()->id],
    		['contact_id', '=', $contact->id]
    	])->first();

    	return [
    		'contact' => $contactData,
    		'messages' => $conversation->messages,
    	];
    }
    ***/

    public function getSelected($username) {
    	$contact = Profile::where('nickname', $username)->first();
    	$contact = User::find($contact->user_id);

    	$conversation = Conversation::where([
    		['user_id', '=', auth()->user()->id],
    		['contact_id', '=', $contact->id]
    	])->first();

    	return view('templates/messages_right', compact('contact', 'conversation'));
    }
}
