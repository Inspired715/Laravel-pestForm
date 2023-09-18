@extends('auth._layout')


@section('title', 'Login')

@section('card-body')
    {{-- Card body --}}
    <div class="p-10">
        <div class="mb-8 text-center">
            <h1 class="font-normal text-brand-primary-400 text-xl">Welcome Back!</h1>
        </div>
        @livewire('auth.login-form')
    </div>
    {{-- Card footer --}}
    <div class="bg-brand-blue-50 border-t-2 border-brand-gray p-7 rounded-b text-brand-primary-300 text-center">
        <span>
            Don't have an account yet?
            <a class="font-bold text-brand-primary-400" href="{{ route('register') }}">
                Sign up
            </a>
        </span>
    </div>
@endsection
