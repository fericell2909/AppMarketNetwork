@extends('app')
 @section('javascript')
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBC-ueG56d4pm8xrNLlPssupxlCCuwWIOo&libraries=adsense&language=es"></script>
@endsection
@section('content-miembros')
<br>
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-10 col-sm-offset-1">
			<h1 class="text-center color-azul"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp; Solicitud de Cotización N° : {{$cotizaciones[0]->id}}&nbsp; <i class="fa fa-pencil-square-o" aria-hidden="true"></i></h1>
            <ul class="nav nav-pills">
                <li class="active"><a data-toggle="pill" href="#home"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;Datos de la Cotización</a></li>
            </ul>
            <div class="tab-content">
           
            <div id="home" class="tab-pane fade in active">
                    <div class="panel panel-default">

                      <div class="panel-heading fondo-naranja-oscuro color-blanco">
                          <h2 class="panel-title text-center" style="font-weight:bold;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp; Ver Cotización</h2>
                      </div>
                    <div class="panel-body">
                             
                            <div class="form-group" style="display:none;">
                                <label class="color-azul">Titulo de Solicitud:</label>
                                <input type="text" class="form-control" id="titulo_cotizacion" name="titulo_cotizacion"  required maxlength="100" value="Solicitud de Cotización">
                                <span  id ="ErrorMensaje-titulo_cotizacion" class="help-block"></span>
                            </div>
                            <div class="form-group">
                                <label class="color-azul">¿ Qué Tipo de Proyecto, Servicio o Reparación deseas hacer?</label>
                                <select class="form-control text-center" name="servicio_id" id="servicio_id" readonly>
                                                  <option value="{{ $cotizaciones[0]->servicio_id }}">{{ $cotizaciones[0]->nombre_servicio }}</option>  
                                    <span  id ="ErrorMensaje-servicio_id" class="help-block"></span>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="color-azul">¿ Cuándo necesita que comience su proyecto o servicio o reparación?</label>
                                <select class="form-control text-center" name="tiempo_id" readonly id="tiempo_id">
                                        <option value="{{ $cotizaciones[0]->tiempo_id }}">{{ $cotizaciones[0]->tiempo_cotizacion }}</option>  
                                    <span  id ="ErrorMensaje-tiempo_id" class="help-block"></span>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label class="color-azul">Por favor proporcione una breve nota con los detalles del proyecto o servicio o repración:</label>
                                <textarea class="color-negro" name="descripcion_cotizacion" id ="descripcion_cotizacion" rows=10 style="width: 100%" readonly>
                                	{{$cotizaciones[0]->descripcion_cotizacion}}
                                </textarea>
                                <span  id ="ErrorMensaje-descripcion_cotizacion" class="help-block"></span>
                            </div>

                            <div class = "form-group">
                                <label class="color-azul">¿ Cuál es la mejor información de contacto para transmitir a los profesionales ?</label>
                                <div class="row">
                                  <div class="col-xs-12 col-sm-6">
                                    <label class="color-azul">Nombre</label>
                                    <input type="text" class="form-control" id="nombre_contacto_cotizacion" name="nombre_contacto_cotizacion"  title="El Nombre de Contacto es Requerido"  maxlength="50" readonly value="{{$cotizaciones[0]->nombre_contacto_cotizacion}}">
                                    <span  id ="ErrorMensaje-nombre_contacto_cotizacion" class="help-block"></span>
                                  </div>
                                  <div class="col-xs-12 col-sm-6">
                                    <label class="color-azul">Apellidos</label>
                                    <input type="text" class="form-control" id="apellido_contacto_cotizacion" name="apellido_contacto_cotizacion" maxlength="100" readonly value="{{$cotizaciones[0]->apellido_contacto_cotizacion}}" >
                                    <span  id ="ErrorMensaje-apellido_contacto_cotizacion" class="help-block"></span>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-xs-12 col-sm-6">
                                    <label class="color-azul">Celular</label>
                                    <input type="text" class="form-control" id="celular_contacto_cotizacion" name="celular_contacto_cotizacion"  required maxlength="9" readonly value="{{$cotizaciones[0]->celular_contacto_cotizacion}}">
                                    <span  id ="ErrorMensaje-celular_contacto_cotizacion" class="help-block"></span>
                                  </div>
                                  <div class="col-xs-12 col-sm-6">
                                    <label class="color-azul">Email</label>
                                    <input type="email" class="form-control" id="email_contacto_cotizacion" name="email_contacto_cotizacion"  required  readonly value="{{$cotizaciones[0]->email_contacto_cotizacion}}">
                                    <span  id ="ErrorMensaje-email_contacto_cotizacion" class="help-block"></span>
                                  </div>
                                </div>
                            </div>
                            <div class = "form-group" style="margin-bottom:0;">
                                <label class="color-azul">¿ Dónde se necesita un profesional ?</label>
                            </div>

                            <div class="form-group row">
                              <div class="col-sm-4">
                                <label class="color-azul">Departamento</label>
                                   <select class="form-control text-center" name="contacto_id_departamento" id="contacto_id_departamento">
                                                  <option value="{{$cotizaciones[0]->contacto_id_departamento }}">{{ $cotizaciones[0]->NombreDepartamento }}</option>  
                                      <span  id ="ErrorMensaje-cotizacion_departamento" class="help-block"></span>
                                    </select>  
                              </div>
                              <div class="col-sm-4">
                                <label class="color-azul">Provincia</label>
                                   <select class="form-control text-center" name="contacto_id_provincia" id="contacto_id_provincia">
                                            <option value="{{$cotizaciones[0]->contacto_id_provincia }}">{{ $cotizaciones[0]->NombreProvincia }}</option>   
                                      <span  id ="ErrorMensaje-cotizacion_provincia" class="help-block"></span>
                                    </select>  
                              </div>
                              <div class="col-sm-4">
                                <label class="color-azul">Distrito</label>
                                   <select class="form-control text-center" name="contacto_id_distrito" id="contacto_id_distrito">
                                                  <option value="{{$cotizaciones[0]->contacto_id_distrito }}">{{ $cotizaciones[0]->NombreDistrito }}</option>  
                                      <span  id ="ErrorMensaje-cotizacion_distrito" class="help-block"></span>
                                    </select>  
                              </div>
                            </div>
                            <div class="form-group">
                                  <label class="color-azul">Dirección</label>
                                  <input type="text" class="form-control" id="direccion_cotizacion" name="direccion_cotizacion"  required maxlength="100" value="{{$cotizaciones[0]->direccion_cotizacion }}" >
                                  <span  id ="ErrorMensaje-direccion_cotizacion" class="help-block"></span>
                            </div>

                            <div class="form-group">
                                      <div class="row">  
                                        <div class="col-xs-12 col-sm-6">
                                            <label class="color-azul">Latitud</label>
                                            <input type="text" name="latitud" id="latitud" class="form-control" value="{{$cotizaciones[0]->latitud }}" required pattern="" title="" readonly>
                                          </div>
                                        <div class="col-xs-12 col-sm-6">
                                          <label class="color-azul">Longitud</label>
                                          <input type="text" name="longitud" id="longitud" class="form-control" value="{{$cotizaciones[0]->longitud }}" required pattern="" title="" readonly>
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

@if($cotizaciones[0]->chk_adjuntar == 1)
<div class="form-group">
	  <label class="color-azul">Imagen Adjunta</label>
  <center><img src="{{$cotizaciones[0]->cRutaArchivoAdjunto}}" class="img-responsive" alt="Imagen de Solicitud"></center>
</div>
@endif
                            <div class="form-group" style = "display:none;">
                                <input type="text" style="display:none;" class="form-control" name="user_id"  value="{{Auth::user()->id}}">
                                <input type="submit" id = "btnRegistrarCotizacion" class="btnRegistrarCotizacion btn btn-principal" style="margin-left:15px;" value="Registrar Cotización">
                                <img src="/images/loading.gif" alt="" id="gifloading" style ="display:none;">
                            </div>
                    </div>
                    </div>
            </div>
          </div>
   </div>
          </div>
   </div>


@endsection
@section('content-proveedores')
<br>
<div class="container">
  <div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1">
      <h1 class="text-center color-azul"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp; Solicitud de Cotización N° : {{$cotizaciones[0]->id}}&nbsp; <i class="fa fa-pencil-square-o" aria-hidden="true"></i></h1>
            <ul class="nav nav-pills">
                <li class="active"><a data-toggle="pill" href="#home"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;Datos de la Cotización</a></li>
            </ul>
            <div class="tab-content">
           
            <div id="home" class="tab-pane fade in active">
                    <div class="panel panel-default">

                      <div class="panel-heading fondo-naranja-oscuro color-blanco">
                          <h2 class="panel-title text-center" style="font-weight:bold;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp; Ver Cotización</h2>
                      </div>
                    <div class="panel-body">
                             
                            <div class="form-group" style="display:none;">
                                <label class="color-azul">Titulo de Solicitud:</label>
                                <input type="text" class="form-control" id="titulo_cotizacion" name="titulo_cotizacion"  required maxlength="100" value="Solicitud de Cotización">
                                <span  id ="ErrorMensaje-titulo_cotizacion" class="help-block"></span>
                            </div>
                            <div class="form-group">
                                <label class="color-azul">¿ Qué Tipo de Proyecto, Servicio o Reparación deseas hacer?</label>
                                <select class="form-control text-center" name="servicio_id" id="servicio_id" readonly>
                                                  <option value="{{ $cotizaciones[0]->servicio_id }}">{{ $cotizaciones[0]->nombre_servicio }}</option>  
                                    <span  id ="ErrorMensaje-servicio_id" class="help-block"></span>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="color-azul">¿ Cuándo necesita que comience su proyecto o servicio o reparación?</label>
                                <select class="form-control text-center" name="tiempo_id" readonly id="tiempo_id">
                                        <option value="{{ $cotizaciones[0]->tiempo_id }}">{{ $cotizaciones[0]->tiempo_cotizacion }}</option>  
                                    <span  id ="ErrorMensaje-tiempo_id" class="help-block"></span>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label class="color-azul">Por favor proporcione una breve nota con los detalles del proyecto o servicio o repración:</label>
                                <textarea class="color-negro" name="descripcion_cotizacion" id ="descripcion_cotizacion" rows=10 style="width: 100%" readonly>
                                  {{$cotizaciones[0]->descripcion_cotizacion}}
                                </textarea>
                                <span  id ="ErrorMensaje-descripcion_cotizacion" class="help-block"></span>
                            </div>

                            <div class = "form-group">
                                <label class="color-azul">¿ Cuál es la mejor información de contacto para transmitir a los profesionales ?</label>
                                <div class="row">
                                  <div class="col-xs-12 col-sm-6">
                                    <label class="color-azul">Nombre</label>
                                    <input type="text" class="form-control" id="nombre_contacto_cotizacion" name="nombre_contacto_cotizacion"  title="El Nombre de Contacto es Requerido"  maxlength="50" readonly value="{{$cotizaciones[0]->nombre_contacto_cotizacion}}">
                                    <span  id ="ErrorMensaje-nombre_contacto_cotizacion" class="help-block"></span>
                                  </div>
                                  <div class="col-xs-12 col-sm-6">
                                    <label class="color-azul">Apellidos</label>
                                    <input type="text" class="form-control" id="apellido_contacto_cotizacion" name="apellido_contacto_cotizacion" maxlength="100" readonly value="{{$cotizaciones[0]->apellido_contacto_cotizacion}}" >
                                    <span  id ="ErrorMensaje-apellido_contacto_cotizacion" class="help-block"></span>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-xs-12 col-sm-6">
                                    <label class="color-azul">Celular</label>
                                    <input type="text" class="form-control" id="celular_contacto_cotizacion" name="celular_contacto_cotizacion"  required maxlength="9" readonly value="{{$cotizaciones[0]->celular_contacto_cotizacion}}">
                                    <span  id ="ErrorMensaje-celular_contacto_cotizacion" class="help-block"></span>
                                  </div>
                                  <div class="col-xs-12 col-sm-6">
                                    <label class="color-azul">Email</label>
                                    <input type="email" class="form-control" id="email_contacto_cotizacion" name="email_contacto_cotizacion"  required  readonly value="{{$cotizaciones[0]->email_contacto_cotizacion}}">
                                    <span  id ="ErrorMensaje-email_contacto_cotizacion" class="help-block"></span>
                                  </div>
                                </div>
                            </div>
                            <div class = "form-group" style="margin-bottom:0;">
                                <label class="color-azul">¿ Dónde se necesita un profesional ?</label>
                            </div>

                            <div class="form-group row">
                              <div class="col-sm-4">
                                <label class="color-azul">Departamento</label>
                                   <select class="form-control text-center" name="contacto_id_departamento" id="contacto_id_departamento">
                                                  <option value="{{$cotizaciones[0]->contacto_id_departamento }}">{{ $cotizaciones[0]->NombreDepartamento }}</option>  
                                      <span  id ="ErrorMensaje-cotizacion_departamento" class="help-block"></span>
                                    </select>  
                              </div>
                              <div class="col-sm-4">
                                <label class="color-azul">Provincia</label>
                                   <select class="form-control text-center" name="contacto_id_provincia" id="contacto_id_provincia">
                                            <option value="{{$cotizaciones[0]->contacto_id_provincia }}">{{ $cotizaciones[0]->NombreProvincia }}</option>   
                                      <span  id ="ErrorMensaje-cotizacion_provincia" class="help-block"></span>
                                    </select>  
                              </div>
                              <div class="col-sm-4">
                                <label class="color-azul">Distrito</label>
                                   <select class="form-control text-center" name="contacto_id_distrito" id="contacto_id_distrito">
                                                  <option value="{{$cotizaciones[0]->contacto_id_distrito }}">{{ $cotizaciones[0]->NombreDistrito }}</option>  
                                      <span  id ="ErrorMensaje-cotizacion_distrito" class="help-block"></span>
                                    </select>  
                              </div>
                            </div>
                            <div class="form-group">
                                  <label class="color-azul">Dirección</label>
                                  <input type="text" class="form-control" id="direccion_cotizacion" name="direccion_cotizacion"  required maxlength="100" value="{{$cotizaciones[0]->direccion_cotizacion }}" >
                                  <span  id ="ErrorMensaje-direccion_cotizacion" class="help-block"></span>
                            </div>

                            <div class="form-group">
                                      <div class="row">  
                                        <div class="col-xs-12 col-sm-6">
                                            <label class="color-azul">Latitud</label>
                                            <input type="text" name="latitud" id="latitud" class="form-control" value="{{$cotizaciones[0]->latitud }}" required pattern="" title="" readonly>
                                          </div>
                                        <div class="col-xs-12 col-sm-6">
                                          <label class="color-azul">Longitud</label>
                                          <input type="text" name="longitud" id="longitud" class="form-control" value="{{$cotizaciones[0]->longitud }}" required pattern="" title="" readonly>
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

@if($cotizaciones[0]->chk_adjuntar == 1)
<div class="form-group">
    <label class="color-azul">Imagen Adjunta</label>
  <center><img src="{{$cotizaciones[0]->cRutaArchivoAdjunto}}" class="img-responsive" alt="Imagen de Solicitud"></center>
</div>
@endif
                            <div class="form-group" style = "display:none;">
                                <input type="text" style="display:none;" class="form-control" name="user_id"  value="{{Auth::user()->id}}">
                                <input type="submit" id = "btnRegistrarCotizacion" class="btnRegistrarCotizacion btn btn-principal" style="margin-left:15px;" value="Registrar Cotización">
                                <img src="/images/loading.gif" alt="" id="gifloading" style ="display:none;">
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


