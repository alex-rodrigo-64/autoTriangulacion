   
<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-mini">{{ __('BD') }}</a>
            <a href="#" class="simple-text logo-normal">{{ __('Black Dashboard') }}</a>
        </div>
        <ul class="nav">
            @if (Auth::user()->administracion == '2')
            <li @if ($pageSlug == 'dashboard') class="active " @endif>
                <a href="{{ route('home') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li>
                <a href="{{ url('carrier') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ __('carrier') }}</p>
                </a>
            </li>
            @endif
            @if(Auth::user()->administracion == '1')
               <li>
                <a data-toggle="collapse" href="#laravel-examples" aria-expanded="true">
                    <i class="fab fa-laravel" ></i>
                    <span class="nav-link-text" >{{ __('Administrador') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse show" id="laravel-examples">
                    <ul class="nav pl-4">
                       <!-- <li if ($pageSlug == 'profile') class="active " endif>-->
                            <a href="{{ route('profile.edit')  }}">
                                <i class="tim-icons icon-single-02"></i>
                                <p>{{ __('Perfil de Usuario') }}</p>
                            </a>
                        <!--</li>-->
                        <li @if ($pageSlug == 'users') class="active " @endif>
                            <a href="{{ route('user.index')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ __('Gestion de Usuarios') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li> 
            @endif
            @if (Auth::user()->administracion == '2')
             <li @if ($pageSlug == 'icons') class="active " @endif>
                <a href="{{ url('example/entel') }}">
                    <i class="tim-icons icon-atom"></i>
                    <p>{{ __('Ejemplo PDF to Excel') }}</p>
                </a>
            </li>   
            @endif
            
        </ul>
    </div>
</div>
