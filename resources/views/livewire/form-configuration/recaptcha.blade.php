<div>
    <div x-data="{ open: false }" class="bg-white py-8 px-8 rounded-b border-t-2 border-brand-gray shadow">
        <h3 class="font-bold text-brand-primary-400 text-xl pb-2 mb-4 border-b border-brand-gray capitalize">
            reCAPTCHA
        </h3>
        @if ($updated)
            <div class="bg-green-600 text-white py-4 px-8 rounded border border-green-800 my-4 ">
                Form updated successfully
            </div>
        @endif
        <p class="text-brand-primary-300 mb-4 text-sm">
            Place your valid <a href="../docs/recaptcha.html" class="font-bold hover:underline">reCAPTCHA v2 secret
                key</a>
            here.
        </p>
        <div class="flex justify-start items-start gap-2">
            <input type="checkbox" id="check2" class="mt-1" wire:model="recaptcha">
            <label for="check2" class="text-sm text-brand-primary-300">
                <span class="font-semibold">Enable reCAPTCHA</span>
                <p class="text-xs">
                    Selecting this will require submissions to your form to contain a valid reCAPTCHA v2 response.
                    Because
                    FieldGoal
                    does not generate your form HTML, you are responsible for <a href="../docs/recaptcha.html"
                        class="font-bold hover:underline">adding the reCAPTCHA to your form's markup.</a>
                </p>
            </label>
        </div>
        <!-- reCAPTCHA -->
        <div {{ $recaptcha ? '' : 'hidden' }} class="mb-4">
            <label for="reCAPTCHA" class="text-brand-primary-400 text-sm font-bold leading-8">secret</label>
            <input type="password" id="reCAPTCHA" name="reCAPTCHA" placeholder="" wire:model="recaptcha_secret"
                autocomplete="off" class="w-full p-4 bg-brand-gray rounded outline-none" />
            @error('allowed_domains_count')
                <span class="text-red-500 text-xs mt-2">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <!-- link -->
        <button wire:click="update" wire:loading.attr='disabled'
            class="block bg-brand-primary-500 hover:bg-brand-primary-400 text-white text-center font-bold p-4 uppercase w-52 ml-auto rounded-md">
            UPDATE ReCAPTCHA
        </button>
    </div>
</div>
