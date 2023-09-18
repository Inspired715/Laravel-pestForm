<div>
    <div x-data="{ open: false }" class="bg-white py-8 px-8 rounded-b border-t-2 border-brand-gray shadow">
        <h3 class="font-bold text-brand-primary-400 text-xl pb-2 mb-4 border-b border-brand-gray capitalize">
            Allowed Domains
        </h3>
        @if ($updated)
            <div class="bg-green-600 text-white py-4 px-8 rounded border border-green-800 my-4 ">
                Form updated successfully
            </div>
        @endif
        <p class="text-brand-primary-300 mb-4 text-sm">
            FieldGoal allows you to restrict which domains can create submissions for your form. This uses the Referer
            HTTP
            header. When enabling this feature, make sure you're sending this header in the request (should be default
            for
            regular HTML forms).
        </p>
        <div class="flex justify-start items-center gap-2">
            <input type="checkbox" id="check" name="allowed_domains" wire:model="allowed_domains" value="">
            <label for="check" class="text-brand-primary-300 text-sm font-semibold">
                Enable Allowed Domains
            </label>
        </div>
        <!-- Allowed Domains -->
        <div {{ $allowed_domains ? '' : 'hidden' }} class="mb-4">
            <label for="Allowed" class="text-brand-primary-400 text-sm font-bold leading-8">Allowed Domains</label>
            <input type="text" id="Allowed" name="Allowed" wire:model="allowed_domains_count"
                placeholder="example.com, example.net" class="w-full p-4 bg-brand-gray rounded outline-none" />
            @error('allowed_domains_count')
                <span class="text-red-500 text-xs mt-2">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <!-- link -->
        <button wire:click="update" wire:loading.attr='disabled'
            class="block bg-brand-primary-500 hover:bg-brand-primary-400 text-white text-center font-bold p-4 uppercase w-52 ml-auto rounded-md">
            Update Domains
        </button>
    </div>
</div>
