@extends('layouts.app')
@section('title') {{ 'Техтрос - Настройки аккаунта' }} @endsection
@section('content')
    <div class="py-12 mx-auto">
        <div class="w-[1000px] mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow-xl border-t-4 border-orange-500 sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>
        </div>
        <div class="w-[1000px] mt-4 mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow-xl border-t-4 border-orange-500 sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
        </div>
    </div>
@endsection
