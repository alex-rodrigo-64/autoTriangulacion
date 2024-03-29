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
    
    <div class="col-md-10"> {{-- <a href="/entel/informe/registros/pdf/{{$registro}}" class="btn btn-sm btn-warning float-right" >PDF</a>--}}
        <div class="card">
          <div class="card-header">
            <h4 class="card-title text-center"><b>FILTRADO DE NUMEROS IMPLICADOS DEL REGISTRO FLUJO DE LLAMADAS DE {{$registro}}</b></h4>
          </div>
         
          <div class="card-body">
            
            <div class="row justify-content-center">
              <div class="col-md-10">
                  <div class="card">

                   <table class="table">
                      <tbody>
                            <tr>
                        @for ($i = 1; $i <= count($lista) ; $i++)
                        
                            @if ($i % 4 != 0)
                                  
                                  <td>
                                  <a class="text-white" type="button"  href="/tigo/informe/registro/{{$registro}}/{{$lista[$i-1]['identificador']}}">
                                  <b>{{$lista[$i-1]['identificador']}}
                                    <br>
                                    @if ($lista[$i-1]['nombre'] != "vacio")
                                    {{$lista[$i-1]['nombre']}}
                                    @endif
                                  </b>
                                  </a>
                                  </td>
                                
                            @else
                                      <td>
                                      <a class="text-white" type="button"  href="/tigo/informe/registro/{{$registro}}/{{$lista[$i-1]['identificador']}}">
                                      <b>{{$lista[$i-1]['identificador']}}
                                        <br>
                                        @if ($lista[$i-1]['nombre'] != "vacio")
                                        {{$lista[$i-1]['nombre']}}
                                        @endif
                                      </b>
                                      </a>
                                      </td>
                                      </tr>
                                    <tr>
                            @endif
                        
                        @endfor
                        
                      </tbody>
                    </table>
                   

                      </div>

                      <a href="{{ url('tigo/informe/registro') }}"  class="btn btn-sm btn-danger float-left" >Atras</a>
                    </div>
                
                  </div>
                 
              </div>
            </div>
          </div>
        </div>
    

@endsection