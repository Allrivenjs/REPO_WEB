<li>
<a href="/home" class="nav-link">
                        <i class="glyphicon glyphicon-home"></i>
                        <span class="title">Home</span>
                        <span class="selected"></span>
                    </a>
</li>

<li class="{{ Request::is('aviones*') ? 'active' : '' }}">
    <a href="{{ route('aviones.index') }}"><i class="fa fa-plane"></i><span>Aviones</span></a>
</li>

<li class="{{ Request::is('clientes*') ? 'active' : '' }}">
    <a href="{{ route('clientes.index') }}"><i class="fa fa-users"></i><span>Clientes</span></a>
</li>

<li class="{{ Request::is('empresas*') ? 'active' : '' }}">
    <a href="{{ route('empresas.index') }}"><i class="fa fa-building"></i><span>Empresas</span></a>
</li>

<li class="{{ Request::is('tipoReservas*') ? 'active' : '' }}">
    <a href="{{ route('tipoReservas.index') }}"><i class="fa fa-database"></i><span>Tipo Reservas</span></a>
</li>

<li class="{{ Request::is('tarifas*') ? 'active' : '' }}">
    <a href="{{ route('tarifas.index') }}"><i class="fa fa-list-alt"></i><span>Tarifas</span></a>
</li>

<li class="{{ Request::is('vuelos*') ? 'active' : '' }}">
    <a href="{{ route('vuelos.index') }}"><i class="glyphicon glyphicon-plane"></i><span>Vuelos</span></a>
</li>

<li class="{{ Request::is('reservas*') ? 'active' : '' }}">
    <a href="{{ route('reservas.index') }}"><i class="fa fa-archive"></i><span>Reservas</span></a>
</li>

