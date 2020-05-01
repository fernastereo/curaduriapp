<p style="font-color: red;">
Hola {{ $solicitud->solicitante->nombre }}</p>
Virficala en el siguiente link:
{{ route('solicituds.verify', $solicitud->token) }}