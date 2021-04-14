<div class="table-responsive">
    <table class="table" id="reservas-table">
        <thead>
            <tr>
                    <th>Cliente</th>
                    <th>Vuelo </th>
                    <th>Tarifa </th>
                    <th>Avion </th>
                    <th>Tipo reserva</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                    <th>Cantidad</th>
                <th colspan="3">Accción</th>
            </tr>
        </thead>
        <tbody>
        @foreach($reservas as $reservas)
            <tr>
                <td>{{ $reservas->cliente_id }}
                  <!--  <span class="badge bg-blue">
                        {{ $reservas->nombre}}
                    </span>-->
                </td>
            <td>{{ $reservas->nombre }}</td>
            <td>{{ $reservas->tarifa }}</td>
            <td>Avión [ {{ $reservas->avion }} ]</td>
            <td align="center">{{ $reservas->tipoReserva }}</td>
            <td>{{ $reservas->fecha }}</td>
            <td>{{ $reservas->estado }}</td>
            <td>{{ $reservas->cantidad }}</td>
                <td>
                    {!! Form::open(['route' => ['reservas.destroy', $reservas->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('reservas.show', [$reservas->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('reservas.edit', [$reservas->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('¿Estas seguro?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
