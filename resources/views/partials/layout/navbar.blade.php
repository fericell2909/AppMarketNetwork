<nav class="navbar menu" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/"><img src="/images/logos.png" alt="" style="margin-top: -8px;"></a>
        </div>
        
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
                @if (Auth::guest())
                    <ul class="nav navbar-nav navbar-right">
                         <li><a href="{{route('auth/register')}}"><i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp; Registrarse</a></li>
                         <li><a href="{{route('auth/login')}}"><i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp; Ingresar</a></li>
                        <li><a href="{{route('proveedor/login')}}" class="text-primary"><span class="text-danger">¿Eres Proveedor?</span></button></a></li>
                    @else
                        @if (Auth::user()->users_tipos_id == 1) 
                            <ul class="nav navbar-nav navbar-left">
                                <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-home fa-2x menu-iconos-fonts" aria-hidden="true"></i>&nbsp; <strong>Casa</strong> <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><center><img class="hidden-xs" alt="" src="/images/house.png"></center></li>
                                        
                                         <li><a href="{{route('Proveedores/Servicios',['id'=> 1])}}"><i class="fa fa-key" aria-hidden="true"></i>&nbsp; Plomeros</a></li>
                                        <li><a href="{{route('Proveedores/Servicios',['id'=> 2])}}"><i class="fa fa-lightbulb-o" aria-hidden="true"></i>&nbsp; Electricistas</a></li>
                                        <li><a href="{{route('Proveedores/Servicios',['id'=> 3])}}"><i class="fa fa-cutlery" aria-hidden="true"></i>&nbsp; Cocineros</a></li>
                                        <li><a href="{{route('Proveedores/Servicios',['id'=> 4])}}"><i class="fa fa-paint-brush" aria-hidden="true"></i>&nbsp; Pintores</a></li>
                                        <li><a href="{{route('Proveedores/Servicios',['id'=> 5])}}"><i class="fa fa-bath" aria-hidden="true"></i>&nbsp; Gasfiteros</a></li> 
                                        
                                        {{-- @foreach($servicios as $servicio)
                                            @if($servicio->categoria_id == 1)
                                                <li><a href="{{route('Proveedores/Servicios',['id'=> $servicio->id])}}"><i class="{{$servicio->cIconoFonts}}" aria-hidden="true"></i>&nbsp; {{$servicio->nombre_servicio}}</a></li>
                                            @endif
                                        @endforeach--}}

                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav navbar-nav navbar-left">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-medkit fa-2x" aria-hidden="true"></i>&nbsp; <strong>Salud</strong><b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><center><img class="hidden-xs" alt="" src="/images/salud.png"></center></li>
                                         <li><a href="{{route('Proveedores/Servicios',['id'=> 7])}}"><i class="fa fa-thermometer-full" aria-hidden="true"></i>&nbsp; Dentistas</a></li>
                                        <li><a href="{{route('Proveedores/Servicios',['id'=> 8])}}"><i class="fa fa-user-md" aria-hidden="true"></i>&nbsp; Médicos</a></li>
                                        <li><a href="{{route('Proveedores/Servicios',['id'=> 9])}}"><i class="fa fa-heartbeat" aria-hidden="true"></i>&nbsp; Cardiólogos</a></li>
                                        
                                        {{--@foreach($servicios as $servicio)
                                            @if($servicio->categoria_id == 2)
                                                <li><a href="{{route('Proveedores/Servicios',['id'=> $servicio->id])}}"><i class="{{$servicio->cIconoFonts}}" aria-hidden="true"></i>&nbsp; {{$servicio->nombre_servicio}}</a></li>
                                            @endif
                                        @endforeach--}}
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav navbar-nav navbar-left">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-arrows fa-2x" aria-hidden="true"></i>&nbsp; <strong>Más</strong><b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><center><img class="hidden-xs" alt="" src="/images/otros.png"></center></li>
                                        <li><a href="{{route('Proveedores/Servicios',['id'=> 10])}}"><i class="fa fa-car" aria-hidden="true"></i>&nbsp; Mecánicos</a></li>
                                        <li><a href="{{route('Proveedores/Servicios',['id'=> 11])}}"><i class="fa fa-gavel" aria-hidden="true"></i>&nbsp; Entrenador Personal</a></li>
                                        
                                        {{-- @foreach($servicios as $servicio)
                                            @if($servicio->categoria_id == 3)
                                                <li><a href="{{route('Proveedores/Servicios',['id'=> $servicio->id])}}"><i class="{{$servicio->cIconoFonts}}" aria-hidden="true"></i>&nbsp; {{$servicio->nombre_servicio}}</a></li>
                                            @endif
                                        @endforeach--}}
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav navbar-nav navbar-left  menu-user-cuenta">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user-circle fa-2x" aria-hidden="true"></i><span class=""> Bienvenido,<strong>  {{ Auth::user()->Nombres}}</strong></span>&nbsp; <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{route('usuarios/cuenta')}}"   ><i class="fa fa-id-card-o" aria-hidden="true"></i>&nbsp; Mi Cuenta</a></li>
                                        <li><a href="{{route('MisCompras')}}"><i class="fa fa-server" aria-hidden="true"></i>&nbsp; Mis Compras</a></li>


                                        <li><a href="{{route('Cliente/MisComentarios')}}"><i class="fa fa-bars" aria-hidden="true"></i>&nbsp; Mis Comentarios</a></li>
                                        <li><a href="{{route('Encuestas/MisPendientes')}}"><i class="fa fa-question-circle" aria-hidden="true"></i>&nbsp; Mis Encuestas Pendientes</a></li>
                                        <li><center><a href="{{route('auth/logout')}}" class="btn btn-principal"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp; Cerrar Sesión</a></center></li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav navbar-nav navbar-left  menu-user-cuenta"> 
                                <li class="dropdown">
                                    <a href="{{route('CarroCompra/Revisar')}}"><i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i><span class="badge">{{Auth::user()->nTotalItemCarritoCompra}}</span></a>
                                </li>
                            </ul>
                            <ul class="nav navbar-nav navbar-left  menu-user-cuenta"> 
                                <li class="dropdown">
                                    <a href="#"><i class="fa fa-shopping-bag fa-2x" aria-hidden="true"></i>&nbsp; Ofertas</a>
                                </li>
                            </ul>
                        @endif
                         @if (Auth::user()->users_tipos_id == 2) 
                            <ul class="nav navbar-nav navbar-left">
                                <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-home fa-2x menu-iconos-fonts" aria-hidden="true"></i>&nbsp; <strong>Cotizaciones</strong> <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{route('cotizacion/proveedor')}}"><i class="fa fa-key" aria-hidden="true"></i>&nbsp; Gestión de Cotizaciones</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-building fa-2x menu-iconos-fonts" aria-hidden="true" style="color:green;"></i>&nbsp; <strong>Proyectos</strong> <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{route('proveedores/trabajos')}}"><i class="fa fa-key" aria-hidden="true"></i>&nbsp; Gestión de Proyectos</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav navbar-nav navbar-left">
                                <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-home fa-2x fa-file-powerpoint-o" aria-hidden="true"></i>&nbsp; <strong>Ofertas</strong> <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{route('Ofertas/RegistrarOfertas',['id'=> 0])}}"><i class="fa fa-key" aria-hidden="true"></i>&nbsp; Registrar Ofertas Públicas</a></li>
                                        <li><a href="{{route('Ofertas/ListarOfertasVigentes')}}"><i class="fa fa-key" aria-hidden="true"></i>&nbsp; Listar Ofertas Vigentes</a></li>
                                        <li><a href="{{route('Ofertas/ListarOfertasCerradas')}}"><i class="fa fa-key" aria-hidden="true"></i>&nbsp; Listar Ofertas Cerradas</a></li>
                                        <li><a href="{{route('Ofertas/ListarOfertasAnuladas')}}"><i class="fa fa-key" aria-hidden="true"></i>&nbsp; Listar Ofertas Anuladas</a></li>
                                    </ul>
                                </li>
                            </ul>
                       

                            <ul class="nav navbar-nav navbar-left  menu-user-cuenta">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user-circle fa-2x" aria-hidden="true"></i><span class=""> Bienvenido,<strong>  {{ Auth::user()->prov_razon_social}}</strong></span>&nbsp; <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{route('proveedores/cuenta')}}"><i class="fa fa-id-card-o" aria-hidden="true"></i>&nbsp; Mi Cuenta</a></li>
                                        <li><center><a href="{{route('auth/logout')}}" class="btn btn-principal"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp; Cerrar Sesión</a></center></li>
                                    </ul>
                                </li>
                            </ul>
                        @endif
                @endif
        </div><!-- /.navbar-collapse -->
    </div>
</nav>