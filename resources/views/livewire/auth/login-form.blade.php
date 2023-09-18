<div>
    <form wire:submit.prevent='login' method="POST">
        @if (session()->has('error'))
        <div class=" text-center text-sm text-red-500">
            {{ session('error') }}
        </div>
        @endif
        <div class="mb-6">
            <label for="email" class="text-brand-primary-400 text-sm font-bold leading-8">
                Email
            </label>
            <input wire:model='email' type="email" name="email" id="email"
                class="w-full p-4 bg-brand-gray rounded outline-none" required />
            @error('email')
            <span class="text-red-500 text-xs mt-2">
                {{ $message }}
            </span>
            @enderror
        </div>

        <div class="mb-6">
            <label for="password" class="text-brand-primary-400 text-sm font-bold leading-8">
                Password
            </label>
            <input wire:model='password' type="password" name="password" id="password"
                class="w-full p-4 bg-brand-gray rounded outline-none" required />
            @error('password')
            <span class="text-red-500 text-xs mt-2">
                {{ $message }}
            </span>
            @enderror
        </div>

        <div class="flex flex-col mb-8 sm:flex-row-reverse sm:items-center sm:justify-between">
            <a class="block font-bold text-brand-primary-400 mb-6 sm:mb-0" href="{{route('password.request')}}">
                Forgot your password?
            </a>
            <label class="flex items-center">
                <input wire:model='remember' type="checkbox" class="p-4 bg-brand-gray rounded outline-none" />
                <span class="text-brand-primary-400 ml-2 whitespace-nowrap">
                    Remember me
                </span>
            </label>
        </div>

        <button wire:loading.attr="disabled"
            class="block bg-brand-primary-500 rounded hover:brand-primary-100 text-white text-center font-bold p-4 uppercase w-full cursor-pointer disabled:grayscale disabled:cursor-not-allowed">
            Log in
        </button>
    </form>
</div>