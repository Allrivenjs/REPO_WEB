@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tipo Reserva
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($tipoReserva, ['route' => ['tipoReservas.update', $tipoReserva->id], 'method' => 'patch']) !!}

                        @include('tipo_reservas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection