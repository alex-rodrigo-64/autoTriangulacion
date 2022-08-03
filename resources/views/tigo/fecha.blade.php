@extends('layouts.app', ['page' => __('TIGO'), 'pageSlug' => 'icons'])
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

                    @for ($i = 0; $i < sizeof($lista); $i++)
                    @for ($j = 0; $j < count($lista[$i]) ; $j++)
                            <?php $a = str_replace("/", "-", substr($lista[$i][$j]->fecha, 0, -9));
                                  $b = str_replace("/", "-", substr($lista[$i][$j]->fecha, 10));

                                  
                                  $nombreA = DB::table('tigos')
                                            ->select('nombre')
                                            ->where('numero_usuario','=',$lista[$i][$j]->numeroA)
                                            ->exists();
                                if ($nombreA == true){
                                      $nombreA = DB::table('tigos')
                                          ->select('nombre')
                                          ->where('numero_usuario','=',$lista[$i][$j]->numeroA)
                                          ->get();

                                      foreach ($nombreA as $nombreA){
                                          $nombreA = $nombreA->nombre;
                                      }
                                }else{
                                      $nombreA = 'vacio';
                                }
                                
                                $nombreB = DB::table('tigos')
                                            ->select('nombre')
                                            ->where('numero_usuario','=',$lista[$i][$j]->numeroB)
                                            ->exists();
                                          
                                if ($nombreB == true){
                                      $nombreB = DB::table('tigos')
                                            ->select('nombre')
                                            ->where('numero_usuario','=',$lista[$i][$j]->numeroB)
                                            ->get();
                                      foreach ($nombreB as $nombreB){
                                        $nombreB = $nombreB->nombre;
                                      } 
                                }else{
                                      $nombreB = 'vacio';
                                }    
                                
                                $hora = 0;
                                $minuto = 0;
                                $segundo = 0;
                                $tiempoActual = $lista[$i][$j]->tiempo;
                                while ($tiempoActual > 59) {
                                  if ($segundo == 59) {
                                      $segundo = 0;
                                      $minuto = $minuto+1;
                                  } else {
                                    if ($minuto == 59) {
                                        $minuto = 0;
                                        $hora = $hora+1;
                                    } else {
                                      $tiempoActual = $tiempoActual -60;
                                      $minuto = $minuto+1;
                                      $segundo = 0;
                                    }
                                  }
                                  
                                }
                                $segundo = $tiempoActual;
                                if ($hora<10) {
                                    $hora = "0".$hora;
                                }
                                if ($minuto<10) {
                                    $minuto = "0".$minuto;
                                }
                                if ($segundo<10) {
                                    $segundo = "0".$segundo;
                                }
                                $texto = $hora.":".$minuto.":".$segundo;

                                $coordenada = str_replace(" ", "", $lista[$i][$j]->latitud).",".str_replace(" ", "", $lista[$i][$j]->longitud);
                                
                            ?>
                        @if ($lista[$i][$j]->tiempo != "0")
                        <ul style= "list-style-type: square;"><li>
                            <h4 align = "justify">EN FECHA {{$a}} a horas {{$b}} el usuario del número {{$lista[$i][$j]->numeroA}} @if ($nombreA != 'vacio')registrado a nombre de {{$nombreA}}, @else con datos de usuario desconocido @endif 
                                <b>toma</b> contacto por {{$texto}} minutos, @if ($lista[$i][$j]->sitio != null)
                                    empleando la radio base <a href="/tigo/informe/registro/{{$registro}}/{{$filtrado}}/{{$a}}/{{ $coordenada}}/{{1 .$b}}">{{$lista[$i][$j]->sitio}}</a>, @else empleando una radio base DESCONOCIDA, @endif con el número {{$lista[$i][$j]->numeroB}} 
                                @if ($nombreB != 'vacio')registrado a nombre de {{$nombreB}}, @else con datos de usuario desconocido @endif , 
                                para este último empleó una radio base DESCONOCIDA. 
                            </h4></li></ul>
                        @else
                        <ul style= "list-style-type: square;"><li>
                        <h4 align = "justify">EN FECHA {{$a}} a horas {{$b}} el usuario del número {{$lista[$i][$j]->numeroA}} @if ($nombreA != 'vacio')registrado a nombre de {{$nombreA}}, @else con datos de usuario desconocido @endif 
                          <b>intenta</b> tomar contacto (llamada perdida),  @if ($lista[$i][$j]->radio_baseA != '-')
                          empleando la radio base <a href="/tigo/informe/registro/{{$registro}}/{{$filtrado}}/{{$a}}/{{ $coordenada}}/{{1 .$b}}">{{$lista[$i][$j]->radio_baseA}}</a>, @else empleando una radio base DESCONOCIDA, @endif al número {{$lista[$i][$j]->numeroB}} 
                          @if ($nombreB != 'vacio')registrado a nombre de {{$nombreB}}, @else con datos de usuario desconocido @endif , 
                          para este último empleó una radio base DESCONOCIDA.
                      </h4></li></ul>
                            
                        @endif
                    @endfor
                    <br>
                   @endfor
                  

                      </div>

                      <a href="/tigo/informe/registro/{{$registro}}/{{$filtrado}}"  class="btn btn-sm btn-danger float-left" >Atras</a>
                    </div>
                
                  </div>
                 
              </div>
            </div>
          </div>
        </div>
    

@endsection