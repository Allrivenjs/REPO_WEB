<div class="table-responsive">
    <table class="table" id="tipoReservas-table">
        <thead>
            <tr>
                <th>Titulo</th>
        <th>Descripcion</th>
                <th colspan="3">Acción</th>
            </tr>
        </thead>
        <tbody>
        @foreach($tipoReservas as $tipoReserva)
            <tr>
                <td>{{ $tipoReserva->titulo }}</td>
            <td>{{ $tipoReserva->descripcion }}</td>
                <td>
                    {!! Form::open(['route' => ['tipoReservas.destroy', $tipoReserva->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('tipoReservas.show', [$tipoReserva->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('tipoReservas.edit', [$tipoReserva->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('¿Estas seguro?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
