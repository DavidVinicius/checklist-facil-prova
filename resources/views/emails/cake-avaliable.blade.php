@component('mail::message')
# Bolo disponível!

O bolo {{$cake->name}} está disponível.


@component('mail::button', ['url' => ''])
Ver bolo
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
