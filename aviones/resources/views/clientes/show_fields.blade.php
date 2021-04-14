<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{{ $clientes->nombre }}</p>
</div>

<!-- Tipoid Field -->
<div class="form-group">
    {!! Form::label('tipo', 'Tipoid:') !!}
    <p>{{ $clientes->tipoId }}</p>
</div>

<!-- Identificacion Field -->
<div class="form-group">
    {!! Form::label('identificacion', 'Identificacion:') !!}
    <p>{{ $clientes->identificacion }}</p>
</div>

<!-- Telefono Field -->
<div class="form-group">
    {!! Form::label('telefono', 'Telefono:') !!}
    <p>{{ $clientes->telefono }}</p>
</div>

<!-- Correo Field -->
<div class="form-group">
    {!! Form::label('correo', 'Correo:') !!}
    <p>{{ $clientes->correo }}</p>
</div>

<!-- Direccion Field -->
<div class="form-group">
    {!! Form::label('direccion', 'Direccion:') !!}
    <p>{{ $clientes->direccion }}</p>
</div>

<!-- Edad Field -->
<div class="form-group">
    {!! Form::label('edad', 'Edad:') !!}
    <p>{{ $clientes->edad }}</p>
</div>

<!-- Sexo Field -->
<div class="form-group">
    {!! Form::label('sexo', 'Sexo:') !!}
    <p>{{ $clientes->sexo }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Creado el:') !!}
    <p>{{ $clientes->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Ultima modificacion el:') !!}
    <p>{{ $clientes->updated_at }}</p>
</div>

