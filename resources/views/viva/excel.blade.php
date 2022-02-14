@extends('layouts.app', ['page' => __('Icons'), 'pageSlug' => 'icons'])

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <style>
    .subir{
      padding: 10px 30px;
      background: #419EF9;
      color:#fff;
      border:0px solid #fff;
  }
   
  .subir:hover{
      color:#fff;
      background: #419EF9;
  }
  </style>
  <script>
    function cambiar(){
      var pdrs = document.getElementById('file-upload').files[0].name;
      document.getElementById('info').value = pdrs;
  }
  
  </script>
  
<div class="row justify-content-center">
<div class="col-md-10">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title text-center">Subir Archivo Excel</h4>
      </div>
      <div class="card-body">
        
        <div class="row justify-content-center">
          <div class="col-md-10">
              <div class="card">
                   <form action="{{url('viva/register/XLSX')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field()}}
                      <table class="table table-striped" id="tabla">
                          <thead style="background : rgb(78, 137, 225)">
                              <tr>
                                  <th class="text-center">#</th>
                                  <th class="text-right">Archivo</th>
                                  <th class="text-center"></th>
                                  <th class="text-center">Numero</th>
                                  <th class="text-center">Eliminar</th>
                              </tr>
                          </thead> 
                          <tbody id="tabla3">
                              <span id="estadoBoton"></span>
                              <tr id="columna-0">
                                  <td>
                                   <div class="text-center">
                                    <label for="uno" id="count" class="text-center text-white" >1</label>
                                   </div>
                                  </td>
                                  <td>
                                   <div class="text-center">
                                    <label for="file-upload" class="subir">
                                      <i class="fas fa-cloud-upload-alt"></i> Subir archivo</label>
                                    <input id="file-upload" name="archivos[]" onchange='cambiar()' type="file" style='display: none;'/>
                                   </div>
                                  </td>
                                  <td>
                                    <div class="text-center">
                                      <input type="text"  class="form-control text-white"  disabled
                                      style="border-color: rgb(78, 137, 225) ;" id="info" ></input>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="text-center">
                                      <input type="integer"  class="form-control text-white"   id="numero" name="numero[]"
                                      style="border-color: rgb(78, 137, 225) ;" ></input>
                                    </div>
                                  </td>
                                  <td class="eliminar" id="deletRow" name="deletRow">
                                      <div class="text-center">
                                        <button class="btn btn-icon btn-danger"  type="button">
                                        <i class="tim-icons icon-trash-simple"></i></button>
                                      </div>
                                      </button>
                                  </td>

                              </tr>
                          </tbody>
                      </table>
                      <div class="text-center">
                        <span id="mensaje"></span>
                      </div>
                      <button type="button" class="btn btn-secundary btn-lg btn-block" id="add" name="add">Añadir</button>
      
              </div>
          </div>
        </div>
      </div>
    </div>
    <a href="{{ url('home') }}" class="btn btn-sm btn-danger">Cancelar</a>
    <button type="submit"class="btn btn-sm btn-secundary float-right">Siguiente</button>
</div>
</form>
  </div>

  <script>
    
    var bb = 0;
    var go = 1;
    $(function() {
      
            $("#add").on('click', function() {
              if(!validar('info') && !validar('numero')){
                $("#mensaje").html("<span class='text-white'></span>");
                  $("#tabla tbody tr:eq(0)").clone().appendTo("#tabla").find('input').attr('readonly', true);
                                  bb = bb + 1;
                                  go = go + 1;
                                  $("#count").html("<label for='uno' id='count"+go+"' class='text-center text-white'>"+go+"</label>");
                                  limpiarCampos();
              }else{
                if(validar('info')){
                  $("#mensaje").html("<span class='text-white'>Suba un archivo</span>");
                }else{
                  if(validar('numero')){
                    $("#mensaje").html("<span class='text-white'>Registre numero</span>")
                  }else{
                    $("#mensaje").html("<span class='text-white'></span>");
                  }
                }
                
              }
                
            });
            $(document).on("click", ".eliminar", function() {
                if (bb > 0) {
                    var parent = $(this).parents().get(0);
                    $(parent).remove();
                    bb = bb - 1;
                    go = go-1;
                    $("#count").html("<label for='uno' id='count"+go+"' class='text-center text-white'>"+go+"</label>");
                }else{
                  document.getElementById('info').value = "";
                  $("#count").html("<label for='uno' id='count"+go+"' class='text-center text-white'>"+go+"</label>");
                }
            });
       
    });

    function limpiarCampos(){
      $("#info").val('');
      $("#numero").val('');
    }

    function validar($variable){
      var aux = false;
      
      if(document.getElementById($variable).value == "" ){
       
          aux = true;
      
      }
      return aux;
    }
    </script>
@endsection