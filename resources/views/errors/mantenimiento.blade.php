@extends('layouts.app', ['page' => __('Icons'), 'pageSlug' => 'icons'])

@section('content')

<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title text-center" style="color: #a6ccff">¡¡¡ALERTA!!!</h3>
          </div>
          <div class="card-body">
            <img src="{{ asset('images/mantenimiento.jpg') }}" width="600" height="400"
            class="rounded mx-auto d-block" alt="Responsive image">
            
          </div>
        </div>
        <div class="text-center">
        <a href="{{ url('/home') }}" class="btn btn-sm btn-secondary">volver</a>
        </div>

    </div>
      </div>

@endsection