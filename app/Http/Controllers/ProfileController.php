<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        // User Data
        $userDt['name'] = $data['name'];
        $userDt['email'] = $data['email'];
        unset($data['name']);
        unset($data['email']);

        // Profile Image
        if( $request->hasFile( 'profile_photo' ) ) {
            // Firstly we deleting old one 
            if(isset($user->profile->profile_photo))
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

        $user->profile->update($data); 
        $user->update($userDt);
        return redirect()->back()->with('message', __('Updated Successfully'));
    }

    public function edit()
    {
        return view('frontend.edit_profile');
    }
}
