@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header text-capitalize">
                        <strong style="font-size: large">редактировать профиль</strong>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('profile', $user->id) }}" enctype="multipart/form-data" method="post">
                            @csrf
                            @method('put')

                            <div class="form-group row">
                                <label for="firstname" class="col-md-4 col-form-label text-md-right">Имя</label>

                                <div class="col-md-8">
                                    <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') ?? $user->firstname }}" required autocomplete="firstname" autofocus>

                                    @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="lastname" class="col-md-4 col-form-label text-md-right">Фамилия</label>

                                <div class="col-md-8">
                                    <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') ?? $user->lastname }}" required autocomplete="lastname" autofocus>

                                    @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="birthday" class="col-md-4 col-form-label text-md-right">Дата рождения</label>

                                <div class="col-md-8">
                                    <input id="birthday" type="date" class="form-control @error('birthday') is-invalid @enderror" name="birthday" value="{{ old('birthday') ?? $user->birthday }}" required autocomplete="birthday" autofocus>

                                    @error('birthday')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="city" class="col-md-4 col-form-label text-md-right">Город</label>

                                <div class="col-md-8">
                                    <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') ?? $user->profile->city}}" autocomplete="city">

                                    @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="education" class="col-md-4 col-form-label text-md-right">Образование</label>

                                <div class="col-md-8">
                                    <input id="education" type="text" class="form-control @error('education') is-invalid @enderror" name="education" value="{{ old('education') ?? $user->profile->education }}" autocomplete="education">

                                    @error('education')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="personal_information" class="col-md-4 col-form-label text-md-right">Личная информация</label>

                                <div class="col-md-8">
                                    <input id="personal_information" type="text" class="form-control @error('personal_information') is-invalid @enderror" name="personal_information" value="{{ old('personal_information') ?? $user->profile->personal_information }}" autocomplete="personal_information">

                                    @error('personal_information')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row align-items-center">
                                <label for="image" class="col-md-4 col-form-label text-md-right">Фотография</label>

                                <div class="col-md-8">
                                    <input id="image" type="file" class="form-control-file @error('image') is-invalid @enderror" name="image" value="{{ old('image') ?? $user->profile->image }}">

                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary text-capitalize">сохранить</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
