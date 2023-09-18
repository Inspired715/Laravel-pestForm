@extends('_layout', ['title' => 'New Form'])

@section('page')
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-2xl text-brand-primary-400">
            New Form
        </h2>
    </div>
    <!-- fomr body -->
    <div class="p-4 md:p-8 w-full bg-white border-t-2 border-gray-dark shadow rounded-2xl">
        <h3 class="text-xl text-brand-primary-400 font-semibold mb-4 pb-2 border-b border-gray-200">Form Details</h3>
        <!-- form block -->
        @livewire('create-form')
    </div>
@endsection
