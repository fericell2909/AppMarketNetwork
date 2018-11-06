@extends('app')
 @section('javascript')
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBC-ueG56d4pm8xrNLlPssupxlCCuwWIOo&libraries=adsense&language=es"></script>
@endsection
@section('content-proveedores')
<br>
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-10 col-sm-offset-1">
			<h1 class="text-center color-azul"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp; Proyecto Realizado N° : {{$proyectos[0]->id}} &nbsp; <i class="fa fa-pencil-square-o" aria-hidden="true"></i></h1>
            <ul class="nav nav-pills">
                <li class="active"><a data-toggle="pill" href="#home"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;Datos del Proyecto </a></li>
            </ul>
            <div class="tab-content">
           
            <div id="home" class="tab-pane fade in active">
                    <div class="panel panel-default">

                      <div class="panel-heading fondo-naranja-oscuro color-blanco">
                          <h2 class="panel-title text-center" style="font-weight:bold;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp; Mi Proyecto</h2>
                      </div>
                    <div class="panel-body">
                             
                            <div class="form-group">
                                <label class="color-azul">Titulo de Proyecto</label>
                                <input type="text" class="form-control" id="titulo_proyecto" name="titulo_proyecto"  required maxlength="100" value="{{$proyectos[0]->titulo_proyecto}}" readonly>
                                <span  id ="ErrorMensaje-titulo_proyecto" class="help-block"></span>
                            </div>
                            <div class="form-group">
                                <label class="color-azul">Estado de Proyecto</label>
                                 <select class="form-control text-center" name="estado_proyecto_id" id="estado_proyecto_id" readonly>
                                  
                                      <option value="{{ $proyectos[0]->estado_proyecto_id }}" selected>{{ $proyectos[0]->nombre_estado }}</option>
                                  
                                </select>    
                                <span  id ="ErrorMensaje-estado_proyecto" class="help-block"></span>
                            </div>
                            <div class="form-group">
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-3">
                                    <label class="color-azul">Mes</label>
                                    <select class="form-control text-center" name="mes_id" id="mes_id" readonly>
                                        <option value="{{$proyectos[0]->mes_id}}">{{ $proyectos[0]->nombre_mes }}</option>  
                                    <span  id ="ErrorMensaje-mes_id" class="help-block"></span>
                                </select>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <label class="color-azul">Año</label>
                                    <select class="form-control text-center" name="anio_id" id="anio_id" readonly>
                                        <option value="{{ $proyectos[0]->anio_id }}">{{ $proyectos[0]->nombre_anio }}</option>  
	                                    <span  id ="ErrorMensaje-anio_id" class="help-block"></span>
	                                </select>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <label class="color-azul">Costo del Proyecto</label>
                                    <input type="number" step="0.1" class="form-control"  id="costo_proyecto" name="costo_proyecto" value="{{ $proyectos[0]->costo_proyecto }}" readonly>
                                	<span  id ="ErrorMensaje-costo_proyecto" class="help-block"></span>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <label class="color-azul">Moneda</label>
                                     <select class="form-control text-center" name="moneda_id" id="moneda_id" readonly>
                                        <option value="{{ $proyectos[0]->moneda_id }}">{{ $proyectos[0]->descripcion_moneda }}</option>  
	                                    <span  id ="ErrorMensaje-moneda_id" class="help-block"></span>
	                                </select>
                                </div>

                            </div>
                            <div class="form-group">
                            </div>
                            
                            <div class="form-group">
                                <label class="color-azul">Por favor proporcione una breve descripción con los detalles del proyecto realizado:</label>
                                <textarea class="color-negro" name="descripcion_proyecto" id ="descripcion_proyecto" rows=10 style="width: 100%" readonly>{{$proyectos[0]->descripcion_proyecto}}</textarea>
                                <span  id ="ErrorMensaje-descripcion_proyecto" class="help-block"></span>
                            </div>

                            <div class = "form-group" style="margin-bottom:0;">
                                <label class="color-azul">¿ Dónde se realizó el proyecto ?</label>
                            </div>

                            <div class="form-group row">
                              <div class="col-sm-4">
                                <label class="color-azul">Departamento</label>
                                   <select class="form-control text-center" name="proyecto_id_departamento" id="proyecto_id_departamento" readonly>
                                      <option value="{{ $proyectos[0]->proyecto_id_departamento }}">{{ $proyectos[0]->Nombre_Departamento }}</option>  
                                      <span  id ="ErrorMensaje-proyecto_id_departamento" class="help-block"></span>
                                    </select>  
                              </div>
                              <div class="col-sm-4">
                                <label class="color-azul">Provincia</label>
                                   <select class="form-control text-center" name="proyecto_id_provincia" id="proyecto_id_provincia" readonly>
                                        <option value="{{ $proyectos[0]->proyecto_id_provincia }}">{{ $proyectos[0]->Nombre_Provincia }}</option>  
                                      <span  id ="ErrorMensaje-proyecto_id_provincia" class="help-block"></span>
                                    </select>
                              </div>
                              <div class="col-sm-4">
                                <label class="color-azul">Distrito</label>
                                   <select class="form-control text-center" name="proyecto_id_distrito" id="proyecto_id_distrito" readonly>
                                      <option value="{{ $proyectos[0]->proyecto_id_distrito }}">{{ $proyectos[0]->Nombre_Distrito }}</option>  
                                      <span  id ="ErrorMensaje-proyecto_id_distrito" class="help-block"></span>
                                    </select>  
                              </div>
                            </div>
                            <div class="form-group">
                                  <label class="color-azul">Dirección de Proyecto</label>
                                  <input type="text" class="form-control" id="direccion_proyecto" name="direccion_proyecto" required maxlength="100" value="{{$proyectos[0]->direccion_proyecto}}" readonly>
                                  <span  id ="ErrorMensaje-direccion_proyecto" class="help-block"></span>
                            </div>

                            <div class="form-group">
                                      <div class="row">  
                                        <div class="col-xs-12 col-sm-6">
                                            <label class="color-azul">Latitud</label>
                                            <input type="text" name="latitud" id="latitud" class="form-control" value="{{$proyectos[0]->latitud}}" required pattern="" title="" readonly>
                                          </div>
                                        <div class="col-xs-12 col-sm-6">
                                          <label class="color-azul">Longitud</label>
                                          <input type="text" name="longitud" id="longitud" class="form-control" value="{{$proyectos[0]->longitud}}" required pattern="" title="" readonly>
                                        </div>
                                        <span  id ="ErrorMensaje-prov_address" class="help-block"></span>
                                      </div>
                                      <div class="form-group">
                                      </div>
                                     <div class="row">  
                                        <div class="col-xs-12">
                                        <label class="color-azul">Ubicación en el Mapa</label>
                                        <center><div id='map_canvas' style="background:#f7f7f7;"></div></center>
                                      </div>
                                </div>    
                            </div>
                            <div class="form-group">
                            	<div class="row">
                              @foreach($imagenes as $imagen)
                            		<div class="col-xs-12">
                                    <label class="color-azul">@if($imagen->nImagenPrincipal == 1) Imagen Principal @else 
                                    Imagen Secundaria @endif</label>
                                    <center><img src="{{$imagen->cRutaImagenProyecto}}" class="img-responsive" alt="Imagenes de Proyecto"/><center>
                                    <span  id ="ErrorMensaje-imagen_principal" class="help-block"></span>
                                </div>
                                @endforeach
                            	</div>
                            </div>
                            <div class="form-group">
                                <input type="text" style="display:none;" class="form-control" name="user_id"  value="{{Auth::user()->id}}">
                            </div>
                    </div>
                    </div>
            </div>

          </div>
   </div>
          </div>
   </div>

@endsection

@section('scripts')

<script>
$(document).ready(function()
{
  initialize();
  var map = null;
var infoWindow = null;
 
function openInfoWindow(marker) {
    var markerLatLng = marker.getPosition();
    /*infoWindow.setContent([
        '<strong>La posicion del marcador es:</strong><br/>',
        markerLatLng.lat(),
        ', ',
        markerLatLng.lng(),
        '<br/>Arrástrame para actualizar la posición.'
    ].join(''));*/

    //infoWindow.open(map, marker);

    $('#latitud').val(markerLatLng.lat());
    $('#longitud').val(markerLatLng.lng());
}

function initialize() {
    var myLatlng = new google.maps.LatLng($('#latitud').val(),$('#longitud').val());
    var myOptions = {
      zoom: 12,
      center: myLatlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }
 
    map = new google.maps.Map($('#map_canvas').get(0), myOptions);
    

    infoWindow = new google.maps.InfoWindow({});
 
    var marker = new google.maps.Marker({
        position: myLatlng,
        draggable: false,
        map: map,
        title:''
    });
 
    google.maps.event.addListener(marker, 'dragend', function(){ openInfoWindow(marker); });
    google.maps.event.addListener(marker, 'click', function(){ openInfoWindow(marker); });
}
});

  </script>
@endsection



