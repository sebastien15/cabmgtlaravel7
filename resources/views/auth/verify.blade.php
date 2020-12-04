@extends('layouts.app')

@section('content')
<div class="container m-auto">
    <div class="flex justify-center">
        <div class="w-8/12 shadow-md bg-white">
            <div class="sm:p-12 text-center">
                <div class="p-4 text-xl sm:text-2xl font-bold">{{ __('Verify Your Email Address') }}</div>

                <div class="p-4">
                    @if (session('resent'))
                        <div class="bg-green-500 text-white" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
