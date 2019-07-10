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

    	if($user){
    		return view('pages.profile')->with('user', $user);
    	}else{
    		return view('pages.usernotfound')->with('username', $username);
    	}
    	
    }
}
