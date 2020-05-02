@component('mail::message', ['curaduria' => $solicitud->curaduria->numero])
Su solicitud ha sido recibida!
@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
