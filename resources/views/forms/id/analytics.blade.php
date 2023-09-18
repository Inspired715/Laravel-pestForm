@extends('forms.id._layout', ['title' => 'Analytics'])

@section('body')
    @livewire('form-analytics', [
        'form' => $form,
    ])
@endsection
