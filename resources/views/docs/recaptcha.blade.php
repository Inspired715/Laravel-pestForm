@extends('docs._layout')

@section('page')
      <!-- right content -->
      <div class="flex-1 w-full bg-white p-6 shadow rounded-2xl">
        <h1 class="font-bold text-2xl text-center md:text-left text-brand-primary-400 mb-6">
          reCAPTCHA
        </h1>
        <!-- one block -->
        <div class="mb-6">
          <div class="flex gap-2 my-2">
            <span class="font-semibold text-brand-primary-400">1. </span>
            <p class="text-brand-primary-300 text-sm">
              FieldGoal supports the ability to require Google reCAPTCHA v2 for form submissions, but please note that
              because FieldGoal does not generate your form HTML, you are responsible for adding the reCAPTCHA to your
              forms markup. Get started by
              <a href="http://www.google.com/recaptcha/admin" class="font-bold">signing up for an API key pair.</a>
            </p>
          </div>
        </div>
        <!-- two block -->
        <div class="mb-6">
          <div class="flex gap-2 my-2">
            <span class="font-semibold text-brand-primary-400">2. </span>
            <p class="text-brand-primary-300 text-sm">
              Navigate to FieldGoal's form settings page, and add the API secret key from Step 1.
            </p>
          </div>
          <div class="flex justify-center items-center m-8">
            <img class="shadow" src="../images/recaptcha.png" alt="free">
          </div>
        </div>
        <!-- three block -->
        <div class="mb-6">
          <div class="flex gap-2 my-2">
            <span class="font-semibold text-brand-primary-400">3. </span>
            <p class="text-brand-primary-300 text-sm">
              Select the "Require reCAPTCHA" checkbox if FieldGoal should require a reCAPTCHA v2 response before
              processing the form.
            </p>
          </div>
        </div>
        <!-- four block -->
        <div class="">
          <div class="flex gap-2 my-2">
            <span class="font-semibold text-brand-primary-400">4. </span>
            <p class="text-brand-primary-300 text-sm">
              Follow Google's <a href="http://www.google.com/recaptcha/display" class="font-bold">instructions</a> for
              adding the reCAPTCHA widget to your form.
            </p>
          </div>
        </div>
      </div>
   @endsection