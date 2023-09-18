@extends('account._layout', ['title' => 'Settings'])

@section('body')
<div class="w-full flex-1 space-y-5">
  <!-- API block -->
  <div class="bg-white py-8 px-8 rounded-b border-t-2 border-brand-gray shadow">
    <h3 class="font-bold text-brand-primary-400 text-xl pb-2 mb-4 border-b border-brand-gray uppercase">
      api
    </h3>
    <!-- token -->
    <div class="mb-4">
      <label class="text-brand-primary-400 text-sm font-bold leading-8 capitalize block">token</label>
      <span class="block w-full p-4 bg-brand-gray rounded overflow-x-auto">
        rKT0heNkhCKhvSsH9a8ZLRWbbMF9hypl9XE5ZQLHkmyJBSiF7l4rQuHpM4ka
      </span>
    </div>
    <!-- link -->
    <a href="#" class="block no-underline text-brand-primary-300 sm:hover:underline">
      Copy API Token
    </a>
  </div>
  <!-- change profiles -->
  <div class="bg-white py-8 px-8 rounded-b border-t-2 border-brand-gray shadow">
    <h3 class="font-bold text-brand-primary-400 text-xl pb-2 mb-4 border-b border-brand-gray capitalize">
      Change email
    </h3>
    @if(session('EmailUpdated'))
    @include('components.success-message',['message' => 'Email updated successfully.'])
    @endif
    <form method="POST" action="{{ route('account.update-email') }}">
      @csrf
      <!-- email -->
      <div class="mb-4">
        <label for="email" class="text-brand-primary-400 text-sm font-bold leading-8">Email</label>
        <input type="email" name="email" value="{{ auth()->user()->email }}"
          class="w-full p-4 bg-brand-gray rounded outline-none" required />
      </div>
      @error('email')
      <h5 class="text-sm text-red-600 -mt-2 mb-2">
        {{ $message }}
      </h5>
      @enderror
      <!-- link -->
      <button
        class="block bg-brand-primary-500 hover:bg-brand-primary-400 text-white text-center font-bold p-4 uppercase w-52 ml-auto rounded-md">
        Update email
      </button>
    </form>
  </div>
  <!-- change password -->
  <div class="bg-white py-8 px-8 rounded-b border-t-2 border-brand-gray shadow">
    <h3 class="font-bold text-brand-primary-400 text-xl pb-2 mb-4 border-b border-brand-gray capitalize">
      Change password
    </h3>
    @if(session('PasswordUpdated'))
    @include('components.success-message',['message' => 'Password updated successfully.'])
    @endif
    <!-- current password -->
    <form action="{{ route('account.update-password') }}" method="POST">
      @csrf

      @foreach ([['Current password', 'current_password'], ['Password', 'password'], ['Confirm new password',
      'password_confirmation'] ] as $input)

      <div class="mb-4">
        <label for="{{ $input[1] }}" class="text-brand-primary-400 text-sm font-bold leading-8">
          {{ $input[0] }}
        </label>
        <input type="password" name="{{ $input[1] }}" id="{{ $input[1] }}"
          class="w-full p-4 bg-brand-gray rounded outline-none" required min="6" />
      </div>
      @error($input[1])
      <h5 class="text-sm text-red-600 -mt-2 mb-2">
        {{ $message }}
      </h5>
      @enderror
      @endforeach


      <!-- button -->
      <button
        class="block bg-brand-primary-500 hover:bg-brand-primary-400 text-white text-center font-bold p-4 uppercase w-52 ml-auto rounded-md">
        Update password
      </button>
    </form>
  </div>
  <!-- Export Account Data -->
  <div class="bg-white py-8 px-8 rounded-b border-t-2 border-brand-gray shadow">
    <h3 class="font-bold text-brand-primary-400 text-xl pb-2 mb-4 border-b border-brand-gray capitalize">
      Export Account Data
    </h3>
    <!-- Export Account Data -->
    <div class="flex items-start bg-brand-primary-300/20 text-brand-primary-300 gap-2 mb-4 p-4">
      <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
        stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z">
        </path>
      </svg>
      <p class="">
        You will receive an email shortly with a link to download your information. You will be able to export
        again 24hrs after your recent export.
      </p>
    </div>
    <!-- link -->
    <button aria-disabled="true"
      class="block bg-transparent text-brand-gray border border-brand-gray text-center font-bold p-4 uppercase w-52 ml-auto rounded-md">
      reuest export
    </button>
  </div>
  <!-- Delete Account -->
  <div x-data="{ openModal: false }" class="bg-white py-8 px-8 rounded-b border-t-2 border-brand-gray shadow">
    <!-- modal -->
    <div x-bind:class="openModal ? '!flex' : 'hidden'"
      class="hidden fixed items-center justify-center left-0 top-0 w-full h-full z-50 bg-black/50">
      <div class="bg-white max-w-md mx-auto relative rounded-lg shadow-lg w-full">
        <!-- head -->
        <div class="py-8 px-6 text-left">
          <h3 class="text-brand-primary-400 text-xl mb-4">
            Delete Account
          </h3>
          <p class="text-brand-primary-300 ">
            Are you sure you want to delete your account? <span class="font-bold">You cannot undo this
              action.</span>
          </p>
        </div>
        <!-- bottom -->
        <div class="flex flex-col sm:flex-row items-center justify-center bg-brand-primary-300/20 py-4 px-6 gap-2">
          <button x-on:click="openModal = false"
            class="block bg-white hover:bg-white/80 text-black text-center font-bold p-4 uppercase w-52 ml-auto rounded-md shadow">
            Nevermind
          </button>
          <form action="{{ route('account.delete') }}" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit"
              class="block bg-red-500 hover:bg-red-400 text-white text-center font-bold p-4 uppercase w-52 ml-auto rounded-md">
              Delete
            </button>
          </form>
        </div>
      </div>
    </div>
    <h3 class="font-bold text-brand-primary-400 text-xl pb-2 mb-4 border-b border-brand-gray capitalize">
      Delete Account
    </h3>
    <!-- Export Account Data -->
    <div class="flex items-start bg-brand-primary-300/20 text-brand-primary-300 gap-2 mb-4 p-4">
      <svg class="w-8 h-8 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
        stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
        </path>
      </svg>
      <p class="">
        This will cancel your subscription and delete all your account data. <span class="font-medium">This
          cannot be undone.</span>
      </p>
    </div>
    <!-- button -->
    <button x-on:click="openModal = !openModal"
      class="block bg-red-500 hover:bg-red-400 text-white text-center font-bold p-4 uppercase w-52 ml-auto rounded-md">
      DELETE ACCOUNT
    </button>
  </div>
</div>

@endsection