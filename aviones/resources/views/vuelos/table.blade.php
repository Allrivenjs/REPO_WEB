<div class="table-responsive">
    <table class="table" id="vuelos-table">
        <thead>
            <tr>
                <th>Origen</th>
        <th>Destino</th>
        <th>Fecha</th>
                <th colspan="3">Acción</th>
            </tr>
        </thead>
        <tbody>
        @foreach($vuelos as $vuelos)
            <tr>
                <td>{{ $vuelos->origen }}</td>
            <td>{{ $vuelos->destino }}</td>
            <td>{{ $vuelos->fecha }}</td>
                <td>
                    {!! Form::open(['route' => ['vuelos.destroy', $vuelos->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('vuelos.show', [$vuelos->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('vuelos.edit', [$vuelos->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('¿Estas seguro?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
