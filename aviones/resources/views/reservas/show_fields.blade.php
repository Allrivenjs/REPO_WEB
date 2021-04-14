<!-- Cliente Id Field -->
<div class="form-group">
    {!! Form::label('Cliente', 'Cliente:') !!}
    <p>{{ $reservas->cliente_id }}</p>
</div>

<!-- Vuelo Id Field -->
<div class="form-group">
    {!! Form::label('Vuelo', 'Vuelo:') !!}
    <p>{{ $reservas->vuelo_id }}</p>
</div>

<!-- Tarifa Id Field -->
<div class="form-group">
    {!! Form::label('Tarifa', 'Tarifa:') !!}
    <p>{{ $reservas->tarifa_id }}</p>
</div>

<!-- Avion Id Field -->
<div class="form-group">
    {!! Form::label('Avion', 'Avion:') !!}
    <p>{{ $reservas->avion_id }}</p>
</div>

<!-- Tiporeserva Id Field -->
<div class="form-group">
    {!! Form::label('Tipo reserva', 'Tipo reserva:') !!}
    <p>{{ $reservas->tipoReserva_id }}</p>
</div>

<!-- Fecha Field -->
<div class="form-group">
    {!! Form::label('Fecha', 'Fecha:') !!}
    <p>{{ $reservas->fecha }}</p>
</div>

<!-- Estado Field -->
<div class="form-group">
    {!! Form::label('Estado', 'Estado:') !!}
    <p>{{ $reservas->estado }}</p>
</div>

<!-- Cantidad Field -->
<div class="form-group">
    {!! Form::label('Cantidad', 'Cantidad:') !!}
    <p>{{ $reservas->cantidad }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Creado el:') !!}
    <p>{{ $reservas->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Ultima modificacion el:') !!}
    <p>{{ $reservas->updated_at }}</p>
</div>

