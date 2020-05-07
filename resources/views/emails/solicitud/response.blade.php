@component('mail::message', ['curaduria' => $solicitud->curaduria->numero])
Hola {{ $solicitud->solicitante->nombre }}. Su solicitud ha sido recibida!

Nuestro equipo de profesionales pronto se pondrá en contacto con usted para indicarle los pasos a seguir dentro de si proceso de solicitud de licencia.

Muchas Gracias.<br>
Curaduría Urbana N° {{ $solicitud->curaduria->numero }}
@endcomponent
