<div>
    <h5 class="text-align-center text-center">INFORME DE NUMEROS TELEFONICOS INVOLUCRADOS</h5>
    <br>
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
                    <h6 align = "justify">EN FECHA {{$a}} a horas {{$b}} el usuario del número {{$nuevo[$i][$j]->numeroA}} @if ($nombreA != 'vacio')registrado a nombre de {{$nombreA}}, @else con datos de usuario desconocido @endif 
                        <b>toma</b> contacto por {{$nuevo[$i][$j]->tiempo}} segundos, @if ($nuevo[$i][$j]->radio_baseA != '-')
                            empleando la radio base {{$nuevo[$i][$j]->radio_baseA}}, @else empleando una radio base DESCONOCIDA, @endif con el número {{$nuevo[$i][$j]->numeroB}} 
                        @if ($nombreB != 'vacio')registrado a nombre de {{$nombreB}}, @else con datos de usuario desconocido @endif, @if ($nuevo[$i][$j]->radio_baseB == '-')
                        para este último empleó una radio base DESCONOCIDA.@else para este último empleó una radio base {{$nuevo[$i][$j]->radio_baseB}}.@endif 
                    </h6></li></ul>
                @else
                <ul style= "list-style-type: square;"><li>
                <h6 align = "justify">EN FECHA {{$a}} a horas {{$b}} el usuario del número {{$nuevo[$i][$j]->numeroA}} @if ($nombreA != 'vacio')registrado a nombre de {{$nombreA}}, @else con datos de usuario desconocido @endif 
                <b>intenta</b> tomar contacto (llamada perdida),  @if ($nuevo[$i][$j]->radio_baseA != '-')
                empleando la radio base {{$nuevo[$i][$j]->radio_baseA}}, @else empleando una radio base DESCONOCIDA, @endif al número {{$nuevo[$i][$j]->numeroB}} 
                @if ($nombreB != 'vacio')registrado a nombre de {{$nombreB}}, @else con datos de usuario desconocido @endif , @if ($nuevo[$i][$j]->radio_baseB == '-')
                para este último empleó una radio base DESCONOCIDA.@else para este último empleó una radio base {{$nuevo[$i][$j]->radio_baseB}}.@endif
            </h6></li></ul>
                    
                @endif
            @endfor
            <br>
    @endfor
</div>
