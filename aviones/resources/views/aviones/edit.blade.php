@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Aviones
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($aviones, ['route' => ['aviones.update', $aviones->id], 'method' => 'patch']) !!}

                        @include('aviones.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection