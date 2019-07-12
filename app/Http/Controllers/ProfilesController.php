<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfilesController extends Controller
{
    public function about($username) {
    	$user = User::where('username', $username)->first();

    	return view('pages.profile.about')->with('user', $user);
    }
}
