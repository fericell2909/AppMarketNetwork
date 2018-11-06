@extends('app')
 @section('javascript')
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBC-ueG56d4pm8xrNLlPssupxlCCuwWIOo&libraries=adsense&language=es"></script>
@endsection
@section('content-proveedores')
<br>
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-10 col-sm-offset-1">
			<h1 class="text-center color-azul"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp; Edición de Proyecto Realizado N° : {{$proyectos[0]->id}} &nbsp; <i class="fa fa-pencil-square-o" aria-hidden="true"></i></h1>
            <ul class="nav nav-pills">
                <li class="active"><a data-toggle="pill" href="#home"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;Datos del Proyecto</a></li>
            </ul>
            <div class="tab-content">
           
            <div id="home" class="tab-pane fade in active">
                  {!! Form::open(['route' => 'proveedores/Actualizartrabajos', 'class' => 'form','method' => 'POST','id'=> 'EditarProyectoForm']) !!}
                    <div class="panel panel-default">

                      <div class="panel-heading fondo-naranja-oscuro color-blanco">
                          <h2 class="panel-title text-center" style="font-weight:bold;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp; Mi Proyecto</h2>
                      </div>
                    <div class="panel-body">
                            <div class="form-group">
                                <input type="text" class="form-control" id="codigo_proyecto" name="codigo_proyecto"  maxlength="100" value="{{$proyectos[0]->id}}" style ="display:none;">
                            </div> 
                            <div class="form-group">
                                <label class="color-azul">Titulo de Proyecto</label>
                                <input type="text" class="form-control" id="titulo_proyecto" name="titulo_proyecto"  required maxlength="100" value="{{$proyectos[0]->titulo_proyecto}}">
                                <span  id ="ErrorMensaje-titulo_proyecto" class="help-block"></span>
                            </div>
                            <div class="form-group">
                            </div>
                            <div class="form-group">
                                <label class="color-azul">Estado de Proyecto</label>
                                 <select class="form-control text-center" name="estado_proyecto_id" id="estado_proyecto_id">
                                	@foreach ($estados as $estado)
                                			@if($estado->id == $proyectos[0]->estado_proyecto_id)
                                				<option value="{{ $estado->id }}" selected>{{ $estado->nombre_estado }}</option>
                                			@else
                                				<option value="{{ $estado->id }}">{{ $estado->nombre_estado }}</option>
                                			@endif
                                        @endforeach
                                </select>    
                                <span  id ="ErrorMensaje-estado_proyecto" class="help-block"></span>
                            </div>
                            <div class="form-group">
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-3">
                                    <label class="color-azul">Mes</label>
                                    <select class="form-control text-center" name="mes_id" id="mes_id">
                                		@foreach ($meses as $mes)
                                			@if($mes->id == $proyectos[0]->mes_id)
                                				<option value="{{ $mes->id }}" selected>{{ $mes->nombre_mes }}</option>
                                			@else
                                				<option value="{{ $mes->id }}">{{ $mes->nombre_mes }}</option>
                                			@endif
                                        @endforeach 
                                    	<span  id ="ErrorMensaje-mes_id" class="help-block"></span>
                                	</select>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <label class="color-azul">Año</label>
                                    <select class="form-control text-center" name="anio_id" id="anio_id">
                                		@foreach ($anios as $anio)
                                            @if($anio->id == $proyectos[0]->anio_id)
                                            	<option value="{{ $anio->id }}" selected>{{ $anio->nombre_anio }}</option>  
                                        	@else
                                				<option value="{{ $anio->id }}">{{ $anio->nombre_anio }}</option>
                                			@endif
                                        @endforeach 
	                                    <span  id ="ErrorMensaje-anio_id" class="help-block"></span>
	                                </select>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <label class="color-azul">Costo del Proyecto</label>
                                    <input type="number" step="0.1" class="form-control"  id="costo_proyecto" name="costo_proyecto" value="{{$proyectos[0]->costo_proyecto}}">
                                	<span  id ="ErrorMensaje-costo_proyecto" class="help-block"></span>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <label class="color-azul">Moneda</label>
                                     <select class="form-control text-center" name="moneda_id" id="moneda_id">
                                   		@foreach ($monedas as $moneda)
                                   			@if($moneda->id == $proyectos[0]->moneda_id)
                                            	<option value="{{ $moneda->id }}" selected>{{ $moneda->descripcion_moneda }}</option>
                                            @else
                                            	<option value="{{ $moneda->id }}">{{ $moneda->descripcion_moneda }}</option>
                                            @endif
                                        @endforeach 
	                                    <span  id ="ErrorMensaje-moneda_id" class="help-block"></span>
	                                </select>
                                </div>

                            </div>
                            <div class="form-group">
                            </div>
                            
                            <div class="form-group">
                                <label class="color-azul">Por favor proporcione una breve descripción con los detalles del proyecto realizado:</label>
                                <textarea class="color-negro" name="descripcion_proyecto" id ="descripcion_proyecto" rows=10 style="width: 100%">{{$proyectos[0]->descripcion_proyecto}}</textarea>
                                <span  id ="ErrorMensaje-descripcion_proyecto" class="help-block"></span>
                            </div>

                            <div class = "form-group" style="margin-bottom:0;">
                                <label class="color-azul">¿ Dónde se realizó el proyecto ?</label>
                            </div>

                            <div class="form-group row">
                              <div class="col-sm-4">
                                <label class="color-azul">Departamento</label>
                                   <select class="form-control text-center" name="proyecto_id_departamento" id="proyecto_id_departamento">
                                	@foreach ($zonas_departamentos as $zonas_departamento)
                                        @if($zonas_departamento->id == $proyectos[0]->proyecto_id_departamento)
                                        	<option value="{{ $zonas_departamento->id }}" selected>{{ $zonas_departamento->cNomZona }}</option>
                                        @else
                                        	<option value="{{ $zonas_departamento->id }}">{{ $zonas_departamento->cNomZona }}</option>
                                        @endif 
                                    @endforeach 
                                    <span  id ="ErrorMensaje-proyecto_id_departamento" class="help-block"></span>
                                    </select>  
                              </div>
                              <div class="col-sm-4">
                                <label class="color-azul">Provincia</label>
                                   <select class="form-control text-center" name="proyecto_id_provincia" id="proyecto_id_provincia">
                                	@foreach ($zonas_provincias as $zonas_provincia)
                                        @if($zonas_provincia->id == $proyectos[0]->proyecto_id_provincia)
                                        	<option value="{{ $zonas_provincia->id }}" selected>{{ $zonas_provincia->cNomZona }}</option>
                                        @else
                                        	<option value="{{ $zonas_provincia->id }}">{{ $zonas_provincia->cNomZona }}</option>
                                        @endif 
                                    @endforeach 
                                      <span  id ="ErrorMensaje-proyecto_id_provincia" class="help-block"></span>
                                    </select>  
                              </div>
                              <div class="col-sm-4">
                                <label class="color-azul">Distrito</label>
                                   <select class="form-control text-center" name="proyecto_id_distrito" id="proyecto_id_distrito">
                                	@foreach ($zonas_distritos as $zonas_distrito)
                                         @if($zonas_distrito->id == $proyectos[0]->proyecto_id_distrito)
                                         	<option value="{{ $zonas_distrito->id }}" selected>{{ $zonas_distrito->cNomZona }}</option>  
                                    	@else
                                    		<option value="{{ $zonas_distrito->id }}">{{ $zonas_distrito->cNomZona }}</option>
                                    	@endif
                                    @endforeach 
                                      <span  id ="ErrorMensaje-proyecto_id_distrito" class="help-block"></span>
                                    </select>  
                              </div>
                            </div>
                            <div class="form-group">
                                  <label class="color-azul">Dirección de Proyecto</label>
                                  <input type="text" class="form-control" id="direccion_proyecto" name="direccion_proyecto" required maxlength="100" value="{{$proyectos[0]->direccion_proyecto}}" >
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
                                      </div>
                                      <div class="form-group">
                                      </div>
                                     <div class="row">  
                                        <div class="col-xs-12">
                                        <label class="color-azul">Ubícalo en el Mapa</label>
                                        <center><div id='map_canvas' style="background:#f7f7f7;"></div></center>
                                      </div>
                                </div>    
                            </div>
                            <div class="form-group">
                            	<div class="row">
                            		@foreach($imagenes as $imagen)
                            			<div class="col-xs-12">
                                    		<label class="color-azul">
                                    			@if($imagen->nImagenPrincipal == 1) Imagen Principal 
                                    			@else Imagen Secundaria @endif
                                    		</label>
                                    		<center><img src="{{$imagen->cRutaImagenProyecto}}" class="img-responsive" alt="Imagenes de Proyecto"/><center>
                                        </div>
                                	@endforeach
                            	</div>
                            </div>

                            <div class="form-group">
                                <input type="text" style="display:none;" class="form-control" name="user_id"  value="{{Auth::user()->id}}">
                                <input type="submit" id = "btnEditarProyecto" class="btnEditarProyecto btn btn-principal" style="margin-left:5px;" value="Editar Proyecto">
                                <img src="/images/loading.gif" alt="" id="gifloading" style ="display:none;">
                            </div>
                    </div>
                    </div>
                {!! Form::close() !!}
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

function ValidarEmail(email){
    var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
     if (!regex.test(email)) {
      return false; //email incorrecto
     }
     else
     {
      return true;
     }
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
        draggable: true,
        map: map,
        title:'Arrastre el Marcador Hasta Ubicar su Negocio.'
    });
 
    google.maps.event.addListener(marker, 'dragend', function(){ openInfoWindow(marker); });
    google.maps.event.addListener(marker, 'click', function(){ openInfoWindow(marker); });
}

    $(".btnEditarProyecto").on('click', function(event) {

    var titulo_proyecto = $("#titulo_proyecto").val().trim();

    if( titulo_proyecto == null || titulo_proyecto.length == 0 ) {
      titulo_proyecto = null;
      $("#ErrorMensaje-titulo_proyecto").text('El titulo del proyecto no puede ser vacío.');
        $("#ErrorMensaje-titulo_proyecto").show();
        $("#titulo_proyecto").focus();
        return false;
      }

    var descripcion_proyecto =  $("#descripcion_proyecto").val().trim();

    if( descripcion_proyecto == null || descripcion_proyecto.length == 0 ) {
      descripcion_proyecto = null;
      $("#ErrorMensaje-descripcion_proyecto").text('El detalle del Proyecto no puede ser vacio');
        $("#ErrorMensaje-descripcion_proyecto").show();
        $("#descripcion_proyecto").focus();
        return false;
      }

    var costo_proyecto =  $("#costo_proyecto").val().trim();

    if( costo_proyecto == null || costo_proyecto.length == 0 || costo_proyecto <= 0) {
      costo_proyecto = null;
      $("#ErrorMensaje-costo_proyecto").text('El Costo del Proyecto debe ser mayor a cero.');
      $("#ErrorMensaje-costo_proyecto").show();
      $("#costo_proyecto").focus();
        return false;
      }
    
    var direccion_proyecto =  $("#direccion_proyecto").val().trim();

    if( costo_proyecto == null || direccion_proyecto.length == 0) {
      direccion_proyecto = null;
      $("#ErrorMensaje-direccion_proyecto").text('La Dirección del proyecto no puede ser vacío.');
      $("#ErrorMensaje-direccion_proyecto").show();
      $("#direccion_proyecto").focus();
        return false;
      }

       // var archivo_principal = $('#imagen_principal').val();

       //    if (archivo_principal.length <= 0 ) {

       //      $('#ErrorMensaje-imagen_principal').text('Debe seleccionar una Imagen Principal a Cargar');
       //      $('#ErrorMensaje-imagen_principal').show();

       //      return false;

       //    };

       // var archivo_uno = $('#imagen_uno').val();

       //    if (archivo_uno.length <= 0 ) {

       //      $('#ErrorMensaje-imagen_uno').text('La Imagen Uno no ha sido cargada.');
       //      $('#ErrorMensaje-imagen_uno').show();

       //      return false;

       //    };

       //  var archivo_dos = $('#imagen_dos').val();

       //    if (archivo_dos.length <= 0 ) {

       //      $('#ErrorMensaje-imagen_dos').text('La imagen dos no ha sido cargada.');
       //      $('#ErrorMensaje-imagen_dos').show();

       //      return false;

       //    };

		$("#gifloading").show();

  });

$('#direccion_proyecto').on("keypress",function (){
    $("#ErrorMensaje-direccion_proyecto").hide();
  })


$('#costo_proyecto').on("keypress",function (){
    $("#ErrorMensaje-costo_proyecto").hide();
  })

$('#titulo_proyecto').on("keypress",function (){
    $("#ErrorMensaje-titulo_proyecto").hide();
  })

$('#descripcion_proyecto').on("keypress",function (){
    $("#ErrorMensaje-descripcion_proyecto").hide();
  })

$('select[name=proyecto_id_departamento]').change(function(){

$('#proyecto_id_provincia option').remove();
      GetDataProvincia($('select[name=proyecto_id_departamento]').val());

      event.preventDefault();
    
});

$('select[name=proyecto_id_provincia]').change(function(){

      $('#proyecto_id_distrito option').remove();
      GetDataDistrito($('select[name=proyecto_id_provincia]').val());
      event.preventDefault();
    
    });

});

function GetDataProvincia(codigo)
{

jQuery.ajax({
  url: '../../cotizacion/ListarProvincias/' + codigo,
  type: 'POST',
  data: {id: codigo},
  success: function(respuesta){

          var lista = [].slice.call(respuesta);
           $.each(respuesta, function(index, value) {

              $('#proyecto_id_provincia').append($('<option>', { 
                                    value:lista[index].id,
                                    text : lista[index].cNomZona
                }));
                   
           });

     $('#proyecto_id_distrito option').remove();

    GetDataDistrito($('select[name=proyecto_id_provincia]').val());      

      }
    })
    .fail(function()
        {
              alert('No response from server');
        });


}

function GetDataDistrito(codigo)
{

jQuery.ajax({
  url: '../../cotizacion/ListarDistritos/' + codigo,
  type: 'POST',
  data: {id: codigo},
  success: function(respuesta){

          var lista = [].slice.call(respuesta);
           $.each(respuesta, function(index, value) {

              $('#proyecto_id_distrito').append($('<option>', { 
                                    value:lista[index].id,
                                    text : lista[index].cNomZona
                }));
                    
                   
           });

      }
    })
    .fail(function()
        {
              alert('No response from server');
        });

}

  </script>
@endsection