@extends('layouts.app')

@section('content')
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
         @include('carrusel.carrusel')
</div>
    <div class="header py-7 py-lg-8">
        <div class="container">
            <div class="header-body text-center mb-7">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6">
                        <h1 class="text-white">{{ __('Triangulacion de Llamadas') }}</h1>
                        <p class="text-lead text-light">
                            {{ __('¿Que es la triangulacion de llamadas?') }}
                        </p>
                        <div>
                            <p class="text-lead text-light">
                                {{__('Permiten determinar la posición de un dispositivo de telefonía móvil,
                                 lo hacen con un amplio margen de error que puede ir desde un par de metros hasta 
                                 cientos de kilómetros.')}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
