@php
$max_forms = auth()->user()->max_forms();
$forms_count = auth()->user()->forms()->count();
@endphp

@if($forms_count > $max_forms)
<div class=" bg-yellow-100 p-4 border border-yellow-500 mb-8">
    <p>
        You currently have more forms ({{ $forms_count }}) than your plan allows ({{ $max_forms }}).
        Your {{ $forms_count - $max_forms }} oldest forms are automatically supended and can't be used until you upgrade
        your plan.
    </p>
</div>
@endif