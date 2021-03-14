@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card mb-3">
                    <div class="card-body" style="height: 275px">
                        <img src="{{ Storage::url($user->profile->profileImage()) }}" style="height: 100%; width: 100%; object-fit: cover;">
                    </div>
                </div>

                @if(auth()->id() != $user->id)
                    <div class="card mb-3">
                        <friend-button user-id="{{ $user->id }}" friends="{{ $friends }}"></friend-button>
                    </div>
                @endif

                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center" style="font-size: large">
                        <div>
                            <strong>Друзья</strong>
                            <span class="text-secondary" style="font-size: medium">{{ $user->friends->count() }}</span>
                        </div>
                        <a href="{{ route('friends') }}" class="btn p-0">
                            <img src="/storage/buttons/show-more.png" width="20">
                        </a>
                    </div>
                    <div class="card-body">
                        @if($user->friends->isEmpty())
                            <div style="font-size: medium">
                                У вас пока нет друзей.
                            </div>
                        @else
                            <div class="row">
                                @foreach($user->friends as $friend)
                                    <div class="px-2 py-1">
                                        <div class="rounded-circle">
                                            <a href="{{ route('profile', $friend->user_id) }}" class="rounded-circle">
                                                <img src="{{ Storage::url($friend->profileImage()) }}" class="rounded-circle border" width="65" height="65">
                                            </a>
                                        </div>
                                        <div class="text-center text-secondary pt-1" style="font-size: medium;">
                                            <a href="{{ route('profile', $friend->user_id) }}" class="text-decoration-none">
                                                {{ $friend->user->firstname }}
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-7 pl-0">
                <div class="card mb-3">
                    @component('components.profile-info', ['user' => $user])
                    @endcomponent
                </div>
                <div class="card">
                    <div class="card-header d-flex justify-content-between" style="font-size: large">
                        <div><strong>Стена</strong></div>

                        @if(auth()->user()->id == $user->id)
                            <div>
                                <a href="{{ route('posts.create') }}" class="btn p-0">
                                    <img src="{{ asset('storage/buttons/add.png') }}" width="20">
                                </a>
                            </div>
                        @endif

                    </div>
                    <div class="card-body py-0">
                        @component('components.post-list', ['posts' => $user->posts])
                        @endcomponent
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
