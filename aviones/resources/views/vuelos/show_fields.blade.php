<!-- Origen Field -->
<div class="form-group">
    {!! Form::label('origen', 'Origen:') !!}
    <p>{{ $vuelos->origen }}</p>
</div>

<!-- Destino Field -->
<div class="form-group">
    {!! Form::label('destino', 'Destino:') !!}
    <p>{{ $vuelos->destino }}</p>
</div>

<!-- Fecha Field -->
<div class="form-group">
    {!! Form::label('fecha', 'Fecha:') !!}
    <p>{{ $vuelos->fecha }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Creado el:') !!}
    <p>{{ $vuelos->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Ultima modificacion el:') !!}
    <p>{{ $vuelos->updated_at }}</p>
</div>

