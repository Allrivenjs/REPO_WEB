<div class="table-responsive">
    <table class="table" id="clientes-table">
        <thead>
            <tr>
                <th>Nombres</th>
                <th>Tipo de identificación</th>
                <th>Identificacion</th>
                <th>Telefono</th>
                <th>Correo</th>
                <th>Direccion</th>
                <th>Edad</th>
                <th>Sexo</th>
                <th colspan="3">Acción</th>
            </tr>
        </thead>
        <tbody>
        @foreach($clientes as $clientes)
            <tr>
                <td>{{ $clientes->nombre }}</td>
                <td>{{ $clientes->tipoId }}</td>
                <td>{{ $clientes->identificacion }}</td>
                <td>{{ $clientes->telefono }}</td>
                <td>{{ $clientes->correo }}</td>
                <td>{{ $clientes->direccion }}</td>
                <td>{{ $clientes->edad }}</td>
                <td>{{ $clientes->sexo }}</td>
                <td>
                    {!! Form::open(['route' => ['clientes.destroy', $clientes->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('clientes.show', [$clientes->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('clientes.edit', [$clientes->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('¿Estas seguro?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
