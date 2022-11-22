@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')
        <style>
        .padre {
            display: flex;
            align-items: center;
        }

        .hijo {
            line-height: 200px; //Damos 200px de alto para notar el efecto
        }
        </style>

@if (Auth::user()->id !=  1)
    

<div class="form-row text-center">
    <div class="col-12">
        <div class="row">
            <div class="col-lg-4">
                <button type="button" class="btn btn-default">
                    <a href="{{url('/viva/register')}}">
                        <h3 class="card-title"><i class="tim-icons icon-send text-success"></i>VIVA</h3>
                    <img src="{{ asset('images/carrierLogo/viva.png') }}" width="300" height="250"
                        class="rounded mx-auto d-block" alt="Responsive image">
                    </a>
                </button>
            </div>
            <div class="col-lg-4">
                <button type="button" class="btn btn-default">
                    <a href="{{url('/tigo/register')}}">
                    <h3 class="card-title"><i class="tim-icons icon-send text-info"></i>TIGO</h3>
                    <img src="{{ asset('images/carrierLogo/tigo.jpg') }}" width="300" height="250"
                        class="rounded mx-auto d-block" alt="Responsive image">
                </button>
                    <a type="button" class="btn btn-default" href="/tigo/register/XLSX/view">Ver Proyecto</a>
                    <a class="btn btn-default btn-danger right text-white" data-toggle="modal" data-target="#example4"><span class="btn-inner--icon "><i class="tim-icons icon-trash-simple"></i></span></a>
            </div>
            <div class="col-lg-4">
                <button type="button" class="btn btn-default">
                    <a href="{{url('/entel/register')}}">
                    <h3 class="card-title"><i class="tim-icons icon-send text-danger"></i>ENTEL</h3>
                    <img src="{{ asset('images/carrierLogo/entel.jpg') }}" width="300" height="250"
                        class="rounded mx-auto d-block" alt="Responsive image">
                </button>
                    <a type="button" class="btn btn-default" href="/entel/register/XLSX/view">Ver Proyecto</a>
                    <a class="btn btn-default btn-danger right text-white" data-toggle="modal" data-target="#example5" ><span class="btn-inner--icon "><i class="tim-icons icon-trash-simple"></i></span></a>
            </div>
        </div>
    </div>
 </div>

 <!-- Modal 1-->
 <div class="modal fade" id="example4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h5 class="text-center" style="color: blue">¿Esta seguro de querer eliminar este registro para siempre?</h5>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Rechazar</button>
          <a href=" {{ url('/tigo/borrar')}}" type="button" class="btn btn-primary">Aceptar</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal 2-->
 <div class="modal fade" id="example5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h5 class="text-center" style="color: blue">¿Esta seguro de querer eliminar este registro para siempre?</h5>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Rechazar</button>
          <a href=" {{ url('/entel/borrar')}}" type="button" class="btn btn-primary">Aceptar</a>
        </div>
      </div>
    </div>
  </div>

 @endif
@endsection

@push('js')
<script src="{{ asset('black') }}/js/plugins/chartjs.min.js"></script>
<script>
$(document).ready(function() {
    demo.initDashboardPageCharts();
});
</script>
@endpush