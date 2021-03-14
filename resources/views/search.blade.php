@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header" style="font-size: large;">
                        <strong>Результат поиска</strong>
                    </div>
                    <div class="card-body">
                        @component('components.search-result', ['users' => $users])
                        @endcomponent
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
