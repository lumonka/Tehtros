@extends('layouts.app')
@section('title') {{ 'Техтрос - Смена аватара' }} @endsection
@section('content')
    <div class="container mx-auto">
        <div class="flex justify-center ">
            <div class="col-md-8">
                <div class="card bg-gray-100 p-5">
                    <div class="card-header font-medium text-2xl text-center">{{ __('Сменить аватар') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('profile.store') }}" enctype="multipart/form-data">
                            @csrf
                            @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <div class="row mb-3">
                                <label for="avatar" class="col-md-4 col-form-label text-md-end">{{ __('Avatar') }}</label>

                                <div class="col-md-6">
                                    <input id="avatar" type="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 @error('avatar') is-invalid @enderror" name="avatar" value="{{ old('avatar') }}" required autocomplete="avatar">
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Upload file</label>
                                    <img src="/avatars/{{ Auth::user()->avatar }}" style="width:80px;margin-top: 10px;">
{{--                                    aria-describedby="user_avatar_help" id="user_avatar" type="file"--}}
                                    @error('avatar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Upload Profile') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
