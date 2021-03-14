<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class FriendsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $users = auth()
            ->user()
            ->friends()
            ->pluck('profiles.user_id');

        $friends = Profile::whereIn('user_id', $users)
            ->with('user')
            ->latest()
            ->SimplePaginate(6);

        return view('friends.index', [
            'friends' => $friends,
        ]);
    }

    public function store(User $user) {
        return auth()
            ->user()
            ->friends()
            ->toggle($user->profile);
    }
}
