@component('mail::message', ['curaduria' => $solicitud->curaduria->numero, 'imagen' => $solicitud->curaduria->logo])
Hola {{ $solicitud->solicitante->nombre }}. Su solicitud ha sido recibida!

Nuestro equipo de profesionales pronto se pondrá en contacto con usted para indicarle los pasos a seguir dentro de el proceso de solicitud de licencia.

Muchas Gracias por elegirnos.<br>
Curaduría Urbana N° {{ $solicitud->curaduria->numero }} de {{ $solicitud->curaduria->ciudad->nombre }}
@endcomponent
