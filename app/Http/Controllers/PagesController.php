<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
class PagesController extends Controller
{
    public function index() {
    	return view('pages.index')->with('user', auth()->user());
    }

    public function profile($nickname) {

    	$profile = Profile::where('nickname', $nickname)->first();
        $user = $profile->user;
        $section = 'timeline';
    	if($user){
    		return view('pages.profile', compact('user', 'section'));
    	}else{
    		return view('pages.usernotfound', compact('nickname', 'section'));
    	}
    	
    }
}
