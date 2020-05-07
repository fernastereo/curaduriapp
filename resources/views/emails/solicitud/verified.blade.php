@component('mail::message', ['curaduria' => $solicitud->curaduria->numero, 'imagen' => ''])
Hola Curaduría Urbana N° {{ $solicitud->curaduria->numero }} de {{ $solicitud->curaduria->ciudad->nombre }}. Se ha recibido una nueva solicitud a través de tu página web!


@component('mail::panel')
<h2>Datos Solicitante</h2>
Solcitante: <strong>{{ $solicitud->solicitante->nombre }}.</strong>
<br>
Teléfono: <strong>{{ $solicitud->solicitante->telefono }}.</strong>
<br>
E-mail: <a href="mailto:{{ $solicitud->solicitante->email }}">{{ $solicitud->solicitante->email }}</a>
<br>
Fecha Solicitud: <strong>{{ $solicitud->solicitante->created_at }}.</strong>
@endcomponent

@component('mail::panel')
<h2>Datos Del Proyecto</h2>
Objeto de la Licencia: <strong>{{ $solicitud->objetolicencia->nombre }}.</strong>
<br>
Licencia Anterior: <strong>{{ $solicitud->solicitante->licenciaanteriornumero }} - {{ $solicitud->solicitante->licenciaanteriorvigecia }}</strong>
<br>
Modalidad: <strong>{{ $solicitud->modalidad->nombre }}.</strong>
<br>
Descripción: {{ $solicitud->descripcion }}
@endcomponent

@component('mail::panel')
<h2>Anexos: {{ $solicitud->solicitudanexos->count() }}</h2>
@php
    $i = 1;
@endphp
@foreach ($solicitud->solicitudanexos as $anexo)
| <a href="{{ $anexo->file }}">Anexo {{ $i++ }}</a> |
@endforeach
@endcomponent

Gracias por utilizar nuestros servicios.<br>
<strong>Equipo CuraduriAPP®</strong>
@endcomponent
