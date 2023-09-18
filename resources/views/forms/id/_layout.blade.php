@php
    $formSlug = request()
        ->route()
        ->parameters()['slug'];
    
    $sections = [
        [
            'title' => 'Inbox',
            'url' => route('forms.id.index', $formSlug),
            'icon' => '<svg class="w-6 h-6 shrink-0 mx-auto lg:mx-0" xmlns="http://www.w3.org/2000/svg" fill="none"
    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
    <path stroke-linecap="round" stroke-linejoin="round"
        d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
    </path>
</svg>',
        ],
        [
            'title' => 'Archive',
            'url' => route('forms.id.archive', $formSlug),
            'icon' => '<svg class="w-6 h-6 shrink-0 mx-auto lg:mx-0" xmlns="http://www.w3.org/2000/svg" fill="none"
    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
    <path stroke-linecap="round" stroke-linejoin="round"
        d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
</svg>',
        ],
        [
            'title' => 'Spam',
            'url' => route('forms.id.spam', $formSlug),
            'icon' => '<svg class="w-6 h-6 shrink-0 mx-auto lg:mx-0" xmlns="http://www.w3.org/2000/svg" fill="none"
    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
</svg>',
        ],
        false, // Used to add divider
        [
            'title' => 'Configuration',
            'url' => route('forms.id.configuration', $formSlug),
            'icon' => '<svg class="w-6 h-6 shrink-0 mx-auto lg:mx-0" xmlns="http://www.w3.org/2000/svg" fill="none"
    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
    <path stroke-linecap="round" stroke-linejoin="round"
        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
    </path>
    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
</svg>',
        ],
        [
            'title' => 'Analytics',
            'url' => route('forms.id.analytics', $formSlug),
            'icon' => '<svg class="w-6 h-6 shrink-0 mx-auto lg:mx-0" xmlns="http://www.w3.org/2000/svg" fill="none"
    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
    <path stroke-linecap="round" stroke-linejoin="round"
        d="M8 13v-1m4 1v-3m4 3V8M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path>
</svg>',
        ],
        [
            'title' => 'Logs',
            'url' => route('forms.id.logs', $formSlug),
            'icon' => '<svg class="w-6 h-6 shrink-0 mx-auto lg:mx-0" xmlns="http://www.w3.org/2000/svg" fill="none"
    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
    <path stroke-linecap="round" stroke-linejoin="round"
        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
    </path>
</svg>',
        ],
    ];
@endphp


@extends('_layout')

@section('page')
    <h2 class="text-2xl text-brand-primary-400 mb-6 pb-2 capitalize">{{ $form->title ?? '' }}</h2>
    <div class="flex flex-col md:flex-row items-start gap-6">
        <!-- left sidebar -->
        <div class="lg:w-52 hidden md:block w-1/6 flex-nowrap shrink-0">
            <ul class="space-y-4 text-brand-primary-300">
                @foreach ($sections as $section)
                    @if ($section === false)
                        <li class="w-full h-px bg-gray-300"></li>
                    @else
                        <a href="{{ $section['url'] }}" @class([
                            'w-full px-4 py-4 md:py-2 rounded flex items-center space-x-1 transition-all transform hover:bg-white',
                            'bg-white shadow' => $title == $section['title'],
                        ]) title="{{ $section['title'] }}">
                            <li class="flex flex-nowrap items-center gap-2">
                                {!! $section['icon'] !!}
                                <span class="flex-1 text-ellipsis overflow-hidden hidden lg:inline-block capitalize">
                                    {{ $section['title'] }}
                                </span>
                            </li>
                        </a>
                    @endif
                @endforeach

            </ul>
        </div>
        <div class="md:hidden w-full">
            <select x-data="{}" x-on:change="window.location = $event.target.value" name="select"
                class="w-full px-4 py-4 md:py-2 rounded flex items-center space-x-1 transition-all transform hover:bg-white bg-white shadow">
                @foreach ($sections as $section)
                    @if ($section === false)
                        @continue
                    @endif

                    <option value="{{ $section['url'] }}" @selected($title == $section['title'])>{{ $section['title'] }}</option>
                @endforeach
            </select>
        </div>
        <div class="w-full flex-1 space-y-5">
            @yield('body')
        </div>

    </div>
@endsection
