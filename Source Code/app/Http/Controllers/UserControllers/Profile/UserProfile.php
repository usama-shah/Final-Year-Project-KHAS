<?php

namespace App\Http\Controllers\UserControllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserProfile extends Controller
{
    public function showProfile($id)
    {

        $user = User::find($id);
        return view('UserViews.Profile.profile', compact('user'));
    }
}
