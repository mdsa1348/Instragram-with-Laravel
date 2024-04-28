<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Make sure to import the User model

class UserController extends Controller
{
    // Method to display a user profile
    public function show(User $user)
    {
        return view('user.profile', ['user' => $user]);
    }

    // Method to update user information
    public function update(Request $request, User $user)
    {
        // Validate the request data

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            // Update other fields as needed
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    // Other user-related methods can be defined here
}
