<div>
    @error('limit')
    <h3 class="text-sm text-red-500 mb-2">
        {{ $message }}
    </h3>
    @enderror
    <form wire:submit.prevent='create'>
        <div class="mb-6">
            <label for="name" class="text-brand-primary-400 text-sm font-bold leading-8">
                Name
            </label>
            <input wire:model='title' type="text" name="name" placeholder="Xo'ja's wedding"
                class="w-full p-4 bg-brand-gray rounded outline-none" required />
            @error('title')
            <span class="text-red-500 text-xs mt-2">
                {{ $message }}
            </span>
            @enderror
        </div>

        <div class="mb-6">
            <label for="password" class="flex items-center justify-between text-brand-primary-400 text-sm leading-8">
                <span class="font-bold">Forward to</span>
                <span>One email address per line.</span>
            </label>
            <textarea wire:model='forward_to' class="w-full p-4 bg-brand-gray rounded outline-none">
            </textarea>
            @error('forward_to_array.*')
            <span class="text-red-500 text-xs mt-2">
                All entries should be valid email addresses
            </span>
            @enderror
        </div>

        <button wire:loading.attr="disabled"
            class="block bg-brand-primary-500 hover:bg-brand-primary-400 text-white text-center font-bold p-4 uppercase w-52 ml-auto rounded-md disabled:cursor-not-allowed disabled:grayscale">
            Create Form
        </button>
    </form>
</div>