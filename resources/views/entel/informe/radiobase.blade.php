<div class="container">
    @for ($i = 0; $i < $contador; $i++)
       
            <table class="table table-light text-center">
                 <thead class="thead-light">
                    <tr>
                        <th class="text-center">RADIO BASE {{$radioBase[$i][0]}}</th>
                        </tr>
                    </thead>
                    <tbody> 
                             
                        @for ($j = 1; $j < count($radioBase[$i]); $j++)    
                           <tr>
                                <td>{{$radioBase[$i][$j]}}</td>
                            </tr>
                        @endfor
                            
                    </tbody>
            </table>
                <center>
                <img src="{{ public_path('/PDF/'.$i.'.jpg') }}" width="900px">
                </center>
                 <div style="page-break-after:always;"></div>

@endfor
</div>
