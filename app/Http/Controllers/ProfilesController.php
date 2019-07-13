<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfilesController extends Controller
{
    public function getSection($username, $section) {
    	$user = User::where('username', $username)->first();

    	return view('pages.profile', compact('user', 'section'));
    }
}
