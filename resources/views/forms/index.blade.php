@extends('_layout', ['title' => 'Your Forms'])

@section('page')
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-2xl text-brand-primary-400">
            Your Forms
        </h2>
        <a href="{{ route('forms.new') }}"
            class="block font-bold text-white bg-brand-primary-500 text-sm hover:bg-brand-primary-400 py-2 px-4 rounded-lg uppercase transition-colors ease-in-out ">
            New form
        </a>
    </div>
    <!-- fomr body -->
    @forelse ($forms as $form)
        <a href="{{ route('forms.id.index', $form->slug) }}">
            <div class="my-4 shadow-md bg-white rounded-lg px-12 py-8 flex justify-between items-center">
                <div>
                    <h4 class="font-bold text-gray-700 text-lg">
                        {{ $form->title }}
                    </h4>
                    <h5 class="mt-1/2 text-gray-500 text-xs">
                        {{ route('form.submit', $form->slug) }}
                    </h5>
                </div>
            </div>
        </a>
    @empty
        <div
            class="flex flex-col items-center px-4 py-16 w-full bg-white border-t-2 border-gray-dark shadow rounded-2xl text-center sm:py-24 text-brand-primary-300">
            <svg class="fill-current mb-5" width="72px" height="82px" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 72 85">
                <path
                    d="M64 75h2a1 1 0 1 1 0 2h-2v2a1 1 0 1 1-2 0v-2h-2a1 1 0 1 1 0-2h2v-2a1 1 0 1 1 2 0v2zm-2-7.95V4a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v69c0 1.1.9 2 2 2h50.05A9 9 0 0 1 62 67.05zM54.05 77H4a4 4 0 0 1-4-4V4a4 4 0 0 1 4-4h56a4 4 0 0 1 4 4v63.05A9 9 0 1 1 54.05 77zM63 83a7 7 0 1 0 0-14 7 7 0 0 0 0 14zM10 19h44a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2H10a2 2 0 0 1-2-2v-4c0-1.1.9-2 2-2zm0 1a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h44a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1H10zm-1.5-4h14a.5.5 0 0 1 0 1h-14a.5.5 0 0 1 0-1zM23 8h18a1 1 0 1 1 0 2H23a1 1 0 1 1 0-2zM10 57h44a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2H10a2 2 0 0 1-2-2v-4c0-1.1.9-2 2-2zm0-21h44a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2H10a2 2 0 0 1-2-2v-4c0-1.1.9-2 2-2zm0 1a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h44a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1H10zM9 48h3a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H9a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1zm0 1v3h3v-3H9zm-.5-16h14a.5.5 0 0 1 0 1h-14a.5.5 0 0 1 0-1zm7 17h14a.5.5 0 0 1 0 1h-14a.5.5 0 0 1 0-1zm26 0h14a.5.5 0 0 1 0 1h-14a.5.5 0 0 1 0-1z">
                </path>
            </svg>
            <span class="block text-lg">
                There doesn’t seem to be anything here!
            </span>
            <a class="font-bold" href="{{ route('forms.new') }}">
                Get started by adding your first form
            </a>
        </div>
    @endforelse
@endsection
