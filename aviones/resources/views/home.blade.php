@extends('layouts.app')

@section('content')
<div class="container">
            <!--Aqui inicia el carrusel  -->
            
            <section class="content">


<!-- /.row -->

<!-- =========================================================== -->

<div class="row">
<div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="fa fa-bookmark-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Marcadores</span>
              <span class="info-box-number">20,320</span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description">
                    70% de aumento en 30 días
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
  <!-- /.col -->
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box bg-green">
      <span class="info-box-icon"><i class="fa fa-thumbs-o-up"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Me gustas</span>
        <span class="info-box-number">30,000</span>

        <div class="progress">
          <div class="progress-bar" style="width: 70%"></div>
        </div>
            <span class="progress-description">
                70% de aumento en 30 días
            </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box bg-yellow">
      <span class="info-box-icon"><i class="fa fa-calendar"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Eventos</span>
        <span class="info-box-number">200,200</span>

        <div class="progress">
          <div class="progress-bar" style="width: 70%"></div>
        </div>
            <span class="progress-description">
              90% de aumento en 30 días
            </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box bg-red">
      <span class="info-box-icon"><i class="fa fa-comments-o"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Comentarios</span>
        <span class="info-box-number">4,320</span>

        <div class="progress">
          <div class="progress-bar" style="width: 70%"></div>
        </div>
            <span class="progress-description">
                60% de aumento en 30 días
            </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->

<!-- =========================================================== -->




<!-- Small boxes (Stat box) -->
<div class="row">
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3>150</h3>

        <p>Nuevos pedidos</p>
      </div>
      <div class="icon">
        <i class="fa fa-shopping-cart"></i>
      </div>
      <a href="{{ route('reservas.index') }}" class="small-box-footer">
        Más información <i class="fa fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        <h3>10<sup style="font-size: 20px">%</sup></h3>

        <p>Tasa de rebote</p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
      <a href="#" class="small-box-footer">
        Más información <i class="fa fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3>50</h3>

        <p>Usuarios registrados</p>
      </div>
      <div class="icon">
        <i class="ion ion-person-add"></i>
      </div>
      <a href="{{ route('clientes.index') }}" class="small-box-footer">
        Más información <i class="fa fa-arrow-circle-right">
        <link href="#" rel="stylesheet">
        </i>
      </a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-red">
      <div class="inner">
        <h3>65</h3>

        <p>Visitantes</p>
      </div>
      <div class="icon">
        <i class="ion ion-pie-graph"></i>
      </div>
      <a href="#" class="small-box-footer">
        Más información <i class="fa fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>
  <!-- ./col -->
</div>
<!-- /.row -->
<!-- ==================================================================   -->

<!--
<div class="row">
        <div class="col-xs-12">
          </!-- interactive chart --/>
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-bar-chart-o"></i>

              <h3 class="box-title">Grafica vuelos los ultimos 100 dias</h3>

              <div class="box-tools pull-right">
                tiempo
                <div class="btn-group" id="realtime" data-toggle="btn-toggle">
                  <button type="button" class="btn btn-default btn-xs active" data-toggle="on">On</button>
                  <button type="button" class="btn btn-default btn-xs" data-toggle="off">Off</button>
                </div>
              </div>
            </div>
            <div class="box-body">
              <div id="interactive" style="height: 300px; padding: 0px; position: relative;">
              <canvas class="flot-base" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 534px; height: 300px;" width="534" height="300">
              </canvas><div class="flot-text" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);">
              <div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px;">
              <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 97px; top: 283px; left: 21px; text-align: center;">0</div>
              <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 47px; top: 283px; left: 69px; text-align: center;">10</div>
              <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 97px; top: 283px; left: 119px; text-align: center;">20</div>
              <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 47px; top: 283px; left: 170px; text-align: center;">30</div>
              <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 97px; top: 283px; left: 221px; text-align: center;">40</div>
              <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 47px; top: 283px; left: 271px; text-align: center;">50</div>
              <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 97px; top: 283px; left: 322px; text-align: center;">60</div>
              <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 47px; top: 283px; left: 372px; text-align: center;">70</div>
              <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 97px; top: 283px; left: 423px; text-align: center;">80</div>
              <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 47px; top: 283px; left: 474px; text-align: center;">90</div>
              <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 47px; top: 283px; left: 525px; text-align: center;">100</div>
              </div><div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px;">
              <div class="flot-tick-label tickLabel" style="position: absolute; top: 270px; left: 13px; text-align: right;">0</div>
              <div class="flot-tick-label tickLabel" style="position: absolute; top: 216px; left: 7px; text-align: right;">20</div>
              <div class="flot-tick-label tickLabel" style="position: absolute; top: 162px; left: 7px; text-align: right;">40</div>
              <div class="flot-tick-label tickLabel" style="position: absolute; top: 108px; left: 7px; text-align: right;">60</div>
              <div class="flot-tick-label tickLabel" style="position: absolute; top: 54px; left: 7px; text-align: right;">80</div>
              <div class="flot-tick-label tickLabel" style="position: absolute; top: 0px; left: 1px; text-align: right;">100</div>
              </div></div><canvas class="flot-overlay" width="534" height="300" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 534px; height: 300px;"></canvas>
              </div>
            </div>
            </!-- /.box-body--/>
          </div>
          </!-- /.box --/>

        </div>
        <!/-- /.col --/>
        -->
      </div>



</section>
  
          
            <!--Aqui termina el carrusel -->

            <div class="row"> 

                   
    </div>
    
</div>
@endsection
