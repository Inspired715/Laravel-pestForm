<x-mail::message>

# New submission to form: {{ $form->title }}

<br>
<x-mail::table>
| Field | Value | Type |
| :---- | :---- | :--- |
@foreach ($submission->data as $d)
| {{ $d['name'] }} | {{ $d['value'] }} | {{ $d['type'] }}
@endforeach
</x-mail::table>

<x-mail::button url="{{ route('forms.id.index', $form->slug) }}">
See all submissions
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}

</x-mail::message>
