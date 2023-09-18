@extends('forms.id._layout', ['title' => 'Inbox'])

@section('body')
    @if (!$submissions->count())
        <div class="bg-white py-16 px-4 md:px-16 lg:py-24 rounded-b border-t-2 border-brand-gray shadow">
            <div class="flex flex-col gap-1 items-center justify-center">
                <svg class="fill-current mb-5 text-brand-primary-300" width="88px" height="68px"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 88 68">
                    <path
                        d="M78 46.04A11 11 0 1 1 66.04 58H5a5 5 0 0 1-5-5V5a5 5 0 0 1 5-5h68a5 5 0 0 1 5 5v41.04zM66.04 56a11 11 0 0 1 7.07-9.3L50.75 29.95 44.4 34.7a9 9 0 0 1-10.8 0l-6.35-4.76L2 48.87V53a3 3 0 0 0 3 3h61.04zM76 46.04V11L51.58 29.31l22.7 17.03c.56-.14 1.13-.24 1.72-.3zM26.42 29.31L2 11v36.63L26.42 29.3zM76 5a3 3 0 0 0-3-3H5a3 3 0 0 0-3 3v3.5l32.8 24.6a7 7 0 0 0 8.4 0L76 8.5V5zm1 61a9 9 0 1 0 0-18 9 9 0 0 0 0 18zm-.5-14h1a1 1 0 0 1 1 1v1.5l-.38 2.64a1 1 0 0 1-.99.86h-.26a1 1 0 0 1-1-.86l-.37-2.64V53a1 1 0 0 1 1-1zm.5 10.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z">
                    </path>
                </svg>
                <p class="text-sm md:text-base text-brand-primary-400 text-center">
                    There doesn't seem to be anything here!
                </p>
                <p class="text-sm md:text-base text-brand-primary-300 text-center">
                    Add this form endpoint to any form and submissions will appear in this inbox.
                </p>
            </div>
            <!-- === -->
            <div class="mt-10 flex flex-col items-center ">
                <div class="bg-brand-blue-200 overflow-x-auto flex flex-col px-2 py-3 rounded-lg text-white text-xs w-full lg:text-sm mb-4">
                    <code>
                        <span class="px-1 py-1 rounded-sm overflow-x-auto">
                            <span class="text-pink-600">&lt;form</span> <span class="text-green-600">action</span>=<span class="text-yellow-400">"{{ route('form.submit', $form->slug) }}"</span> <span class="text-green-600">method</span>=<span class="text-yellow-400">"POST"</span>@if($form->file_upload)<br><span class="text-green-600">enctype</span>=<span class="text-yellow-400">"multipart/form-data"</span>@endif<span class="text-pink-600">></span>
                        </span>
                    </code>
                </div>
                <a href="#" class="text-brand-primary-300 hover:underline capitalize text-xs md:text-sm">
                    Copy Embed Code
                </a>
            </div>
        </div>
    @else
        @livewire('submissions-view', [
            'form' => $form,
            'filter' => 'inbox',
        ])
    @endif
@endsection
