@extends('layouts.app')

@section('content')
<div class="container m-auto">
    <div class="flex justify-center">
        <div class="w-8/12 shadow-md bg-white">
            <div class="sm:p-12 text-center">
                <div class="p-4 text-xl sm:text-2xl font-bold">{{ __('Reset Password') }}</div>
password reset view
                <div class="p-4">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="flex flex-col sm:flex-row mb-4">
                            <label for="email" class="p-4 text-xl sm:text-2xl font-bold">{{ __('E-Mail Address') }}</label>

                            <div class="sm:w-8/12 text-md">
                                <input id="email" type="email" class="bg-blue-100 w-full p-1 sm:p-3 @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="flex flex-col sm:flex-row mb-4">
                            <label for="password" class="p-4 text-xl sm:text-2xl font-bold">{{ __('Password') }}</label>

                            <div class="sm:w-8/12 text-md">
                                <input id="password" type="password" class="bg-blue-100 w-full p-1 sm:p-3 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
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
