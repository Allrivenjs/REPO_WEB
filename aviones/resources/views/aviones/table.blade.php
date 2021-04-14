<div class="table-responsive">
    <table class="table" id="aviones-table">
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Empresa</th>
                <th>Modelo</th>
                <th>Capacidad</th>
                <th>Disponibilidad</th>
                <th>Descripcion</th>
                <th colspan="3">Acción</th>
            </tr>
        </thead>
        <tbody>
        @foreach($aviones as $aviones)
            <tr>
                <td>{{ $aviones->codigoid }}</td>
                <td>
                    <span class="badge bg-blue">
                        {{ $aviones->companie }}
                    </span>
                </td>
                <td>{{ $aviones->modelo }}</td>
                <td>{{ $aviones->capacidad }}</td>
                <td>{{ $aviones->disponibilidad }}</td>
                <td>{{ $aviones->descripcion }}</td>
                <td>
                    {!! Form::open(['route' => ['aviones.destroy', $aviones->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('aviones.show', [$aviones->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('aviones.edit', [$aviones->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('¿Estas seguro?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
