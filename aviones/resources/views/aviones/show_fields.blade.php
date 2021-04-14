<!-- Codigoid Field -->
<div class="form-group">
    {!! Form::label('codigoid', 'Codigoid:') !!}
    <p>{{ $aviones->codigoid }}</p>
</div>

<!-- Empresa Id Field -->
<div class="form-group">
    {!! Form::label('empresa_id', 'Empresa Id:') !!}
    <p>{{ $aviones->empresa_id }}</p>
</div>

<!-- Modelo Field -->
<div class="form-group">
    {!! Form::label('modelo', 'Modelo:') !!}
    <p>{{ $aviones->modelo }}</p>
</div>

<!-- Capacidad Field -->
<div class="form-group">
    {!! Form::label('capacidad', 'Capacidad:') !!}
    <p>{{ $aviones->capacidad }}</p>
</div>

<!-- Disponibilidad Field -->
<div class="form-group">
    {!! Form::label('disponibilidad', 'Disponibilidad:') !!}
    <p>{{ $aviones->disponibilidad }}</p>
</div>

<!-- Descripcion Field -->
<div class="form-group">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    <p>{{ $aviones->descripcion }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Creado el:') !!}
    <p>{{ $aviones->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Ultima modificacion el:') !!}
    <p>{{ $aviones->updated_at }}</p>
</div>

