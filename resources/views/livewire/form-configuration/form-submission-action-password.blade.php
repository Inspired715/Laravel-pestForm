<div>
    <div class="bg-white py-8 px-8 rounded-b border-t-2 border-brand-gray shadow">
        <h3 class="font-bold text-brand-primary-400 text-xl pb-2 mb-4 border-b border-brand-gray capitalize">
            Submission Actions
        </h3>
        @if ($updated)
            <div class="bg-green-600 text-white py-4 px-8 rounded border border-green-800 my-4 ">
                Form updated successfully
            </div>
        @endif
        <p class="text-brand-primary-300 text-sm mb-4">
            Configure what should happen when a form submission succeeds or when it fails.
        </p>

        <!-- What happens when a form submission succeeds? -->
        <div class="mb-4">
            <label for="select" class="text-brand-primary-400 text-sm font-bold leading-8">
                What happens when a form submission <b>succeeds</b>?
            </label>
            <select
                class="w-full p-4 bg-brand-gray rounded outline-none"
                name=""
                id="select"
                wire:model="submission_succeeded"
            >
                <option value="default">Use default thank you page</option>
                <option value="redirect">Redirect to Custom Thank You Page</option>
                <option value="branded">Use Branded Thank You Page</option>
            </select>
            <!-- redirect block -->
            <div {{ $submission_succeeded === 'redirect' ? '' : 'hidden' }} class="mt-4">
                <label for="Name" class="text-brand-primary-400 text-sm leading-8">
                    <span class="font-bold">Redirect URL</span> (On Success)
                </label>
                <input
                    type="url"
                    name="success_redirect_url"
                    placeholder="xoja@gmail.com"
                    wire:model="success_redirect_url"
                    class="w-full p-4 bg-brand-gray rounded outline-none"
                />
                @error('success_redirect_url')
                    <span class="text-red-500 text-xs mt-2">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <!-- redirect block end -->

            <!-- Branding Options start -->
            <div {{ $submission_succeeded === 'branded' ? '' : 'hidden' }} class="mt-4">
                <label for="Name" class="text-brand-primary-400 text-sm leading-8">
                    <span class="font-bold">Submission Message</span>
                </label>
                <div class="mb-2">
                    <input
                        class="w-full p-4 bg-brand-gray rounded outline-none"
                        type="text"
                        id="success_message_title"
                        name="success_message_title"
                        value="{{ $form->success_message_title ?? $success_message_title ?? '' }}"
                        wire:model="success_message_title"
                    >
                    @error('success_message_title')
                        <span class="text-red-500 text-xs mt-2">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <h3 class="text-brand-primary-400 text-sm leading-8 font-bold">
                    Branding Options
                </h3>
                <div class="mb-2">
                    <input
                        class="hidden"
                        type="color"
                        id="color1"
                        name="color"
                        value="{{ $form->branding_option_1 ?? $branding_option_1 ?? '' }}"
                        wire:model="branding_option_1"
                    >
                    <label for="color1" class="flex items-center text-brand-primary-300 gap-1">
                        <span class="w-10 h-10 bg-brand-blue-200 block" style="background-color: {{ $branding_option_1 }};"></span>
                        <span>Text Color</span>
                    </label>
                    @error('branding_option_1')
                        <span class="text-red-500 text-xs mt-2">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="mb-2">
                    <input
                        class="hidden"
                        type="color"
                        id="color2"
                        name="color"
                        value="{{ $form->branding_option_2 ?? $branding_option_2 ?? '' }}"
                        wire:model="branding_option_2"
                    >
                    <label for="color2" class="flex items-center text-brand-primary-300 gap-1">
                        <span class="w-10 h-10 bg-brand-primary-300 block" style="background-color: {{ $branding_option_2 }};"></span>
                        <span>Text Color Muted</span>
                    </label>
                    @error('branding_option_2')
                        <span class="text-red-500 text-xs mt-2">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="mb-2">
                    <input
                        class="hidden"
                        type="color"
                        id="color3"
                        name="color"
                        value="{{ $form->branding_option_3 ?? $branding_option_3 ?? '' }}"
                        wire:model="branding_option_3"
                    >
                    <label for="color3" class="flex items-center text-brand-primary-300 gap-1">
                        <span class="w-10 h-10 bg-yellow-400 block" style="background-color: {{ $branding_option_3 }};"></span>
                        <span>Text Color Inverted</span>
                    </label>
                    @error('branding_option_3')
                        <span class="text-red-500 text-xs mt-2">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="mb-2">
                    <input
                        class="hidden"
                        type="color"
                        id="color4"
                        name="color"
                        value="{{ $form->branding_option_4 ?? $branding_option_4 ?? '' }}"
                        wire:model="branding_option_4"
                    >
                    <label for="color4" class="flex items-center text-brand-primary-300 gap-1">
                        <span class="w-10 h-10 bg-brand-blue-100 block" style="background-color: {{ $branding_option_4 }};"></span>
                        <span>Fill Color</span>
                    </label>
                    @error('branding_option_4')
                        <span class="text-red-500 text-xs mt-2">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <p class="my-2 text-brand-primary-300">
                    Once you've saved your changes,
                    <a
                        target="_blank"
                        href="{{ route('forms.id.preview-thank-you', ['slug' => $form->slug,]) }}"
                        class="hover:underline"
                    >
                        <b>click here</b>
                    </a>
                    to view your branded Thank You page.
                </p>
            </div>
            <!-- Branding Options end -->
        </div>

        <!-- What happens when a form submission fails? -->
        <div class="mb-4">
            <label for="select2" class="text-brand-primary-400 text-sm font-bold leading-8">
                What happens when a form submission <b>fails</b>?
            </label>
            <select
                class="w-full p-4 bg-brand-gray rounded outline-none"
                name=""
                id="select2"
                wire:model="submission_failed"
            >
                <option value="default">Use Default Error Pages</option>
                <option value="redirect2">Redirect to Custom URL</option>
            </select>

            <!-- start -->
            <div {{ $submission_failed === 'redirect2' ? '' : 'hidden' }} class="mt-4">
                <div class="mt-4">
                    <label
                        for="Name"
                        class="text-brand-primary-400 text-sm leading-8"
                    >
                        <span class="font-bold">Redirect URL</span> (On Success)
                    </label>
                    <input
                        type="email"
                        name="email"
                        placeholder="xoja@gmail.com"
                        wire:model="failed_redirect_url"
                        class="w-full p-4 bg-brand-gray rounded outline-none"
                    />
                    @error('failed_redirect_url')
                        <span class="text-red-500 text-xs mt-2">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <p class="my-2 text-brand-primary-300">
                    When using custom redirect URLs for submission failures, we'll provide you the error code in the
                    query string when we redirect to it, for instance:
                </p>
                <p class="my-2 text-gray-300">
                    http://example.com/failed?error=invalid-domain
                </p>

                <!-- dropdown start -->
                <div x-data="{ open: false }">
                    <button
                        class="flex items-center -ml-4"
                        x-on:click="open=!open"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" x-bind:class="open ? 'rotate-90' : ''" viewBox="0 0 24 24">
                            <path d="M14 12L10 16V8L14 12Z"></path>
                        </svg>
                        <span>See the error codes</span>
                    </button>
                    <table
                        x-bind:class="open ? '' : 'hidden'"
                        class="table-fixed"
                    >
                        <thead>
                            <tr class="border-b border-brand-gray">
                                <th class="text-left">Code</th>
                                <th class="text-left">Meaning</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr class="border-b border-brand-gray">
                                <td class="w-1/2 py-2">recaptcha-required</td>
                                <td>Recaptcha check failed.</td>
                            </tr>
                            <tr class="border-b border-brand-gray">
                                <td class="w-1/2 py-2">file-upload-error</td>
                                <td>Something went wrong with the file uploads.</td>
                            </tr>
                            <tr class="border-b border-brand-gray">
                                <td class="w-1/2 py-2">invalid-domain</td>
                                <td>Someone tried to create a submission from an invalid domain (see Allowed Domains in the form settings).</td>
                            </tr>
                            <tr class="border-b border-brand-gray">
                                <td class="w-1/2 py-2">unknown</td>
                                <td>This is rare, but if we can't identify the error, we'll try to send you this one instead.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- dropdown end -->
            </div>
            <!-- end -->
        </div>

        <!-- button -->
        <button
            wire:click="update"
            wire:loading.attr='disabled'
            class="block text-sm bg-brand-primary-500 hover:bg-brand-primary-400 text-white text-center font-bold p-4 uppercase w-auto ml-auto rounded-md"
        >
            UPDATE SUBMISSION ACTIONS
        </button>
    </div>
</div>
