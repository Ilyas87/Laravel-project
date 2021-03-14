@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header" style="font-size: large">
                <strong>Запись №{{ $post->id }}</strong>
            </div>
            <div class="card-body">
                <div class="d-flex">
                    <div class="col-md-8">
                        <img src="{{ Storage::url($post->image) }}" width="100%" style="max-height: 682px">
                    </div>
                    <div class="col-md-4">
                        <div class="d-flex align-items-center pb-2">
                            <img src="{{ Storage::url($post->user->profile->profileImage()) }}" class="rounded-circle border" width="60" height="60">
                            <div class="pl-3" style="font-size: medium">
                                <div>
                                    <a href="/profile/{{ $post->user->id }}" class="font-weight-bold text-primary text-decoration-none">{{ $post->user->firstname }} {{ $post->user->lastname }}</a>
                                </div>
                                <div>
                                    <span class="text-secondary">{{ $post->created_at }}</span>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="py-2">{{ $post->description }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
