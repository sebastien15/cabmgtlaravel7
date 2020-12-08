@extends('layouts.app')

@section('content')
<div class="container m-auto">
    <div class="flex justify-center">
        <div class="w-8/12 shadow-md bg-white">
            <div class="sm:p-12 text-center">
                <div class="p-4 text-xl sm:text-2xl font-bold ">{{ __('Login') }}</div>
                <div class="p-4">
                    <form method="POST" action="/login">
                        @csrf
                        <div class="flex flex-col sm:flex-row mb-4">
                            <label for="email" class="sm:w-4/12 text-md text-left">{{ __('E-Mail') }}</label>

                            <div class="sm:w-8/12 text-md">
                                <input id="email" type="email" class="bg-blue-100 w-full p-1 sm:p-3 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="bg-red-400 text-white" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="flex flex-col sm:flex-row mb-3">
                            <label for="password" class="sm:w-4/12 text-sm text-md text-left">{{ __('Password') }}</label>

                            <div class="sm:w-8/12 text-md">
                                <input id="password" type="password" class="bg-blue-100 w-full p-1 sm:p-3 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="bg-red-400 text-whitek" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="flex justify-between sm:justify-end">
                                <div class="p-2">
                                    <input class="text-blue-500 text-md" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="text-blue-500 text-md" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                        </div>

                        <div class="flex justify-end flex-col sm:flex-row">
                                <button type="submit" class="bg-blue-400  text-sm sm:text-md text-white p-2 mb-3 sm:mb-0 sm:mr-4">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="bg-blue-400  text-sm sm:text-md text-white p-2" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
