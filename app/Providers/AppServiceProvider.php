<?php

namespace App\Providers;

use App\Solicitud;
use App\Mail\SolicitudCreated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
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
        Schema::defaultStringLength(191);

        Solicitud::created(function($solicitud){
            Mail::to($solicitud->solicitante->email)->send(New SolicitudCreated($solicitud));
        });
    }
}
