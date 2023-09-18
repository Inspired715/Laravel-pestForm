@extends('docs._layout')

@section('page')
      <!-- right content -->
      <div class="flex-1 w-full bg-white p-6 shadow rounded-2xl">
        <h1 class="font-bold text-2xl text-center md:text-left text-brand-primary-400 mb-6">
          FAQs
        </h1>
        <!-- one block -->
        <div class="my-6">
          <h2 class="font-semibold text-brand-primary-400 mb-2">
            Where are my form submissions?
          </h2>
          <p class="text-brand-primary-300 text-sm">
            You can always view form submissions in the form's inbox. Visit the <a href="../account/index.html"
              class="font-bold hover:underline">Forms</a> page <br>
            and click on the form you want to view submissions for.
          </p>
        </div>
        <!-- two block -->
        <div class="my-6">
          <h2 class="font-semibold text-brand-primary-400 mb-2">
            Where is my API key?
          </h2>
          <p class="text-brand-primary-300 text-sm">
            Your API key is located on the <a href="../account/index.html" class="font-bold hover:underline">Account</a>
            page.
          </p>
        </div>
        <!-- three block -->
        <div class="my-6">
          <h2 class="font-semibold text-brand-primary-400 mb-2">
            How long does my free trial last?
          </h2>
          <p class="text-brand-primary-300 text-sm">
            5 Days.
          </p>
        </div>
        <!-- four block -->
        <div class="my-6">
          <h2 class="font-semibold text-brand-primary-400 mb-2">
            What do I do if my form gets spam?
          </h2>
          <p class="text-brand-primary-300 text-sm">
            FieldGoal uses Akismet to handle spam, but if you are still getting spam <br>
            submissions then try adding Google's <a href="../docs/recaptcha.html"
              class="font-bold hover:underline">reCAPTCHA</a> to your form.
          </p>
        </div>
        <!-- five block -->
        <div class="my-6">
          <h2 class="font-semibold text-brand-primary-400 mb-2">
            Can I upload files?
          </h2>
          <p class="text-brand-primary-300 text-sm">
            Yes! FieldGoal works with <a href="../docs/recaptcha.html" class="font-bold hover:underline">Amazon S3</a>
            to handle files uploaded to your form.
          </p>
        </div>
        <!-- six block -->
        <div class="my-6">
          <h2 class="font-semibold text-brand-primary-400 mb-2">
            Can I access my data via an API?
          </h2>
          <p class="text-brand-primary-300 text-sm">
            Not yet, but if this feature would be useful to you email us at
            <br><a href="../docs/recaptcha.html" class="font-bold hover:underline">customerservice@fieldgoal.io.</a>
          </p>
        </div>
        <!-- seven block -->
        <div class="my-6">
          <h2 class="font-semibold text-brand-primary-400 mb-2">
            Is there a way to download my form submissions?
          </h2>
          <p class="text-brand-primary-300 text-sm">
            Yes! You can request an export of your account at any time on your <a href="../account/index.html"
              class="font-bold hover:underline">PastForm account</a> page.
          </p>
        </div>
        <!-- eight block -->
        <div class="my-6">
          <h2 class="font-semibold text-brand-primary-400 mb-2">
            Can you recommend a static site generator?
          </h2>
          <p class="text-brand-primary-300 text-sm">
            Yes! The friendly folks at Tighten (👋 that’s us! ) have just the thing: Jigsaw.
          </p>
        </div>
      </div>
@endsection