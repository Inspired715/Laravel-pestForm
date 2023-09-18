@php
$sections = [
[
'title' => 'Settings',
'url' => route('account.index'),
'icon' => '<svg class="w-6 h-6 shrink-0 mx-auto lg:mx-0" xmlns="http://www.w3.org/2000/svg" fill="none"
    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
    <path stroke-linecap="round" stroke-linejoin="round"
        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
    </path>
    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
</svg>'
],
[
'title' => 'Billing',
'url' => route('account.billing'),
'icon' => '<svg class="w-6 h-6 shrink-0 mx-auto lg:mx-0" xmlns="http://www.w3.org/2000/svg" fill="none"
    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
    <path stroke-linecap="round" stroke-linejoin="round"
        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
    </path>
</svg>'
],

]
@endphp


@extends('_layout')

@section('page')

<h2 class="text-2xl text-brand-primary-400 mb-6 pb-2 capitalize">Account</h2>
<div class="flex flex-col md:flex-row items-start gap-6">
    <!-- left sidebar -->
    <div class="lg:w-52 hidden md:block w-1/6 flex-nowrap shrink-0">
        <ul class="space-y-4 text-brand-primary-300">
            @foreach ($sections as $section)
            @if($section === false)
            <li class="w-full h-px bg-gray-300"></li>
            @else
            <a href="{{ $section['url'] }}"
                @class([ 'w-full px-4 py-4 md:py-2 rounded flex items-center space-x-1 transition-all transform hover:bg-white'
                , 'bg-white shadow'=> $title == $section['title'],
                ])
                title="{{ $section['title']}}">
                <li class="flex flex-nowrap items-center gap-2">
                    {!!$section['icon']!!}
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
            @if($section === false)
            @continue
            @endif

            <option value="{{ $section['url'] }}" @selected($title==$section['title'])>{{$section['title']}}</option>
            @endforeach
        </select>
    </div>
    <div class="w-full flex-1 space-y-5">
        @yield('body')
    </div>

</div>


@endsection