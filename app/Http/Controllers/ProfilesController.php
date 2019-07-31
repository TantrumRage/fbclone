<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;

class ProfilesController extends Controller
{
    public function getSection($nickname, $section) {
    	$profile = Profile::where('nickname', $nickname)->first();
        $user = $profile->user;
    	return view('pages.profile', compact('user', 'section'));
    }

    public function update(Request $request) {
        foreach ($request->input('data') as $data) {
            $profile = Profile::find(auth()->user()->id);
            $profile[$data['store']] = $data['body'];
            $profile->save();
        }
    }

    public function updateProfilePicture(Request $request) {
        // Process image upload 
            // get filename with extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            // get extension
            $extension = $request->file('image')->extension();

            // filename to store
            $filenameToStore = $filename . time() . '.' . $extension;

            // Upload image
            $path = $request->file('image')->storeAs('public/profile_pictures', $filenameToStore);


            // Save new profile picture
            $profile = Profile::where('user_id', auth()->user()->id)->first();
            $profile->profile_picture = $filenameToStore;
            $profile->save();
    }  
}
