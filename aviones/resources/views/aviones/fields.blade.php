<!-- Codigoid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('codigoid', 'Codigo:') !!}
    {!! Form::text('codigoid', null, ['class' => 'form-control']) !!}
</div>

<!-- Empresa Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('empresa_id', 'Empresa:') !!}
    {!! Form::select('empresa_id', $empresaItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Modelo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('modelo', 'Modelo:') !!}
    {!! Form::text('modelo', null, ['class' => 'form-control']) !!}
</div>

<!-- Capacidad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('capacidad', 'Capacidad:') !!}
    {!! Form::number('capacidad', null, ['class' => 'form-control']) !!}
</div>

<!-- Disponibilidad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('disponibilidad', 'Disponibilidad:') !!}
    {!! Form::number('disponibilidad', null, ['class' => 'form-control']) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::textarea('descripcion', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('aviones.index') }}" class="btn btn-default">Cancelar</a>
</div>
