@extends('app')
@section('css')
 <link rel="stylesheet" href="/css/autocomplete.css">
@endsection
@section('content')
   <div id="jumbotron-landing" class="jumbotron">
      <div class="container">
        <div class="row">
          <div class="pull-left">
            {{-- <img src="images/logjo.png" alt="Logooo"> --}}
          </div>
          <div class="pull-right">
           @include('partials.layout.sociales')
          </div>
        </div>
        <div class="row text-center">
          <div class="col-xs-12">
            <h1><strong>SUS TRABAJOS REALIZADOS</strong></h1>
            <h3><strong>ENCUENTRA AL PROFESIONAL QUE NECESITAS</strong></h3>
             <p><img src="/images/imagen.png" alt=""  style="width:100px;"></p>
          </div>
        </div>

        <div class="row">
          
          <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1 text-center">
            <form id="BusquedaLandingForm" method="POST" action ="#">
              <div class="input-group">
                  <div class="autocomplete">
                    <input id="input-cta" type="text" class="form-control" placeholder="¿Que proyecto necesitas?" required maxlength="1"></input>
                    </br>
                  </div>
                <span class="input-group-btn">
                  <button id="button-cta"class="btn btn-warning" type="button" ><i class="fa fa-search" aria-hidden="true"></i>&nbsp; Buscar</button>
                </span>
                
              </div>

              <span class="input-group-btn">
                  <a id="button-cotizacion" href="{{route('cotizacion/registrar')}}" class="btn btn-principal" type="button"><i class="fa fa-money" aria-hidden="true"></i></i>&nbsp; Solicita tu Cotización</a>
                </span>
            </form>
            <br>
            <span id="Error-Mensaje-input-cta" class="lbl-error text-center"></span>
          </div>

        </div>
              
      </div>
   </div>
 @include('partials.layout.fundamentos-landing')
 @include('partials.layout.publicas')
 @include('partials.layout.comentarios') 

@endsection
@section('content-miembros')
    <div id="jumbotron-miembros" class="jumbotron">
          <div class="container">
            <div class="row">
              <div class="pull-left">
                {{-- <img src="images/logjo.png" alt="Logooo"> --}}
              </div>
              <div class="pull-right">
                @include('partials.layout.sociales');
              </div>
            </div>
            

            <div class="row">
              
              <div class="col-xs-12 text-center">
              <h2>Servicios Populares<h2>
              <div class="hidden-xs row text-center">
              <div class="col-xs-12">
              <ul class="list-inline">
              <li>
              <a href="{{route('Proveedores/Servicios',['id'=> 2])}}" class="servicios-populares">
              <label class="servicios-populares"><small class="lbl-small">Electricistas</small></label>
              <p><i class="fa fa-lightbulb-o fa-3x" aria-hidden="true"></i></p>
              </a>
              </li>
              <li>
              <a href="{{route('Proveedores/Servicios',['id'=> 4])}}" class="servicios-populares">
              <label><small class="lbl-small">Pintores</small></label>
              <p><i class="fa fa-paint-brush fa-3x" aria-hidden="true"></i></p>
              </a>
              </li>
              <li>
              <a href="{{route('Proveedores/Servicios',['id'=> 5])}}" class="servicios-populares">
              <label><small class="lbl-small">Gasfiteros</small></label>
              <p><i class="fa fa-bath  fa-3x" aria-hidden="true"></i></p>
              </a>
              </li>
              <li>
              <a href="{{route('Proveedores/Servicios',['id'=> 8])}}" class="servicios-populares">
              <label><small class="lbl-small">Médicos</small></label>
              <p><i class="fa fa-user-md fa-3x" aria-hidden="true"></i></p>
              </a>
              </li>
              <li>
              <a href="{{route('Proveedores/Servicios',['id'=> 10])}}" class="servicios-populares">
              <label><small class="lbl-small">Mecánicos</small></label>
              <p><i class="fa fa-car fa-3x" aria-hidden="true"></i></p>
              </a>
              </ul>
              </div>
              </div>
                <span id="Error-Mensaje-input-cta" class="lbl-error text-center"></span>
              </div>

            </div>
            <div class="row">  
                  <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1 text-center">
                    <form id="BusquedaLandingForm" method="POST" action ="#">
                      <div class="input-group">
                        <div class="autocomplete">
                          <input id="input-cta" type="text" class="form-control" placeholder="¿Que proyecto necesitas?" required maxlength="1"></input>
                          </br>
                        </div>    
                        <span class="input-group-btn">
                          <button id="button-cta"class="btn btn-warning" type="button"><i class="fa fa-search" aria-hidden="true"></i>&nbsp; Buscar</button>
                        </span>
                      </div>
                      <span class="input-group-btn">
                          <a id="button-cotizacion" href="{{route('cotizacion/registrar')}}" class="btn btn-principal" type="button"><i class="fa fa-money" aria-hidden="true"></i></i>&nbsp; Solicita tu Cotización</a>
                        </span>
                    </form>
                  </div>
                </div> 
          </div>
    </div>
        @include('partials.layout.privadas')
    @include('partials.layout.publicas')
    @include('partials.layout.comentarios')
@endsection
@section('content-proveedores')
   <div id="jumbotron-landing" class="jumbotron">
      <div class="container">
        <div class="row">
          <div class="pull-left">
           {{--  <img src="images/logjo.png" alt="Logooo"> --}}
          </div>
          <div class="pull-right">
           @include('partials.layout.sociales')
          </div>
        </div>
        <div class="row text-center">
          <div class="col-xs-12">
            <h1><strong>BRINDA UN SERVICIO DE CALIDAD</strong></h1>
            <h3><strong>ENCUENTRA A TUS FUTUROS CLIENTES</strong></h3>
            <p><img src="/images/imagen.png" alt=""  style="width:100px;"></p>
          </div>
        </div>

        </div> 
        
      </div>
  </div>
  @include('partials.layout.fundamentos-proveedor')
@endsection
@section('scripts')
<script src="/js/autocomplete.jquery.js"></script>
<script>
$(document).ready(function()
{
     $('.autocomplete').autocomplete();
});
</script>
@endsection