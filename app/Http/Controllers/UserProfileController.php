<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Policies\ProfilePolicy;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\userProfile;
use App\Models\Product;
use Illuminate\Routing\Controller;
use Intervention\Image\Facades\Image;


class UserProfileController extends Controller
{
    use AuthorizesRequests;


    public function index($user)
    {
        $user = User::find($user); // Replace $userId with the actual user ID
        /*  $user = User::findOrFail($user); */
        /*return view('Home',[
            'user'=> $user ,
        ]); */
        return view("userProfile.Home", compact('user'));
    }
    public function show(userProfile $userProfile)
    {
        /*   $this->authorize('view', $userProfile); */

        return view('posts.show', compact('post'));
    }

    public function edit(User $user)
    {
        /*  $this->authorize('update', $user->userProfile); */
        $this->authorize('update', $user->profile);

        return view('userProfile.edit', compact('user'));
    }



    // If the user is authorized, continue with the update logic.


    public function update(User $user)
    {
        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => '',
        ]);

        if (request('image')) {
            $imagePath = request('image')->store('profile', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();

            $imageArray = ['image' => $imagePath];
        }

        auth()->user()->profile->update(
            array_merge(
                $data,
                $imageArray ?? []
            )
        );

        return redirect("/profile/{$user->id}");
    }

}

/* public function authorize(User $user){
    return auth()->user()->can("edit", $user);
} */



