<?php

namespace App\Providers;




use App\Models\TipoReserva;
use App\Models\aviones;
use App\Models\tarifas;
use App\Models\vuelos;
use App\Models\clientes;
use App\Models\empresas;

use Illuminate\Support\ServiceProvider;
use View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['reservas.fields'], function ($view) {
            $tipo_reservaItems = TipoReserva::pluck('titulo','id')->toArray();
            $view->with('tipo_reservaItems', $tipo_reservaItems);
        });
        View::composer(['reservas.fields'], function ($view) {
            $avioneItems = aviones::pluck('codigoid','id')->toArray();
            $view->with('avioneItems', $avioneItems);
        });
        View::composer(['reservas.fields'], function ($view) {
            $tarifaItems = tarifas::pluck('titulo','id')->toArray();
            $view->with('tarifaItems', $tarifaItems);
        });
        View::composer(['reservas.fields'], function ($view) {
            $vueloItems = vuelos::pluck('origen','id')->toArray();
            $view->with('vueloItems', $vueloItems);
        });
        View::composer(['reservas.fields'], function ($view) {
            $clienteItems = clientes::pluck('nombre','id')->toArray();
            $view->with('clienteItems', $clienteItems);
        });
        View::composer(['aviones.fields'], function ($view) {
            $empresaItems = empresas::pluck('companie','id')->toArray();
            $view->with('empresaItems', $empresaItems);
        });
        //
    }
}