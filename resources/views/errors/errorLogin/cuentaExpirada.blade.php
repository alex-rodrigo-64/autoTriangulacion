@extends('layouts.app', ['class' => 'login-page', 'page' => __(' '), 'contentClass' => 'login-page'])

@section('content')

<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title text-center" style="color: #a6ccff">CUENTA EXPIRADA</h3>
            <h3 >Tu cuenta ha caducado, y ha sido suspendida, contacte con el administrador </h3>
                <img src="{{ asset('images/errorLogin/error404.jpg')}}" width="400" height="300"
                class="rounded mx-auto d-block" alt="Responsive image">
 


    </div>
  </div>
@endsection