<div>
    <h5 class="text-align-center text-center" >TABLA DE RELACIONES</h5>
    <br>
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

                    @if ($i % 10 == 0 && $i > 0 && $i < $v-1) 
                        <div style="page-break-after:always;"></div>
                            <tr>
                                <th rowspan="2" class="text-center"><b>Lista de Números Implicados</b></th>
                                <th colspan="{{$h-1}}" class="text-center"><b>Flujo de Llamadas</b></th>
                            </tr>
                            <tr>
                                @for ($s = 1; $s < $h; $s++)
                                    <td> {{$Matriz[0][$s]}}</td>
                                @endfor
            
                            </tr>
                    @endif            
                @endfor


            </tbody>
    </table>
</div>
</div>
  