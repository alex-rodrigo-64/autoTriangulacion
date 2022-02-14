@extends('layouts.app', ['page' => __('ENTEL'), 'pageSlug' => 'icons'])
@section('content')

<link href="{{ asset('table') }}/css/viewEntel.css" rel="stylesheet" />

<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title text-center">Tabla de Relacion</h4>
          </div>
          <div class="card-body">
            
            <div class="row justify-content-center">
              <div class="col-md-10">
                  <div class="card">

                  <div id="resp-table" >
                    @for ($i = 0; $i < $v; $i++)
                      <div class="resp-table-row">
                        @for ($j = 0; $j < $h; $j++)
                          
                            @if ($i==0 || $j==0)
                            <div class="table-body-cell2">
                                <div class="text-center text-white">
                                  @if ($Matriz[$i][$j] != 0)
                                     {{$Matriz[$i][$j]}}
                                     
                                  @endif
                                </div>
                            </div>
                            @else
                            
                                  @if ($Matriz[$i][$j] != 0)
                                  <div class="table-body-cell3">
                                    <div class="text-white text-center">
                                          {{ $Matriz[$i][$j]}}
                                    </div>
                                   
                                  </div>
                                  @else
                                  <div class="table-body-cell">
                                  </div>  
                                  @endif
                                  
                                
                            @endif
                           
                          
                        @endfor
                        
                    </br>
                    </div>
                    @endfor
                  </div>
                
                  

                  <br>
                  
                  </div>

                  <a href="{{ url('entel/informe/registro') }}" class="btn btn-sm btn-success float-right">Siguiente</a>
              </div>
            </div>
          </div>
        </div>
    </div>
    
      </div>
    

@endsection