@extends('forms.id._layout', ['title' => 'Archive'])

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
                    There doesn’t seem to be anything here!
                </p>
                <p class="text-sm md:text-base text-brand-primary-300 text-center">
                    Any form submissions you mark as archived will appear here.
                </p>
            </div>
        </div>
    @else
        @livewire('submissions-view', [
            'form' => $form,
            'filter' => 'archive',
        ])
    @endif
@endsection
