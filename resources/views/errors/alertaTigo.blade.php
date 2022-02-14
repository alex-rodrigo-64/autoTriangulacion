@extends('layouts.app', ['page' => __('Icons'), 'pageSlug' => 'icons'])

@section('content')

<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title text-center" style="color: #a6ccff">¡¡¡ALERTA!!!</h3>
          </div>
          <div class="card-body">
            <div class="row justify-content-center">
              <div class="col-md-10">
                  <div class="card">
                    <h4 class="card-title text-center" style="color: #ffffff">
                        No se pudo subir el archivo Excel con exito
                    </h4>
                    <h4 class="card-title float-left" style="color: #ffffff">
                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                         &nbsp;&nbsp; Intenta:
                    </h4>
                    <h4 class="card-title float-left" style="color: #ffffff">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                         &nbsp;&nbsp;<i class="tim-icons icon-alert-circle-exc"></i>&nbsp;&nbsp;Revisar el tutorial de conversion de un archivo PDF a EXCEL
                    </h4>
                    <h4 class="card-title float-left" style="color: #ffffff">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     &nbsp;&nbsp;<i class="tim-icons icon-alert-circle-exc"></i>&nbsp;&nbsp;Revisar el contenido del Excel
                    </h4>
                  </div>
              </div>
            </div>
          </div>
        </div>
        <div class="text-center">
        <a href="{{ url('tigo/register/XLSX') }}" class="btn btn-sm btn-secondary">volver</a>
        </div>

    </div>
      </div>

@endsection