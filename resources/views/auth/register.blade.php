@extends('auth._layout')


@section('title', 'Login')

@section('card-body')


<div class="p-10">
  <div class="mb-8 text-center">
    <h1 class="font-normal text-brand-primary-400 text-xl">Start Your 5-Day Free Trial</h1>
  </div>

  @livewire('auth.register-form')
</div>
<!-- card footer -->
<div class="bg-brand-blue-50 border-t-2 border-brand-gray p-7 rounded-b text-brand-primary-300 text-center">
  <span>
    Already have an account?
    <a class="font-bold text-brand-primary-400" href="{{ route('login') }}">Sign in</a>
  </span>
</div>
@endsection