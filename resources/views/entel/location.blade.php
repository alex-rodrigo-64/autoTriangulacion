@extends('layouts.app', ['page' => __('ENTEL RADIO BASE'), 'pageSlug' => 'icons'])
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&key=AIzaSyD3T_I3XRvnKbXL4ppS9boJpphoyh0igiw"></script>
    
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title text-center">Radio Base {{$nombre}}</h4>
          </div>
          <div class="card-body">
            
            <div class="row justify-content-center">
              <div class="col-md-10">
                  <div class="card">
                          
                          <div class="text-center">

                            {!! $map['js'] !!}
                              {!! $map['html'] !!}

                            
                          </div>
                        
                  </div>
                  <a href="/entel/informe/registro/{{$registro}}/{{$filtrado}}/{{$fecha}}"  class="btn btn-sm btn-danger float-left" >Atras</a>
              </div>
            </div>
          </div>
        </div>
    </div>
    
      </div>
    

@endsection