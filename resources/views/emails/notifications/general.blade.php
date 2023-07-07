@component('mail::message')
# {{ $title }}

{{ $body }}


@component('mail::button', ['url' => $button_url])
{{ $button_text }}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
