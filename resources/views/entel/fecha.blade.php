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

                    @for ($i = 0; $i < $cant; $i++)

                    @for ($j = 0; $j < count($nuevo[$i]) ; $j++)
                            <?php $a = substr($nuevo[$i][$j]->fecha, 0, -9);
                                  $b = substr($nuevo[$i][$j]->fecha, 10);

                                  
                                  $nombreA = DB::table('entels')
                                            ->select('nombre')
                                            ->where('numero_usuario','=',$nuevo[$i][$j]->numeroA)
                                            ->exists();
                                if ($nombreA == true){
                                      $nombreA = DB::table('entels')
                                          ->select('nombre')
                                          ->where('numero_usuario','=',$nuevo[$i][$j]->numeroA)
                                          ->get();

                                      foreach ($nombreA as $nombreA){
                                          $nombreA = $nombreA->nombre;
                                      }
                                }else{
                                      $nombreA = 'vacio';
                                }
                                
                                $nombreB = DB::table('entels')
                                            ->select('nombre')
                                            ->where('numero_usuario','=',$nuevo[$i][$j]->numeroB)
                                            ->exists();
                                          
                                if ($nombreB == true){
                                      $nombreB = DB::table('entels')
                                            ->select('nombre')
                                            ->where('numero_usuario','=',$nuevo[$i][$j]->numeroB)
                                            ->get();
                                      foreach ($nombreB as $nombreB){
                                        $nombreB = $nombreB->nombre;
                                      } 
                                }else{
                                      $nombreB = 'vacio';
                                }     
                                
                                
                                
                                
                            ?>
                         
                            
                        @if ($nuevo[$i][$j]->tiempo != "00:00:00")
                        <ul style= "list-style-type: square;"><li>
                            <h4 align = "justify">EN FECHA {{$a}} a horas {{$b}} el usuario del número {{$nuevo[$i][$j]->numeroA}} @if ($nombreA != 'vacio')registrado a nombre de {{$nombreA}}, @else con datos de usuario desconocido @endif 
                                <b>toma</b> contacto por {{$nuevo[$i][$j]->tiempo}} segundos, @if ($nuevo[$i][$j]->radio_baseA != '-')
                                    empleando la radio base <a href="/entel/informe/registro/{{$registro}}/{{$filtrado}}/{{$a}}/{{$nuevo[$i][$j]->coordenadaA}}/{{1 .$b}}">{{$nuevo[$i][$j]->radio_baseA}}</a>, @else empleando una radio base DESCONOCIDA, @endif con el número {{$nuevo[$i][$j]->numeroB}} 
                                @if ($nombreB != 'vacio')registrado a nombre de {{$nombreB}}, @else con datos de usuario desconocido @endif , @if ($nuevo[$i][$j]->radio_baseB == '-')
                                para este último empleó una radio base DESCONOCIDA.@else para este último empleó una radio base <a href="/entel/informe/registro/{{$registro}}/{{$filtrado}}/{{$a}}/{{$nuevo[$i][$j]->coordenadaB}}/{{2 .$b}}">{{$nuevo[$i][$j]->radio_baseB}}</a>.@endif 
                            </h4></li></ul>
                        @else
                        <ul style= "list-style-type: square;"><li>
                        <h4 align = "justify">EN FECHA {{$a}} a horas {{$b}} el usuario del número {{$nuevo[$i][$j]->numeroA}} @if ($nombreA != 'vacio')registrado a nombre de {{$nombreA}}, @else con datos de usuario desconocido @endif 
                          <b>intenta</b> tomar contacto (llamada perdida),  @if ($nuevo[$i][$j]->radio_baseA != '-')
                          empleando la radio base <a href="/entel/informe/registro/{{$registro}}/{{$filtrado}}/{{$a}}/{{$nuevo[$i][$j]->coordenadaA}}/{{1 .$b}}">{{$nuevo[$i][$j]->radio_baseA}}</a>, @else empleando una radio base DESCONOCIDA, @endif al número {{$nuevo[$i][$j]->numeroB}} 
                          @if ($nombreB != 'vacio')registrado a nombre de {{$nombreB}}, @else con datos de usuario desconocido @endif , @if ($nuevo[$i][$j]->radio_baseB == '-')
                          para este último empleó una radio base DESCONOCIDA.@else para este último empleó una radio base <a href="/entel/informe/registro/{{$registro}}/{{$filtrado}}/{{$a}}/{{$nuevo[$i][$j]->coordenadaB}}/{{2 .$b}}">{{$nuevo[$i][$j]->radio_baseB}}</a>.@endif
                      </h4></li></ul>
                            
                        @endif
                    @endfor
                    <br>
                   @endfor
                   

                      </div>

                      <a href="/entel/informe/registro/{{$registro}}/{{$filtrado}}"  class="btn btn-sm btn-danger float-left" >Atras</a>
                    </div>
                
                  </div>
                 
              </div>
            </div>
          </div>
        </div>
    

@endsection