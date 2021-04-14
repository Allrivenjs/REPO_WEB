<!-- Cliente Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cliente_id', 'Cliente:') !!}
    {!! Form::select('cliente_id', $clienteItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Vuelo Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('vuelo_id', 'Vuelo:') !!}
    {!! Form::select('vuelo_id', $vueloItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Tarifa Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tarifa_id', 'Tarifa:') !!}
    {!! Form::select('tarifa_id', $tarifaItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Avion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('avion_id', 'Avion:') !!}
    {!! Form::select('avion_id', $avioneItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Tiporeserva Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipoReserva_id', 'Tipo reserva:') !!}
    {!! Form::select('tipoReserva_id', $tipo_reservaItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Fecha Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha', 'Fecha:') !!}
    {!! Form::text('fecha', null, ['class' => 'form-control','id'=>'fecha']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#fecha').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Estado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estado', 'Estado:') !!}
    {!! Form::select('estado', ['Pendiente' => 'Pendiente', 'En proceso' => ' En proceso','Finalizado' => ' Finalizado'], null, ['class' => 'form-control']) !!}
</div>

<!-- Cantidad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cantidad', 'Cantidad:') !!}
    {!! Form::number('cantidad', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('reservas.index') }}" class="btn btn-default">Cancelar</a>
</div>
