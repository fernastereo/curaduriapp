Hola {{ $solicitud->solicitante->nombre }}
Virficala en el siguiente link:
{{ route('solicituds.verify', $solcitud->token) }}