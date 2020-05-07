@component('mail::message', ['curaduria' => $solicitud->curaduria->numero])
Hola {{ $solicitud->solicitante->nombre }}. Se ha recibido una nueva solicitud!

Nuestro equipo de profesionales pronto se pondrá en contacto con usted para indicarle los pasos a seguir dentro de si proceso de solicitud de licencia.
@component('mail::table')
| Anexo         |
| ------------- |
@foreach ($solicitud->solicitudanexos as $anexo)
| {{ $anexo->file }} |
@endforeach

@endcomponent
Muchas Gracias.<br>
Curaduría Urbana N° {{ $solicitud->curaduria->numero }}
@endcomponent
