@extends('forms.id._layout', ['title' => 'Configuration'])

@section('body')
    <!-- Form End Point -->
    @livewire('form-configuration.form-end-point', ['form' => $form])

    <!-- Form Details profiles -->
    @livewire('form-configuration.details', ['form' => $form])

    <!-- Submission Actions password -->
    @livewire('form-configuration.form-submission-action-password', ['form' => $form])
    
    <!-- Logo start -->
    @livewire('form-configuration.logo-start', ['form' => $form])
    
    <!-- Allowed Domains start -->
    @livewire('form-configuration.allowed-domain', ['form' => $form])
    
    <!-- Honeypot start -->
    @livewire('form-configuration.honey-pot-start', ['form' => $form])

    <!-- reCAPTCHA start -->
    @livewire('form-configuration.recaptcha', ['form' => $form])
    
    <!-- File upload -->
    @livewire('form-configuration.file-upload', ['form' => $form])
    
    <!-- Block Email -->
    @livewire('form-configuration.block-email', ['form' => $form])
  
    <!-- Delete form -->
    @livewire('form-configuration.delete-form', ['form' => $form])
@endsection
