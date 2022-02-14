@extends('layouts.app', ['page' => __('ENTEL'), 'pageSlug' => 'icons'])
@section('content')

  <style>
    
    
   th, td {
      width: 2%;
      text-align: left;
      vertical-align: top;
      text-align: center;
      background: linear-gradient(100deg, #4F94F8, rgb(27, 106, 255));
      border: 1px solid #000;
   }
  </style>

<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title text-center">Informe de Geolocalizacion Basado en Registro de Llamadas</h4>
          </div>
          <div class="card-body">
            
            <div class="row justify-content-center">
              <div class="col-md-10">
                  <div class="card">

                   <table class="table">
                      <tbody>
                            <tr>
                      @for ($i = 1; $i <= count($nuevo) ; $i++)
                          @if ($i % 7 != 0)
                              
                                <td ><a class="text-white" href="/tigo/informe/registro/{{$registro}}/{{$filtrado}}/{{$nuevo[$i-1]}}"><b>{{$nuevo[$i-1]}}</b></a></td>
                              
                          @else
                                <td ><a class="text-white" href="/tigo/informe/registro/{{$registro}}/{{$filtrado}}/{{$nuevo[$i-1]}}"><b>{{$nuevo[$i-1]}}</b></a></td>
                              </tr>
                            <tr>
                          @endif
                       
                      @endfor
                        
                      </tbody>
                    </table>
                   

                      </div>

                      <a href="/tigo/informe/registro/{{$registro}}"  class="btn btn-sm btn-danger float-left" >Atras</a>
                    </div>
                
                  </div>
                 
              </div>
            </div>
          </div>
        </div>
    

@endsection