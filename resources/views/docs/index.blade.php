@extends('docs._layout')

@section('page')
<!-- right content -->
<div class="flex-1 w-full bg-white p-6 shadow rounded-2xl">
<h1 class="font-bold text-2xl text-center md:text-left text-brand-primary-400 mb-6">
  Create an Account
</h1>
<!-- one block -->
<div class="">
  <div class="flex gap-2 my-2">
    <span class="font-semibold text-brand-primary-400">1. </span>
    <p class="text-brand-primary-300 text-sm">
      Begin by clicking the "Start a Free Trial" button in the top right corner of the page.
    </p>
  </div>
  <div class="flex justify-center items-center m-8">
    <img class="" src="../images/free-trial-button.png" alt="free">
  </div>
</div>
<!-- two block -->
<div class="">
  <div class="flex gap-2 my-2">
    <span class="font-semibold text-brand-primary-400">2. </span>
    <p class="text-brand-primary-300 text-sm">
      The "Start a Free Trial" button will direct you to the registration form. You will need a valid email and
      password to register for a new account.
    </p>
  </div>
  <div class="flex justify-center items-center m-8">
    <img class="" src="../images/register-form.png" alt="free">
  </div>
</div>
<!-- three block -->
<div class="">
  <div class="flex gap-2 my-2">
    <span class="font-semibold text-brand-primary-400">3. </span>
    <p class="text-brand-primary-300 text-sm">
      Check the email you provided for registration, you should receive a message from FieldGoal with a link to
      verify your email.
    </p>
  </div>
  <div class="flex justify-center items-center m-8">
    <img class="" src="../images/verify-email.png" alt="free">
  </div>
</div>
<!-- four block -->
<div class="">
  <div class="flex gap-2 my-2">
    <span class="font-semibold text-brand-primary-400">4. </span>
    <p class="text-brand-primary-300 text-sm">
      Once your email is verified you are ready to create a new form!
    </p>
  </div>
</div>
</div>
@endsection