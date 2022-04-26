@extends('layouts.app', ['class' => 'login-page', 'page' => __(' '), 'contentClass' => 'login-page'])

@section('content')

<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title text-center" style="color: #a6ccff">USUARIO LOGEADO</h3>
          </div>
          <div class="card-body">
            <img src="{{ asset('images/errorLogin/error404.jpg') }}" width="600" height="400"
            class="rounded mx-auto d-block" alt="Responsive image">
            
          </div>
        </div>


    </div>
  </div>
@endsection