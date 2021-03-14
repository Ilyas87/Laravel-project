<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    public function __construct() {
        $this->middleware('auth')
            ->except('show');
    }

    public function create() {
        return view('posts.form');
    }

    public function edit(Post $post) {
        $this->authorize('update', $post);
        return view('posts.form', [
            'post' => $post,
        ]);
    }

    public function store() {
        $data = request()->validate([
            'description' => 'required',
            'image' => ['required', 'image'],
        ]);

        $imagePath = request('image')->store('images', 'public');

        $post = auth()->user()->posts()->create([
            'description' => $data['description'],
            'image' => $imagePath,
        ]);

        return redirect()->route('profile', $post->user_id);
    }

    function update(PostRequest $request, Post $post) {
        $this->authorize('update', $post);

        $post->update($request->validatedWithImage());

        return redirect()->route('posts.show', $post);
    }

    public function show(Post $post) {
        return view('posts.show', [
            'post' => $post,
        ]);
    }

    function destroy(Post $post) {
        $this->authorize('delete', $post);

        $post->deleteImage();
        $post->delete();
        return redirect()->route('profile', $post->user_id);
    }
}
