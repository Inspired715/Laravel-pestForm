@extends('docs._layout')

@section('page')

      <!-- right content -->
      <div class="flex-1 w-full bg-white p-6 shadow rounded-2xl">
        <h1 class="font-bold text-2xl text-center md:text-left text-brand-primary-400 mb-6">
          Create a New Form
        </h1>
        <p class="text-2xl text-brand-primary-300 mt-10 mb-5">Form Details</p>
        <!-- one block -->
        <div class="">
          <div class="flex justify-center items-center m-8">
            <img class="" src="../images/form-details.png" alt="free">
          </div>
          <div class="flex gap-2 my-2">
            <span class="font-semibold text-brand-primary-400">1. </span>
            <p class="text-brand-primary-300 text-sm">
              The only requirement for a form endpoint is the name field. With a name, you can view form submissions
              through the "Inbox" tab on the forms page. Be sure to name it something memorable so you can distinguish
              it from other forms.
            </p>
          </div>
        </div>
        <!-- two block -->
        <div class="">
          <div class="flex gap-2 my-2">
            <span class="font-semibold text-brand-primary-400">2. </span>
            <p class="text-brand-primary-300 text-sm">
              If you would like the form responses automatically sent to your inbox, add your email address to the
              "Forward to" field. If you would like to send form responses to multiple emails, simply add each email
              address to a new line of the field.
            </p>
          </div>
          <div class="flex justify-center items-center m-8">
            <img class="" src="../images/forward-to-filled.png" alt="free">
          </div>
        </div>
        <!-- three block -->
        <div class="">
          <div class="flex gap-2 my-2">
            <span class="font-semibold text-brand-primary-400">3. </span>
            <p class="text-brand-primary-300 text-sm">
              The "Thank you page URL" field allows you to set the custom URL of your form's thank you page. If you do
              not have a thank you page, your users will be redirected to FieldGoal's default thank you page.
            </p>
          </div>
          <div class="flex justify-center items-center m-8">
            <img class="" src="../images/thank-you-page.png" alt="free">
          </div>
        </div>
      </div>
    @endsection