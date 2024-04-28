<?php


namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function create()
    {
        // echo"creating...";
        return view('posts.create');
    }

    public function store(Request $request)
    {
        echo"printing";
        $data = $request->validate([
            'caption' => 'required',
            'image' => 'required|image',
        ]);

        $imagePath = $request->file('image')->store('uploads', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();

        $user = Auth::user();
        echo "User ID: " . $user->id . "\n";

        if (!$user) {
            throw ValidationException::withMessages([
                'user' => 'User not authenticated',
            ]);
        }
        // Print the authenticated user's ID
        $post = new Post([
            'user_id' => $user->id, // Assign the user_id directly
            'caption' => $data['caption'],
            'image' => $imagePath,
        ]);
        
        $post->save();
        

        return redirect('/profile/'.$user->id);
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        // Your edit logic here
    }
}
