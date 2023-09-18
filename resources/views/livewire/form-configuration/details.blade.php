<div class="bg-white py-8 px-8 rounded-b border-t-2 border-brand-gray shadow">
    <h3 class="font-bold text-brand-primary-400 text-xl pb-2 mb-4 border-b border-brand-gray capitalize">
        Form Details
    </h3>

    @if ($updated)
        <div class="bg-green-600 text-white py-4 px-8 rounded border border-green-800 my-4 ">
            Form updated successfully
        </div>
    @endif
    <!-- name -->
    <div class="mb-4">
        <label for="Name" class="text-brand-primary-400 text-sm font-bold leading-8">Name</label>
        <input wire:model='title' type="text" class="w-full p-4 bg-brand-gray rounded outline-none" />
        @error('title')
            <span class="text-red-500 text-xs mt-2">
                {{ $message }}
            </span>
        @enderror
    </div>
    <!-- email -->
    <div class="mb-4">
        <label class="flex items-center justify-between text-brand-primary-400 text-sm leading-8">
            <span class="font-bold">Forward to</span>
            <span>One email address per line.</span>
        </label>
        <textarea wire:model='forward_to' class="w-full p-4 bg-brand-gray rounded outline-none"></textarea>
        @error('forward_to_array.*')
            <span class="text-red-500 text-xs mt-2">
                All entries should be valid email addresses
            </span>
        @enderror
    </div>
    <!-- New Submission's Email Theme -->
    <div class="mb-4">
        <label for="select" class="text-brand-primary-400 text-sm font-bold leading-8">New Submission's Email
            Theme</label>
        <select class="w-full p-4 bg-brand-gray rounded outline-none" name="" id="select"
            wire:model='default_email_theme'>
            <option value="one">Use default theme (with styles)</option>
            <option value="two">Use minimal theme (few styles)</option>
        </select>
    </div>
    <!-- link -->
    <button wire:click="update" wire:loading.attr='disabled'
        class="block text-sm bg-brand-primary-500 hover:bg-brand-primary-400 text-white text-center font-bold p-4 uppercase w-48 ml-auto rounded-md disabled:cursor-not-allowed disabled:grayscale">
        Update details
    </button>
</div>
