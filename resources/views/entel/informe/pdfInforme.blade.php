<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
    <style>
        .table td {
        text-align: center;   
    }
    .table {
        text-align: center;
        line-height: 30px;
        border: 1px solid #000;
    }

    th,  {
    width: 25%;
    text-align: left;
    background-color: #277ccc;
    border: 1px solid #000;
    
    }
    .tr {
        background-color: #277ccc;
    }
    .tbody{
        background-color: #6ea6db;
    }
    .th{
        position: fixed;
    }
    .pagenum:before {
        content: counter(page);
    }
    </style>
<header class="container-fluid">
    <div class="row">
        <div class="col-12 align-self-center text-center mt-5">
            <img src="{{asset('images/forense.jpg')}}" class="img-fluid" width="400px " alt="">
            <br><br><br><br>
            <p>DICTAMEN PERICIAL</p>
        </div>
    </div>
</header>
    
    <body>


        

        <footer>
            <div class="container-fluid">
                <div class="copyright">
                     {{ __('VTDFIX & IRECOVERY') }} 
                </div>
            </div>
        </footer>

        <div style="page-break-after:always;"></div>

        <div class="card"></div>
        <main>
          <div class="container">
             
                <table class="table table-striped text-center">
                    <thead class=""> 
                    </thead>
                        <tbody>
                            <tr>
                                 <th rowspan="2" class="text-center"><b>Lista de Números Implicados</b></th>
                                 <th colspan="{{$h-1}}" class="text-center"><b>Flujo de Llamadas</b></th>
                            </tr>
                            @for ($i = 0; $i < $v; $i++)
                            <tr>
                                @for ($j = 0; $j < $h; $j++)
                                    @if($i==0 && $j==0)
                                        @else
                                            @if($Matriz[$i][$j] != 0)
                                                <td> {{$Matriz[$i][$j]}}</td>  
                                            @else

                                            <td></td>
                                            
                                            @endif  
                                        
                                    @endif        
                                @endfor
                            </tr>

                                @if ($i % 7 == 0 && $i > 1)
                                <div style="page-break-after:always;"></div>
                                <tr>
                                    <th rowspan="2" class="text-center"><b>Lista de Números Implicados</b></th>
                                    <th colspan="{{$h-1}}" class="text-center"><b>Flujo de Llamadas</b></th>
                               </tr>
                                    @for ($i = 7; $i < $v; $i++)

                                    <tr>
                                        @for ($j = 0; $j < $h; $j++)
                                            @if($i==7 && $j==0)
                                                @else
                                                    @if($Matriz[$i][$j] != 0)
                                                        <td> {{$Matriz[$i][$j]}}</td>  
                                                    @else

                                                    <td></td>
                                                    
                                                    @endif  
                                                
                                            @endif        
                                        @endfor
                                    </tr>
                                    @endfor
                                @endif
                            @endfor
                         
                        </tbody>
                </table>
         </div>  
        </main>
        
        
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
                        empleando la radio base {{$nuevo[$i][$j]->radio_baseA}}, @else empleando una radio base DESCONOCIDA, @endif con el número {{$nuevo[$i][$j]->numeroB}} 
                    @if ($nombreB != 'vacio')registrado a nombre de {{$nombreB}}, @else con datos de usuario desconocido @endif, @if ($nuevo[$i][$j]->radio_baseB == '-')
                    para este último empleó una radio base DESCONOCIDA.@else para este último empleó una radio base {{$nuevo[$i][$j]->radio_baseB}}.@endif 
                </h4></li></ul>
            @else
            <ul style= "list-style-type: square;"><li>
            <h4 align = "justify">EN FECHA {{$a}} a horas {{$b}} el usuario del número {{$nuevo[$i][$j]->numeroA}} @if ($nombreA != 'vacio')registrado a nombre de {{$nombreA}}, @else con datos de usuario desconocido @endif 
              <b>intenta</b> tomar contacto (llamada perdida),  @if ($nuevo[$i][$j]->radio_baseA != '-')
              empleando la radio base {{$nuevo[$i][$j]->radio_baseA}}, @else empleando una radio base DESCONOCIDA, @endif al número {{$nuevo[$i][$j]->numeroB}} 
              @if ($nombreB != 'vacio')registrado a nombre de {{$nombreB}}, @else con datos de usuario desconocido @endif , @if ($nuevo[$i][$j]->radio_baseB == '-')
              para este último empleó una radio base DESCONOCIDA.@else para este último empleó una radio base {{$nuevo[$i][$j]->radio_baseB}}.@endif
          </h4></li></ul>
                
            @endif
        @endfor
        <br>
       @endfor


       <p><strong>GEOLOCALIZACION DE RADIOBASE</strong></p>

      <img src="{{ public_path('/PDF/mapaPrueba.jpg') }}" width="900px">
        

    </body>

    

</html>