<div>
    <div class="bg-white py-8 px-8 rounded-b border-t-2 border-brand-gray shadow">
        <h3 class="font-bold text-brand-primary-400 text-xl pb-2 mb-4 border-b border-brand-gray capitalize">
            Blocked Emails
        </h3>
        @if ($updated)
            <div class="bg-green-600 text-white py-4 px-8 rounded border border-green-800 my-4 ">
                Form updated successfully
            </div>
        @endif
        <p class="text-brand-primary-300 mb-4 text-sm">
            You may block submission based on a predefined set of emails. For this to work, your form must have a field
            named
            `email`.
        </p>
        <!-- email -->
        <div class="mb-4">
            <label for="email" class="text-brand-primary-400 text-sm font-bold leading-8">Email</label>
            <input type="text" name="email" placeholder="xoja@gmail.com" wire:model="blocked_emails"
                class="w-full p-4 bg-brand-gray rounded outline-none" />
            @error('blocked_emails')
                <span class="text-red-500 text-xs mt-2">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <!-- link -->
        <button wire:click="update" wire:loading.attr='disabled'
            class="block bg-brand-primary-500 hover:bg-brand-primary-400 text-white text-center font-bold p-4 uppercase w-52 ml-auto rounded-md">
            ADD BLOCKED EMAIL
        </button>
    </div>
</div>
