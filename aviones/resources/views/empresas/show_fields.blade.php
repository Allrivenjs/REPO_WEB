<!-- Companie Field -->
<div class="form-group">
    {!! Form::label('Compañia', 'Compañia:') !!}
    <p>{{ $empresas->companie }}</p>
</div>

<!-- Nit Field -->
<div class="form-group">
    {!! Form::label('Nit', 'Nit:') !!}
    <p>{{ $empresas->nit }}</p>
</div>

<!-- Correo Field -->
<div class="form-group">
    {!! Form::label('Correo', 'Correo:') !!}
    <p>{{ $empresas->correo }}</p>
</div>

<!-- Representante Field -->
<div class="form-group">
    {!! Form::label('Representante', 'Representante:') !!}
    <p>{{ $empresas->representante }}</p>
</div>

<!-- Telefono Field -->
<div class="form-group">
    {!! Form::label('Telefono', 'Telefono:') !!}
    <p>{{ $empresas->telefono }}</p>
</div>

<!-- Direccion Field -->
<div class="form-group">
    {!! Form::label('Direccion', 'Direccion:') !!}
    <p>{{ $empresas->direccion }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Creado el:') !!}
    <p>{{ $empresas->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Ultima modificacion el:') !!}
    <p>{{ $empresas->updated_at }}</p>
</div>

