<!-- Companie Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Compañia', 'Companie:') !!}
    {!! Form::text('companie', null, ['class' => 'form-control']) !!}
</div>

<!-- Nit Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Nit', 'Nit:') !!}
    {!! Form::text('nit', null, ['class' => 'form-control']) !!}
</div>

<!-- Correo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Correo', 'Correo:') !!}
    {!! Form::email('correo', null, ['class' => 'form-control']) !!}
</div>

<!-- Representante Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Representante', 'Representante:') !!}
    {!! Form::text('representante', null, ['class' => 'form-control']) !!}
</div>

<!-- Telefono Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Telefono', 'Telefono:') !!}
    {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
</div>

<!-- Direccion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Direccion', 'Direccion:') !!}
    {!! Form::text('direccion', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('empresas.index') }}" class="btn btn-default">Cancelar</a>
</div>
