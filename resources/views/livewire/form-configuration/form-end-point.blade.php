<div>
    <div class="bg-white py-8 px-8 rounded-b border-t-2 border-brand-gray shadow">
        <h3 class="font-bold text-brand-primary-400 text-xl pb-2 mb-4 border-b border-brand-gray capitalize">
            Form Endpoint
        </h3>
        @if ($updated)
            <div class="bg-green-600 text-white py-4 px-8 rounded border border-green-800 my-4 ">
                Form updated successfully
            </div>
        @endif
        <!-- token -->
        <div class="mb-4">
            <div class="bg-brand-blue-200 flex flex-col px-4 py-6 rounded-lg text-white text-sm w-full lg:text-base">
                <code>
                    <span id="form_endpoint" class="px-1 py-1 rounded-sm overflow-x-auto">
                        <span class="text-pink-600">&lt;form</span> <span class="text-green-600">action</span>=<span class="text-yellow-400">"{{ route('form.submit', $form->slug) }}"</span> <span class="text-green-600">method</span>=<span class="text-yellow-400">"POST"</span>@if($form->file_upload || $form->s3_file_upload)<br><span class="text-green-600">enctype</span>=<span class="text-yellow-400">"multipart/form-data"</span>@endif<span class="text-pink-600">></span>
                    </span>
                </code>
            </div>
        </div>
        <!-- link -->
        <button id="copy_embed_code"
            class="block text-sm ml-auto border border-brand-primary-300 rounded-lg text-center w-52 no-underline text-brand-primary-300 sm:hover:underline py-2">
            Copy embed code
        </button>
        <script>
            document.getElementById("copy_embed_code").addEventListener("click", function() {
                var copyText = document.getElementById("form_endpoint");
                var textArea = document.createElement("textarea");
                textArea.value = copyText.textContent;
                document.body.appendChild(textArea);
                textArea.select();
                document.execCommand("Copy");
                textArea.remove();
                alert("Endpoint copied to clipboard");
            });
        </script>
    </div>
</div>
