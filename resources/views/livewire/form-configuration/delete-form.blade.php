<div>
    <div x-data="{ openModal: false }" class="bg-white py-8 px-8 rounded-b border-t-2 border-brand-gray shadow">
        <!-- modal -->
        <div x-bind:class="openModal ? '!flex' : 'hidden'"
            class="hidden fixed items-center justify-center left-0 top-0 w-full h-full z-50 bg-black/50">
            <div class="bg-white max-w-md mx-auto relative rounded-lg shadow-lg w-full">
                <!-- head -->
                <div class="py-8 px-6 text-left">
                    <h3 class="text-brand-primary-400 text-xl mb-4">
                        Delete Form
                    </h3>
                    <p class="text-brand-primary-300 ">
                        This will delete this form and all its submissions <span class="font-bold">This cannot be
                            undone.</span>
                    </p>
                </div>
                <!-- bottom -->
                <div
                    class="flex flex-col sm:flex-row items-center justify-center bg-brand-primary-300/20 py-4 px-6 gap-2">
                    <button x-on:click="openModal = !openModal"
                        class="block bg-white hover:bg-white/80 text-black text-center font-bold p-4 uppercase w-52 ml-auto rounded-md shadow">
                        Nevermind
                    </button>
                    <form action="{{ route('forms.id.delete', $form->slug) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button {{-- x-on:click="openModal = !openModal" --}} type="submit"
                            class="block bg-red-500 hover:bg-red-400 text-white text-center font-bold p-4 uppercase w-52 ml-auto rounded-md">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <h3 class="font-bold text-brand-primary-400 text-xl pb-2 mb-4 border-b border-brand-gray capitalize">
            Delete Form
        </h3>
        <!-- Export Account Data -->
        <div class="flex items-start bg-brand-primary-300/20 text-brand-primary-300 gap-2 mb-4 p-4">
            <svg class="w-8 h-8 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <p class="">
                This will delete this form and all its submissions. <span class="font-medium">This cannot be
                    undone.</span>
            </p>
        </div>
        <!-- button -->
        <button x-on:click="openModal = !openModal"
            class="block bg-red-500 hover:bg-red-400 text-white text-center font-bold p-4 w-52 ml-auto rounded-md">
            Delete Form
        </button>
    </div>
</div>
