<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class PagesController extends Controller
{
    public function index() {
    	return view('pages.index');
    }

    public function profile($username) {

    	$user = User::where('username', $username)->first();
        $section = 'timeline';
    	if($user){
    		return view('pages.profile', compact('user', 'section'));
    	}else{
    		return view('pages.usernotfound', compact('username', 'section'));
    	}
    	
    }
}
