<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('frontend.profile');
    }


    public function update(Request $request)
    {
        $user = Auth::user();
        $data = $request->all();
        $userDt = [];
        // User Data
        isset($data['name']) ?? $userDt['name'] = $data['name'];
        isset($data['email']) ?? $userDt['email'] = $data['email'];
        unset($data['name']);
        unset($data['email']);

        // Profile Image
        if( $request->hasFile( 'profile_photo' ) ) {
            // Firstly we deleting old one 
            if(isset($user->profile->profile_photo) && $user->profile->profile_photo != 'default_profile.png')
            {
                Storage::delete('public/users/profiles/' . $user->profile->profile_photo);
            }
            $destinationPath = storage_path('app/public/users/profiles');
            $file = $request->file('profile_photo');
            $originalFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $fileName = $originalFilename. '-' . time() . '.' . $file->getClientOriginalExtension();
            $file->move($destinationPath, $fileName);
            $data['profile_photo'] = $fileName; 
        }

        // Profile Data
        $data['profile_emailme'] = isset($data['profile_emailme']) ? 1 : 0; 
        $data['profile_newsletter'] = isset($data['profile_newsletter']) ? 1 : 0; 


        // change password
        if(isset($data['current_password'])){
            // validate first the old password is correct
            if (!Hash::check($request->get('current_password'), $user->password)) 
            {
                return back()->with('error', "Current Password is Invalid");
            }
            // validate the new password with repeated password input 
            if (strcmp($request->get('current_password'), $data['new_password']) == 0) 
            {
                return redirect()->back()->with("error", "New Password cannot be same as your current password.");
            }
            // validate the new password with repeated password input 
            if (strcmp($request->get('new_password'), $data['new_password_confirmation']) != 0) 
            {
                return redirect()->back()->with("error", "New Password doesnt confirmed.");
            }
            // update data.
            $userDt['password'] = Hash::make($data['new_password']);
        }

        $user->profile->update($data); 
        $user->update($userDt);
        return redirect()->route('profile.edit')->with('message', __('Updated Successfully'));
    }

    public function edit()
    {
        return view('frontend.edit_profile');
    }

    public function changePassword()
    {
        return view('frontend.change_password');
    }
}
