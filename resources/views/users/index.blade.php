@extends('layouts.app', ['page' => __('ADMINISTRADOR DE USUARIO'), 'pageSlug' => 'users'])

@section('content')

    <style>
        .onoffswitch {
            position: relative; width: 116px;
            -webkit-user-select:none; -moz-user-select:none; -ms-user-select: none;
            }
            .onoffswitch-checkbox {
            display: none;
            }
            .onoffswitch-label {
            display: block; overflow: hidden; cursor: pointer;
            border: 2px solid #FFFFFF; border-radius: 50px;
            }
            .onoffswitch-inner {
            width: 200%; margin-left: -100%;
            -moz-transition: margin 0.3s ease-in 0s; -webkit-transition: margin 0.3s ease-in 0s;
            -o-transition: margin 0.3s ease-in 0s; transition: margin 0.3s ease-in 0s;
            }
            .onoffswitch-inner:before, .onoffswitch-inner:after {
            float: left; width: 50%; height: 41px; padding: 0; line-height: 41px;
            font-size: 25px; color: white; font-family: Trebuchet, Arial, sans-serif; font-weight: bold;
            -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box;
            }
            .onoffswitch-inner:before {
            content: "ON";
            padding-left: 10px;
            background-color: #EEEEEE; color: #2FCCFF;
            }
            .onoffswitch-inner:after {
            content: "OFF";
            padding-right: 10px;
            background-color: #EEEEEE; color: #999999;
            text-align: right;
            }
            .onoffswitch-switch {
            width: 38px; margin: 1.5px;
            background: #A1A1A1;
            border: 2px solid #FFFFFF; border-radius: 50px;
            position: absolute; top: 0; bottom: 0; right: 71px;
            -moz-transition: all 0.3s ease-in 0s; -webkit-transition: all 0.3s ease-in 0s;
            -o-transition: all 0.3s ease-in 0s; transition: all 0.3s ease-in 0s;
            }
            .onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-inner {
            margin-left: 0;
            }
            .onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-switch {
            right: 0px;
            background-color: #2FCCFF;
            }
    </style>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
    <script>

        function comprobar(data){
            //elemento = document.getElementById("myonoffswitch-"+data).value;
            //console.log(elemento);
            if( $("#myonoffswitch-"+data).prop('checked') ) {
                //encendido
                comprobarAccion("si",data);
            }else{
                //apagado
                comprobarAccion("no",data);
            }
            
        }

        function comprobarAccion(valor,id) {
            $("#loaderIcon").show();
    
            jQuery.ajax({
                url: "/user/accion",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "value": valor,
                    "id": id,
                },
                asycn: false,
                type: "POST",
                success: function(data) {
                    //console.log('si da');
                    
                },
                error: function() {
                    //console.log('no da');
                }
            });
        }
    </script>
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ __('Usuarios') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary">{{ __('Añadir Usuario') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('alerts.success')

                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <th scope="col">{{ __('Nombre') }}</th>
                                <th scope="col">{{ __('Correo') }}</th>
                                <th scope="col">{{ __('Fecha de Creacion') }}</th>
                                <th scope="col">{{ __('Accion')}}</th>
                                <th scope="col"></th>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>
                                            <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                                        </td>
                                        <td>{{ $user->created_at->format('d/m/Y H:i') }}</td>
                                        <td>
                                            @if (auth()->user()->id != $user->id)

                                                @if ($user->permiso == 'si')
                                                    <div class="onoffswitch" >
                                                        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch-{{$user->id}}" value="1" onclick="comprobar({{$user->id}})" checked>
                                                        <label class="onoffswitch-label" for="myonoffswitch-{{$user->id}}">
                                                        <div class="onoffswitch-inner"></div>
                                                        <div class="onoffswitch-switch"></div>
                                                        </label>
                                                    </div>
                                                @else
                                                <div class="onoffswitch" >
                                                    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch-{{$user->id}}" value="1" onclick="comprobar({{$user->id}})">
                                                    <label class="onoffswitch-label" for="myonoffswitch-{{$user->id}}">
                                                    <div class="onoffswitch-inner"></div>
                                                    <div class="onoffswitch-switch"></div>
                                                    </label>
                                                </div>
                                                @endif   
                                                    
                                                                
                                            @endif
                                            
                                        </td>
                                        <td class="text-right">
                                                <div class="dropdown">
                                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                        @if (auth()->user()->id != $user->id)
                                                            <form action="{{ route('user.destroy', $user) }}" method="post">
                                                                @csrf
                                                                @method('delete')

                                                                <a class="dropdown-item" href="{{ route('user.edit', $user) }}">{{ __('Editar') }}</a>
                                                                <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">
                                                                            {{ __('Eliminar') }}
                                                                </button>
                                                            </form>
                                                        @else
                                                            <a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Editar') }}</a>
                                                        @endif
                                                    </div>
                                                </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        {{ $users->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
