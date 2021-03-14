<?php $post = $post ?? null; ?>

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header text-capitalize">
                        <strong style="font-size: large">{{ $post ? 'редактировать запись' : 'добавить запись' }}</strong>
                    </div>
                    <div class="card-body">
                        <form enctype="multipart/form-data" method="post" action="{{ $post ? route('posts.update', $post) : route('posts.store') }}">
                            @csrf

                            @if($post)
                                @method('put')
                            @endif

                            <div class="form-group">
                                <textarea id="description" type="text" placeholder="@error('description') {{ $message }} @enderror" class="form-control @error('description') is-invalid @enderror" name="description" rows="10">{{ old('description', $post->description ?? null) }}</textarea>
                            </div>

                            <div class="form-group d-flex justify-content-between">
                                <div>
                                    <label for="image">
                                        <h5>Фотография</h5>
                                    </label>
                                    <input type="file" class="form-control-file" id="image" name="image">

                                    @error('image')
                                    <strong>{{ $message }}</strong>
                                    @enderror
                                </div>

                                <div class="pt-4">
                                    <button class="btn btn-primary text-capitalize">{{ $post ? 'сохранить' : 'опубликовать' }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
