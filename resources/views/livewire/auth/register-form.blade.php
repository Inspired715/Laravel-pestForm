<div>
    <form wire:submit.prevent='register' method="POST" "text-brand-primary-400">
        @if (session()->has('error'))
        <div class=" text-center text-sm text-red-500">
            {{ session('error') }}
        </div>
        @endif
        <div class="mb-6">
            <label for="email" class=" text-sm font-bold leading-8">Email</label>
            <input wire:model='email' type="email" name="email" id="email"
                class="w-full p-4 bg-brand-gray rounded outline-none" required />
            @error('email')
            <span class="text-red-500 text-xs mt-2">
                {{ $message }}
            </span>
            @enderror
        </div>

        <div class="mb-6">
            <label for="password" class=" text-sm font-bold leading-8">Password</label>
            <input wire:model='password' type="password" name="password" id="password"
                class="w-full p-4 bg-brand-gray rounded outline-none" required />
            <span class="italic text-xs">
                Password must be at least 6 characters long.
            </span>
            @error('password')
            <span class="block text-red-500 text-xs mt-2">
                {{ $message }}
            </span>
            @enderror
        </div>

        <div class="mb-4 text-sm ">
            By registering, you agree to our <a href="#" class="font-bold">terms and conditions</a>.
        </div>

        <button wire:loading.attr="disabled"
            class="block bg-brand-primary-500 rounded hover:brand-primary-100 text-white text-center font-bold p-4 uppercase w-full cursor-pointer disabled:grayscale disabled:cursor-not-allowed">
            Register
        </button>
    </form>
</div>