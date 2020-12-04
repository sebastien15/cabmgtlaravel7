@extends('layouts.app')

@section('content')
<div class="container  m-auto">
    <div class="flex justify-center">
        <div class="w-8/12 shadow-md bg-white">
            <div class="sm:p-12 text-center">
                <div class="p-4 text-xl sm:text-2xl font-bold ">{{ __('Register') }}</div>

                <div class="p-3">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="flex flex-col sm:flex-row mb-4">
                            <label for="name" class="sm:w-4/12 text-md text-left">{{ __('Name') }}</label>

                            <div class="sm:w-8/12 text-md">
                                <input id="name" type="text" class="bg-blue-100 w-full p-1 sm:p-3 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="bg-red-400 text-white" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="flex flex-col sm:flex-row mb-4">
                            <label for="email" class="sm:w-4/12 text-md text-left">{{ __('E-Mail Address') }}</label>

                            <div class="sm:w-8/12 text-md">
                                <input id="email" type="email" class="bg-blue-100 w-full p-1 sm:p-3 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="bg-red-400 text-white" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="flex flex-col sm:flex-row mb-4">
                            <label for="password" class="sm:w-4/12 text-md text-left">{{ __('Password') }}</label>

                            <div class="sm:w-8/12 text-md">
                                <input id="password" type="password" class="bg-blue-100 w-full p-1 sm:p-3 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="bg-red-400 text-white" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="flex flex-col sm:flex-row mb-4">
                            <label for="password-confirm" class="sm:w-4/12 text-md text-left">{{ __('Confirm Password') }}</label>

                            <div class="sm:w-8/12 text-md">
                                <input id="password-confirm" type="password" class="bg-blue-100 w-full p-1 sm:p-3" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="flex flex-col sm:flex-row mb-0 justify-end">
                            <button type="submit" class="p-2 px-10 bg-blue-400 text-white text-lg">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
