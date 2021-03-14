<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function show(User $user) {
        $friends = (auth()->user()) ? auth()->user()->friends->contains($user->id) : false;

        return view('profiles.index', [
            'user' => $user,
            'friends' => $friends,
        ]);
    }

    public function edit(User $user) {
        $this->authorize('update', $user->profile);

        return view('profiles.edit', [
            'user' => $user,
        ]);
    }

    public function update(User $user){
        $this->authorize('update', $user->profile);
        $user_data = \request()->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'birthday' => 'required',
        ]);

        $profile_data = \request()->validate([
            'city' => '',
            'education' => '',
            'personal_information' => '',
            'image' => ['', 'image'],
        ]);

        if (\request('image')) {
            $imagePath = \request('image')->store('profile', 'public');
            $imageArray = ['image' => $imagePath];
        }

        auth()->user()->update($user_data);
        auth()->user()->profile->update(array_merge(
            $profile_data,
            $imageArray ?? []
        ));

        return redirect()->route('profile', $user);
    }
}
