{{-- <div class="container">
    <div class="row text-center">
      <div class="col-xs-12">
        <h1>¡¡¡ Encuentra más Clientes con {{ Config('globales.NombreEmpresa') }} !!! </h1>
      </div>
      <div class="col-xs-12 col-sm-4">
        <i class="fa fa-exclamation-circle fa-5x"></i>
        <h3>Mas de  <strong class="color-azul">{{ Config('globales.numeroclientes') }} clientes</strong> confian en nosotros </h3>
        <p>Una cifra que nos situa como
        <strong>pioneros</strong> en el mercado peruano.</p>
      </div>
      <div class="col-xs-12 col-sm-4">
        <i class="fa fa-address-card fa-5x" aria-hidden="true"></i>
          <h3>Actualiza tus Datos de <a href="{{route('proveedores/cuenta')}}" ><strong>Usuario</strong></a></h3>
          <p>Importante para encontrar más <strong>clientes</strong> de manera efectiva.</p>
      </div>
      <div class="col-xs-12 col-sm-4">
        <i class="fa fa-file-powerpoint-o fa-5x"></i>
        <h3>Registra <a href="{{route('Ofertas/RegistrarOfertas',['id'=> 0])}}" ><strong>Ofertas</strong></a> regularmente</h3>
        <p>Valida siempre la <strong>fecha de término</strong> de las mismas.</p>
      </div>
    </div>
  </div> --}}

  <div class="container">
    <div class="row text-center">
      <div class="col-xs-12">
        <h1><strong class="color-azul">¡¡¡</strong> Encuentra <i class="fa fa-search-plus" style="color: green;"></i>&nbsp;Clientes con 
        <strong class="color-marron">{{ Config('globales.NombreEmpresa') }}</strong> <strong class="color-azul">!!!</strong> </h1>
      </div>
      <div class="col-xs-12 col-sm-4">
        <a href="{{route('cotizacion/proveedor')}}"><i class="fa fa-exclamation-circle fa-5x"></i></a>
        <h3>Mas de  <strong class="color-azul">{{ Config('globales.numeroclientes') }} clientes</strong> confian en nosotros </h3>
        <p>Una cifra que nos situa como
        <strong>pioneros</strong> en el mercado peruano.</p>
      </div>
      <div class="col-xs-12 col-sm-4">
        <a href="{{route('proveedores/cuenta')}}"><i class="fa fa-address-card fa-5x" aria-hidden="true"></i></a>
          <h3>Actualiza tus Datos de <strong class="color-azul">Usuario</strong> frecuentemente</h3>
          <p>Importante para encontrar más <strong>clientes</strong> de manera efectiva.</p>
      </div>
      <div class="col-xs-12 col-sm-4">
        <a href="{{route('Ofertas/RegistrarOfertas',['id'=> 0])}}"><i class="fa fa-file-powerpoint-o fa-5x"></i></a>
        <h3>Registra <strong class="color-azul">Ofertas</strong> regularmente</h3>
        <p>Valida siempre la <strong>fecha de término</strong> de las mismas.</p>
      </div>
    </div>
    <div class="row text-center">
      <div class="col-xs-12 col-sm-4">
        <a href="{{route('proveedores/trabajos')}}"><i class="fa fa-building fa-5x" style = "color: green"></i></a>
        <h3>Registra tus <strong class="color-azul">Trabajos Realizados</strong> regularmente</h3>
        <p>Para una mayor 
        <strong>promoción</strong> de los servicios que brindas.</p>
      </div>
      @if(Auth::guest())
          <div></div>
      @else
        <div class="col-xs-12 col-sm-4">

              <a href="{{route('Encuestas/MisCalificaciones')}}">
                @if(Auth::user()->ratio == 0)
                  <i class="fa fa-star fa-5x" style = "color: #ddd"></i>
                  <i class="fa fa-star fa-5x" style = "color: #ddd"></i>
                  <i class="fa fa-star fa-5x" style = "color: #ddd;"></i>
                  <i class="fa fa-star fa-5x" style = "color: #ddd"></i>
                  <i class="fa fa-star fa-5x" style = "color: #ddd;"></i>
                @endif

                @if(Auth::user()->ratio == 1)
                  <i class="fa fa-star fa-5x" style = "color: green"></i>
                  <i class="fa fa-star fa-5x" style = "color: #ddd"></i>
                  <i class="fa fa-star fa-5x" style = "color: #ddd"></i>
                  <i class="fa fa-star fa-5x" style = "color: #ddd"></i>
                  <i class="fa fa-star fa-5x" style = "color: #ddd;"></i>
                @endif

                @if(Auth::user()->ratio == 2)
                  <i class="fa fa-star fa-5x" style = "color: green"></i>
                  <i class="fa fa-star fa-5x" style = "color: green"></i>
                  <i class="fa fa-star fa-5x" style = "color: #ddd"></i>
                  <i class="fa fa-star fa-5x" style = "color: #ddd"></i>
                  <i class="fa fa-star fa-5x" style = "color: #ddd;"></i>
                @endif


                @if(Auth::user()->ratio == 3)
                  <i class="fa fa-star fa-5x" style = "color: green"></i>
                  <i class="fa fa-star fa-5x" style = "color: green"></i>
                  <i class="fa fa-star fa-5x" style = "color: green"></i>
                  <i class="fa fa-star fa-5x" style = "color: #ddd"></i>
                  <i class="fa fa-star fa-5x" style = "color: #ddd;"></i>
                @endif

                @if(Auth::user()->ratio == 4)
                  <i class="fa fa-star fa-5x" style = "color: green"></i>
                  <i class="fa fa-star fa-5x" style = "color: green"></i>
                  <i class="fa fa-star fa-5x" style = "color: green"></i>
                  <i class="fa fa-star fa-5x" style = "color: green"></i>
                  <i class="fa fa-star fa-5x" style = "color: #ddd;"></i>
                @endif

                @if(Auth::user()->ratio == 5)
                  <i class="fa fa-star fa-5x" style = "color: green"></i>
                  <i class="fa fa-star fa-5x" style = "color: green"></i>
                  <i class="fa fa-star fa-5x" style = "color: green"></i>
                  <i class="fa fa-star fa-5x" style = "color: green"></i>
                  <i class="fa fa-star fa-5x" style = "color: green;"></i>
                @endif
              </a>
               @if(Auth::user()->ratio > 0)
                  <h3>La <strong class="color-azul">Calificación</strong> de tus clientes es importante</h3>
                  <p>Para ayudarte a  
                  <strong>mejorar</strong> en los servicios que brindas.</p>
                @else
                  <h3>No Posee <strong class="color-azul">Calificación</strong> actualmente</h3>
                  <p>Es Importante Tener una  
                  <strong>Calificación</strong> de las ofertas que registras.</p>
                @endif
        </div>
      @endif
    </div>
  </div> 

