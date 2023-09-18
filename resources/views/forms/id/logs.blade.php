@extends('forms.id._layout', ['title' => 'Logs'])

@section('body')

    @livewire('form-log', [
        'form' => $form
    ])
@endsection
