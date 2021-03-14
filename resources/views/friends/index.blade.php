@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header" style="font-size: large;">
                        <strong>Друзья</strong>
                    </div>
                    <div class="card-body">
                        @component('components.friend-list', ['friends' => $friends])
                        @endcomponent
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
