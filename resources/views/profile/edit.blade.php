@extends('layouts.master')
@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">{{ __('Profile') }}</h2>
@stop
@section('content')
    <div class="container mx-auto text-white">
        <div class="flex items-center">
            <div class="min-w-xl">
                <div class="p-4 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    @include('profile.partials.update-profile-information-form')
                </div>
                <br>
                <div class="p-4 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    @include('profile.partials.update-password-form')
                </div>
                <br>
                <div class="p-4 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
@stop
