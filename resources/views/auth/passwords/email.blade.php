@extends('layouts.app')

@section('content')
<div class="container m-auto">
    <div class="flex justify-center">
        <div class="w-8/12 shadow-md bg-white">
            <div class="sm:p-12 text-center">
                <div class="p-4 text-xl sm:text-xl font-bold">{{ __('Reset Password') }}</div>

                <div class="p-4">
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="flex flex-col sm:flex-row mb-4">
                            <label for="email" class="p-4 text-sm sm:text-2xl font-bold">{{ __('E-Mail Address') }}</label>

                            <div class="sm:w-8/12 text-md">
                                <input id="email" type="email" class="bg-blue-100 w-full p-1 sm:p-3" required autocomplete="email" autofocus>
                            </div>
                        </div>
                        <div class="sm:w-8/12 text-md text-right">
                            <div class="text-center">
                                <button type="submit" class="bg-blue-200 p-2 text-white">
                                    {{ __('Send Password Reset Link') }}
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
