@component('mail::message', ['curaduria' => $solicitud->curaduria->numero, 'imagen' => 'http://lorempixel.com/640/480/'])
Hola {{ $solicitud->solicitante->nombre }}

Reciba un cordial saludo de la Curaduría Urbana N° {{ $solicitud->curaduria->numero }}. Hemos recibido su solicitud y sus documentos adjuntos, para continuar con la revisión de la información por favor verifique su correo electrónico haciendo click en el siguiente link:

@component('mail::button', ['url' => route('solicituds.verify', $solicitud->token)])
Confirmar E-mail
@endcomponent

Gracias,<br>
Curaduría Urbana N° {{ $solicitud->curaduria->numero }}
@endcomponent
