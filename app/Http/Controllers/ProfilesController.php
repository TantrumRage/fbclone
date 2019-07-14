<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;

class ProfilesController extends Controller
{
    public function getSection($username, $section) {
    	$user = User::where('username', $username)->first();

    	return view('pages.profile', compact('user', 'section'));
    }

    public function update(Request $request) {
        foreach ($request->input('data') as $data) {
            $profile = Profile::find(auth()->user()->id);
            $profile[$data['store']] = $data['body'];
            $profile->save();
        }
    }
}
