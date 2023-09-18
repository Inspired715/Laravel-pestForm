@extends('docs._layout')

@section('page')
      <!-- right content -->
      <div class="flex-1 w-full bg-white p-6 shadow rounded-2xl">
        <h1 class="font-bold text-2xl text-center md:text-left text-brand-primary-400 mb-6">
          Integrate with Zapier
        </h1>
        <!-- one block -->
        <div class="mb-6">
          <div class="flex gap-2 my-2">
            <span class="font-semibold text-brand-primary-400">1. </span>
            <p class="text-brand-primary-300 text-sm">
              Login to <a href="https://zapier.com/sign-up/" class="font-bold hover:underline">Zapier</a> or register
              for your free account if you don't already have one.
            </p>
          </div>
        </div>
        <!-- two block -->
        <div class="mb-6">
          <div class="flex gap-2 my-2">
            <span class="font-semibold text-brand-primary-400">2. </span>
            <p class="text-brand-primary-300 text-sm">
              Visit the <a href="https://zapier.com/sign-up/" class="font-bold hover:underline">FieldGoal Integrations
                page</a> to find a zap you'd like to use. For our demonstration we will use the Slack Notification Zap.
            </p>
          </div>
          <div class="flex justify-center items-center m-8">
            <img class="shadow" src="../images/slack-zap.png" alt="free">
          </div>
        </div>
        <!-- three block -->
        <div class="mb-6">
          <div class="flex gap-2 my-2">
            <span class="font-semibold text-brand-primary-400">3. </span>
            <p class="text-brand-primary-300 text-sm">
              Zapier will ask you to authenticate FieldGoal.
            </p>
          </div>
          <div class="flex justify-center items-center m-8">
            <img class="shadow" src="../images/zapier-step1.png" alt="free">
          </div>
          <div class="flex justify-center items-center m-8">
            <img class="shadow" src="../images/authorize-zapier.png" alt="free">
          </div>
        </div>
        <!-- four block -->
        <div class="mb-6">
          <div class="flex gap-2 my-2">
            <span class="font-semibold text-brand-primary-400">4. </span>
            <p class="text-brand-primary-300 text-sm">
              To allow Zapier access to your FieldGoal account, you will need the API key located on your FieldGoal
              account page.
            </p>
          </div>
          <div class="flex justify-center items-center m-8">
            <img class="shadow" src="../images/api-key.png" alt="free">
          </div>
        </div>
        <!-- five block -->
        <div class="mb-6">
          <div class="flex gap-2 my-2">
            <span class="font-semibold text-brand-primary-400">5. </span>
            <p class="text-brand-primary-300 text-sm">
              To set up a trigger, pick the form that you would like to use. All the forms you create on FieldGoal will
              populate on the list.
            </p>
          </div>
          <div class="flex justify-center items-center m-8">
            <img class="shadow" src="../images/zapier-trigger.png" alt="free">
          </div>
        </div>
        <!-- six block -->
        <div class="mb-6">
          <div class="flex gap-2 my-2">
            <span class="font-semibold text-brand-primary-400">6. </span>
            <p class="text-brand-primary-300 text-sm">
              After selecting a form, Zapier will attempt to test that the form trigger will work. Just keep pressing
              continue and Zapier will do all the work.
            </p>
          </div>
          <div class="flex justify-center items-center m-8">
            <img class="shadow" src="../images/zapier-test-trigger.png" alt="free">
          </div>
        </div>
        <!-- seven block -->
        <div class="mb-6">
          <div class="flex gap-2 my-2">
            <span class="font-semibold text-brand-primary-400">7. </span>
            <p class="text-brand-primary-300 text-sm">
              Choose the app and event for your form submission. We are using Slack for our example, and posting a
              message to a slack channel when the user submits a form as an example.
            </p>
          </div>
          <div class="flex justify-center items-center m-8">
            <img class="shadow" src="../images/send-message.png" alt="free">
          </div>
        </div>
        <!-- eight block -->
        <div class="mb-6">
          <div class="flex gap-2 my-2">
            <span class="font-semibold text-brand-primary-400">9. </span>
            <p class="text-brand-primary-300 text-sm">
              You will now need to configure the application you are using, in this case Slack, to handle the form
              submission. In our case, we will have Slack post a message notifying us that a submission has occurred.
            </p>
          </div>
          <div class="flex justify-center items-center m-8">
            <img class="shadow" src="../images/slack-setup.png" alt="free">
          </div>
        </div>
        <!-- nine block -->
        <div class="mb-6">
          <div class="flex gap-2 my-2">
            <span class="font-semibold text-brand-primary-400">9. </span>
            <p class="text-brand-primary-300 text-sm">
              Zapier will then attempt to test the action that you setup. You can skip this if you'd like, but it's good
              to know how your action will look based on a test.
            </p>
          </div>
          <div class="flex justify-center items-center m-8">
            <img class="shadow" src="../images/zap-test-action.png" alt="free">
          </div>
        </div>
        <!-- ten block -->
        <div class="mb-6">
          <div class="flex gap-2 my-2">
            <span class="font-semibold text-brand-primary-400">10. </span>
            <p class="text-brand-primary-300 text-sm">
              If your Zapier test passes and you like how it looks, it's ready to turn on. Or, you can change the
              settings and continue to retest until it's ready.
            </p>
          </div>
          <div class="flex justify-center items-center m-8">
            <img class="shadow" src="../images/zapier-turnon.png" alt="free">
          </div>
        </div>
      </div>
    @endsection