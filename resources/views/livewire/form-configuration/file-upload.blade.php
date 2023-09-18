<div>
    <!-- File Uploads start -->
    <div {{ old('enabled') || $form->s3 ? 'true' : 'false' }}
        class="bg-white py-8 px-8 rounded-b border-t-2 border-brand-gray shadow">
        <h3 class="font-bold text-brand-primary-400 text-xl pb-2 mb-4 border-b border-brand-gray capitalize">
            File Uploads
        </h3>
        <p class="text-brand-primary-300 mb-4 text-sm">
            FieldGoal allows you to connect to
            <a href="#" class="font-bold hover:underline">Amazon S3</a>
            to store files uploaded to your forms.
        </p>
        @if (session('S3Updated'))
            @include('components.success-message', ['message' => 'Settings updated successfully.'])
        @endif
        @error('s3')
            @include('components.error-message', ['message' => $message])
        @enderror

        <div class="flex justify-start items-start gap-2">
            <input
                type="checkbox"
                id="enabled"
                name="enabled"
                wire:model="file_upload"
                class="mt-1"
            >
            <label for="enabled" class="text-sm text-brand-primary-300">
                <span class="font-semibold">
                    Enable File Uploads
                </span>
            </label>
        </div>
        <div class="{{ $file_upload ? '' : 'hidden' }}" class="mt-4">
            <!-- Allowed Mimes -->
            <div class="mb-4">
                <label for="mimes" class="text-brand-primary-400 text-sm font-bold leading-8">
                    Allowed Mimes
                </label>
                <input
                    value="{{ old('mimes') ?? ($form->s3['mimes'] ?? '') }}"
                    type="text"
                    id="mimes"
                    wire:model="allowed_mimes"
                    name="mimes"
                    placeholder="pdf,doc,txt,docx"
                    readonly
                    class="w-full p-4 bg-brand-gray rounded outline-none"
                />
                <p class="text-xs text-brand-primary-300">
                    A comma separated list of allowed extensions (e.g. "pdf,doc,txt").
                </p>
            </div>
            @error('allowed_mimes')
                <h5 class="text-sm text-red-600 -mt-2 mb-2">
                    {{ $message }}
                </h5>
            @enderror
        <!-- Max File Upload Size (in Kilobytes): -->
            <div class="mb-4">
                <label for="max_size" class="text-brand-primary-400 text-sm font-bold leading-8">
                    Max File Upload Size (in Kilobytes):
                </label>
                <input
                    value="{{ old('max_size') ?? ($form->s3['max_size'] ?? '') }}"
                    type="number"
                    id="max_size"
                    wire:model="max_upload_size"
                    name="max_size"
                    min="1"
                    placeholder="25000"
                    readonly
                    class="w-full p-4 bg-brand-gray rounded outline-none"
                />
                <p class="text-xs text-brand-primary-300">
                    The default max file upload size is 25000KB (25MB).
                </p>
            </div>
            @error('max_upload_size')
                <h5 class="text-sm text-red-600 -mt-2 mb-2">
                    {{ $message }}
                </h5>
            @enderror
        </div>
        <!-- File Uploads -->
        <div class="flex justify-start items-start gap-2" >
            <input
                type="checkbox"
                id="s3_file_upload"
                wire:model="s3_file_upload"
                class="mt-1"
            >
            <label for="s3_file_upload" class="text-sm text-brand-primary-300">
                <span class="font-semibold">
                    Enable S3 File Uploads
                </span>
            </label>
        </div>
        <div class="{{ $s3_file_upload ? '' : 'hidden' }}" class="mt-4">
            <!-- Access Key ID -->
            <div class="mb-4">
                <label
                    for="key"
                    class="text-brand-primary-400 text-sm font-bold leading-8"
                >
                    Access Key ID
                </label>
                <input
                    required
                    value="{{ old('key') ?? ($form->s3['key'] ?? '') }}"
                    type="text"
                    id="key"
                    wire:model="access_key_id"
                    name="key"
                    placeholder=""
                    class="w-full p-4 bg-brand-gray rounded outline-none"
                />
            </div>
            @error('access_key_id')
                <h5 class="text-sm text-red-600 -mt-2 mb-2">
                    {{ $message }}
                </h5>
            @enderror
            <!-- Secret Access Key -->
            <div class="mb-4">
                <label
                    for="secret"
                    class="text-brand-primary-400 text-sm font-bold leading-8"
                >
                    Access Secret
                </label>
                <input
                    required
                    value="{{ old('secret') }}"
                    type="password"
                    id="secret"
                    name="secret"
                    placeholder=""
                    wire:model="access_secret"
                    class="w-full p-4 bg-brand-gray rounded outline-none"
                />
            </div>
            @error('access_secret')
                <h5 class="text-sm text-red-600 -mt-2 mb-2">
                    {{ $message }}
                </h5>
            @enderror
            <!-- Region -->
            <div class="mb-4">
                <label
                    required
                    for="region"
                    class="text-brand-primary-400 text-sm font-bold leading-8"
                >
                    Region
                </label>
                <input
                    value="{{ old('region') ?? ($form->s3['region'] ?? '') }}"
                    type="text"
                    id="region"
                    wire:model="region"
                    name="region"
                    placeholder="eu-west-1"
                    class="w-full p-4 bg-brand-gray rounded outline-none"
                />
            </div>
            @error('region')
                <h5 class="text-sm text-red-600 -mt-2 mb-2">
                    {{ $message }}
                </h5>
            @enderror
            <!-- Bucket -->
            <div class="mb-4">
                <label
                    required
                    for="bucket"
                    class="text-brand-primary-400 text-sm font-bold leading-8"
                >
                    Bucket
                </label>
                <input
                    value="{{ old('bucket') ?? ($form->s3['bucket'] ?? '') }}"
                    type="text"
                    id="bucket"
                    wire:model="bucket"
                    name="bucket"
                    placeholder="pestform-bucket"
                    class="w-full p-4 bg-brand-gray rounded outline-none"
                />
            </div>
            @error('bucket')
                <h5 class="text-sm text-red-600 -mt-2 mb-2">
                    {{ $message }}
                </h5>
            @enderror
            <!-- Directory -->
            <div class="mb-4">
                <label
                    for="path"
                    class="text-brand-primary-400 text-sm font-bold leading-8"
                >
                    Directory
                </label>
                <input
                    value="{{ old('path') ?? ($form->s3['path'] ?? '') }}"
                    type="text"
                    id="path"
                    wire:model="directory"
                    name="path"
                    placeholder=""
                    class="w-full p-4 bg-brand-gray rounded outline-none"
                />
                <p class="text-xs text-brand-primary-300">
                    Directory files should be uploaded to (e.g. path/to/folder). Defaults to the root directory (/).
                </p>
            </div>
            @error('directory')
                <h5 class="text-sm text-red-600 -mt-2 mb-2">
                    {{ $message }}
                </h5>
            @enderror
            <!-- Allowed Mimes -->
            <div class="mb-4">
                <label
                    for="mimes"
                    class="text-brand-primary-400 text-sm font-bold leading-8"
                >
                    Allowed Mimes
                </label>
                <input
                    value="{{ old('mimes') ?? ($form->s3['mimes'] ?? '') }}"
                    type="text"
                    id="mimes"
                    wire:model="s3_allowed_mimes"
                    name="mimes"
                    placeholder="pdf,doc,txt,docx"
                    class="w-full p-4 bg-brand-gray rounded outline-none"
                />
                <p class="text-xs text-brand-primary-300">
                    A comma separated list of allowed extensions (e.g. "pdf,doc,txt").
                </p>
            </div>
            @error('s3_allowed_mimes')
                <h5 class="text-sm text-red-600 -mt-2 mb-2">
                    {{ $message }}
                </h5>
            @enderror
        <!-- Max File Upload Size (in Kilobytes): -->
            <div class="mb-4">
                <label
                    for="max_size"
                    class="text-brand-primary-400 text-sm font-bold leading-8"
                >
                    Max File Upload Size (in Kilobytes):
                </label>
                <input
                    value="{{ old('max_size') ?? ($form->s3['max_size'] ?? '') }}"
                    type="number"
                    id="max_size"
                    wire:model="s3_max_upload_size"
                    name="max_size"
                    min="1"
                    placeholder="25000"
                    class="w-full p-4 bg-brand-gray rounded outline-none"
                />
                <p class="text-xs text-brand-primary-300">
                    The default max file upload size is 25000KB (25MB).
                </p>
            </div>
            @error('s3_max_upload_size')
                <h5 class="text-sm text-red-600 -mt-2 mb-2">
                    {{ $message }}
                </h5>
            @enderror
        </div>

        <!-- link -->
        <button
            wire:click="update"
            wire:loading.attr='disabled'
            class="block bg-brand-primary-500 hover:bg-brand-primary-400 text-white text-center font-bold p-4 uppercase w-52 ml-auto rounded-md"
        >
            Update
        </button>

        @if ($updated)
            <div class="bg-green-600 text-white py-4 px-8 rounded border border-green-800 my-4 ">
                Form updated successfully
            </div>
        @endif
    </div>
    <!-- File Uploads end -->
</div>
