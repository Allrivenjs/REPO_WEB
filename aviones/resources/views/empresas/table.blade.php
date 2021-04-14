<div class="table-responsive">
    <table class="table" id="empresas-table">
        <thead>
            <tr>
                <th>Compañia</th>
                <th>Nit</th>
                <th>Correo</th>
                <th>Representante</th>
                <th>Telefono</th>
                <th>Direccion</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($empresas as $empresas)
            <tr>
                <td>{{ $empresas->companie }}</td>
            <td>{{ $empresas->nit }}</td>
            <td>{{ $empresas->correo }}</td>
            <td>{{ $empresas->representante }}</td>
            <td>{{ $empresas->telefono }}</td>
            <td>{{ $empresas->direccion }}</td>
                <td>
                    {!! Form::open(['route' => ['empresas.destroy', $empresas->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('empresas.show', [$empresas->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('empresas.edit', [$empresas->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('¿Estas seguro?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
