@extends('app')
 @section('javascript')
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBC-ueG56d4pm8xrNLlPssupxlCCuwWIOo&libraries=adsense&language=es"></script>
@endsection
@section('content-miembros')
<br>
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-10 col-sm-offset-1">
			<h1 class="text-center color-azul"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp; Gestión de Cotizaciones&nbsp; <i class="fa fa-pencil-square-o" aria-hidden="true"></i></h1>
            <ul class="nav nav-pills">
                <li class="active"><a data-toggle="pill" href="#home"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;Registrar Cotizacion</a></li>
                <li><a data-toggle="pill" href="#comentarios"><i class="fa fa-commenting-o" aria-hidden="true"></i>&nbsp;Cotizaciones Registradas</a></li>
            </ul>
            <div class="tab-content">
           
            <div id="home" class="tab-pane fade in active">
                  {!! Form::open(['route' => 'cotizacion/registrar', 'class' => 'form','method' => 'POST','id'=> 'RegistroCotizacionForm','files' => true]) !!}
                    <div class="panel panel-default">

                      <div class="panel-heading fondo-naranja-oscuro color-blanco">
                          <h2 class="panel-title text-center" style="font-weight:bold;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp; Tu Cotización</h2>
                      </div>
                    <div class="panel-body">
                             
                            <div class="form-group" style="display:none;">
                                <label class="color-azul">Titulo de Solicitud:</label>
                                <input type="text" class="form-control" id="titulo_cotizacion" name="titulo_cotizacion"  required maxlength="100" value="Solicitud de Cotización">
                                <span  id ="ErrorMensaje-titulo_cotizacion" class="help-block"></span>
                            </div>
                            <div class="form-group">
                                <label class="color-azul">¿ Qué Tipo de Proyecto, Servicio o Reparación deseas hacer?</label>
                                <select class="form-control text-center" name="servicio_id" id="servicio_id">
                                  <?php foreach ($servicios as $servicio): ?>
                                                  <option value="{{ $servicio->id }}">{{ $servicio->nombre_servicio }}</option>  
                                              <?php endforeach;?> 
                                    <span  id ="ErrorMensaje-servicio_id" class="help-block"></span>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="color-azul">¿ Cuándo necesita que comience su proyecto o servicio o reparación?</label>
                                <select class="form-control text-center" name="tiempo_id" id="tiempo_id">
                                <?php foreach ($categorias as $categoria): ?>
                                                  <option value="{{ $categoria->id }}">{{ $categoria->tiempo_cotizacion }}</option>  
                                              <?php endforeach;?> 


                                    <span  id ="ErrorMensaje-tiempo_id" class="help-block"></span>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label class="color-azul">Por favor proporcione una breve nota con los detalles del proyecto o servicio o repración:</label>
                                <textarea class="color-negro" name="descripcion_cotizacion" id ="descripcion_cotizacion" rows=10 style="width: 100%"></textarea>
                                <span  id ="ErrorMensaje-descripcion_cotizacion" class="help-block"></span>
                            </div>

                            <div class = "form-group">
                                <label class="color-azul">¿ Cuál es la mejor información de contacto para transmitir a los profesionales ?</label>
                                <div class="row">
                                  <div class="col-xs-12 col-sm-6">
                                    <label class="color-azul">Nombre</label>
                                    <input type="text" class="form-control" id="nombre_contacto_cotizacion" name="nombre_contacto_cotizacion"  title="El Nombre de Contacto es Requerido"  maxlength="50" placeholder="Ejm: Juan" required/>
                                    <span  id ="ErrorMensaje-nombre_contacto_cotizacion" class="help-block"></span>
                                  </div>
                                  <div class="col-xs-12 col-sm-6">
                                    <label class="color-azul">Apellidos</label>
                                    <input type="text" class="form-control" id="apellido_contacto_cotizacion" name="apellido_contacto_cotizacion"  required maxlength="100" placeholder="Ejm: Perez">
                                    <span  id ="ErrorMensaje-apellido_contacto_cotizacion" class="help-block"></span>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-xs-12 col-sm-6">
                                    <label class="color-azul">Celular</label>
                                    <input type="text" class="form-control" id="celular_contacto_cotizacion" name="celular_contacto_cotizacion"  required maxlength="9" placeholder="Ejm: 955453126">
                                    <span  id ="ErrorMensaje-celular_contacto_cotizacion" class="help-block"></span>
                                  </div>
                                  <div class="col-xs-12 col-sm-6">
                                    <label class="color-azul">Email</label>
                                    <input type="email" class="form-control" id="email_contacto_cotizacion" name="email_contacto_cotizacion"  required  placeholder="example@example.com">
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
                                <?php foreach ($zonas_departamentos as $zonas_departamento): ?>
                                                  <option value="{{ $zonas_departamento->id }}">{{ $zonas_departamento->cNomZona }}</option>  
                                              <?php endforeach;?> 
                                      <span  id ="ErrorMensaje-cotizacion_departamento" class="help-block"></span>
                                    </select>  
                              </div>
                              <div class="col-sm-4">
                                <label class="color-azul">Provincia</label>
                                   <select class="form-control text-center" name="contacto_id_provincia" id="contacto_id_provincia">
                                <?php foreach ($zonas_provincias as $zonas_provincia): ?>
                                                  <option value="{{ $zonas_provincia->id }}">{{ $zonas_provincia->cNomZona }}</option>  
                                              <?php endforeach;?> 
                                      <span  id ="ErrorMensaje-cotizacion_provincia" class="help-block"></span>
                                    </select>  
                              </div>
                              <div class="col-sm-4">
                                <label class="color-azul">Distrito</label>
                                   <select class="form-control text-center" name="contacto_id_distrito" id="contacto_id_distrito">
                                <?php foreach ($zonas_distritos as $zonas_distrito): ?>
                                                  <option value="{{ $zonas_distrito->id }}">{{ $zonas_distrito->cNomZona }}</option>  
                                              <?php endforeach;?> 
                                      <span  id ="ErrorMensaje-cotizacion_distrito" class="help-block"></span>
                                    </select>  
                              </div>
                            </div>
                            <div class="form-group">
                                  <label class="color-azul">Dirección</label>
                                  <input type="text" class="form-control" id="direccion_cotizacion" name="direccion_cotizacion"  required maxlength="100" value="" placeholder="Dirección">
                                  <span  id ="ErrorMensaje-direccion_cotizacion" class="help-block"></span>
                            </div>

                            <div class="form-group">
                                      <div class="row">  
                                        <div class="col-xs-12 col-sm-6">
                                            <label class="color-azul">Latitud</label>
                                            <input type="text" name="latitud" id="latitud" class="form-control" value="-12.10113608004072" required pattern="" title="" readonly>
                                          </div>
                                        <div class="col-xs-12 col-sm-6">
                                          <label class="color-azul">Longitud</label>
                                          <input type="text" name="longitud" id="longitud" class="form-control" value="-77.03570354187013" required pattern="" title="" readonly>
                                        </div>
                                        <span  id ="ErrorMensaje-prov_address" class="help-block"></span>
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
                              <div class="checkbox">
                                <label class="color-azul">
                                  <input type="text" name="chk_adjuntar" id="chk_adjuntar" class="form-control" style="display:none;">
                                  <input type="checkbox" id="chk_adjuntar_archivo" name="chk_adjuntar_archivo" >
                                  Adjuntar Foto
                                </label>
                                <input type="file" id="archivo_adjunto" name="archivo_adjunto" class="form-control" style="display:none;" accept="image/*">
                                <span  id ="ErrorMensaje-archivo_adjunto" class="help-block"></span>
                              </div>
                            </div>
                            <div class="form-group">
                                <input type="text" style="display:none;" class="form-control" name="user_id"  value="{{Auth::user()->id}}">
                                <input type="submit" id = "btnRegistrarCotizacion" class="btnRegistrarCotizacion btn btn-principal" style="margin-left:15px;" value="Registrar Cotización">
                                <img src="/images/loading.gif" alt="" id="gifloading" style ="display:none;">
                            </div>
                    </div>
                    </div>
                {!! Form::close() !!}
            </div>

            <div id="comentarios" class="tab-pane fade">
                <div class="panel panel-default">

                  <div class="panel-heading fondo-naranja-oscuro color-blanco">
                      <h2 class="panel-title text-center" style="font-weight:bold;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp; Listado de Cotizaciones</h2>
                  </div>
                  <div class="panel-body">
                    @if(COUNT($cotizaciones) > 0)
                      <div class="table-responsive" id="lista-cotizaciones">
                          @include('cotizacion.table')
                      </div>
                      
                      <div id="ListaComentarios">

                      </div>                    
                    @else
                        <div class="row">
                              <ul class="list-group">
                                  <li class="list-group-item active"><i class="fa fa-lock" aria-hidden="true"></i>&nbsp;Cotizaciones&nbsp;<span class="badge">0</span></li>
                                  <li class="list-group-item">
                                      <center>
                                          <img src="/images/cero.png" title="Cero Cotizaciones"  class="img img-responsive">
                                          <p class="color-azul cuenta-usuario-row"><b>No tiene Cotizaciones Registradaas</b></p>
                                          <p class="color-azul cuenta-usuario-row">Cuando Ud. Registre Cotizaciones aparecerán aquí.</p>
                                      </center>
                                  </li>
                              </ul>
                        </div>
                    @endif
                  </div>
                      

                </div>
            </div>
                 
            </div>
          </div>
   </div>
          </div>
   </div>


<div class="modal fade" id="AgregarComentario">
  <div class="modal-dialog">

  {!! Form::open(['route' => 'cotizacion/AgregarComentario', 'class' => 'form','method' => 'POST','id'=> 'AgregarComentarioCotizacionForm']) !!}

      <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title text-center color-azul">Registrar Comentario</h4>
            
            <h2 class="modal-title text-center color-rojo" id="TituloCotizacion">dd</h2>
          </div>
          <div class="modal-body">
                    <div class="form-group">
                      <label class="color-azul" style="font-weigth: 300;">Nombre de Usuario</label>
                         <div class="col-xs-12">
                          <label style="background-color:white;">
                          <?php if (Auth::user()->users_tipos_id  == 1 ): ?>
                                {{Auth::user()->Nombres}}
                            <?php else: ?>
                                {{Auth::user()->prov_razon_social}}
                            <?php endif ?>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                      <label class="color-azul" style="font-weigth: 300;">Correo Electronico</label>
                      <div class="col-xs-12">
                        <label style="background-color:white;">
                              {{Auth::user()->email}}"
                        </label>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="color-azul" style="font-weigth: 300;">Comentario</label>
                      <textarea style="background-color:white;" name="descripcion_comentario" placeholder="Escribir Comentario" class="form-control" rows="10"></textarea>
                      
                      <textarea  class="text-center color-azul" style="visibility: hidden;" name="cotizaciones_id" id="cotizaciones_id" rows="1"></textarea>
                      
                    </div> 

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Salir</button>
            <input type="submit" id="btnRegistrarComentario" class="btn btn-principal btnRegistrarComentario" value="Registrar Comentario">
          </div>
      </div>
    {!! Form::close() !!}
  </div>
</div>

@endsection

@section('scripts')

<script>
 $(window).on('hashchange', function() {
        if (window.location.hash) {
            var page = window.location.hash.replace('#', '');
            if (page == Number.NaN || page <= 0) {
                return false;
            }else{
                getData(page);
            }
        }
    });
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
    var myLatlng = new google.maps.LatLng(-12.10113608004072, -77.03570354187013);
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

     $(document).on('click', '.pagination a',function(event)
    {
        $('li').removeClass('active');
        $(this).parent('li').addClass('active');
        event.preventDefault();
        var myurl = $(this).attr('href');
       var page=$(this).attr('href').split('page=')[1];
       getData(page);
    });

    $(".btnVerComentario").bind("click",function(evt) {
      //alert('hizo clic');

      if ($("#comentarios-"+$(this).data('codigo-cotizacion')).is(":visible")) 
        {
             $("#comentarios-"+$(this).data('codigo-cotizacion')).hide();
        } 
        else
          {
            $(".comentarios-users-"+$(this).data('codigo-cotizacion')).empty();
            postDataComentarios($(this).data('codigo-cotizacion'));      
          };
      
      //comentarios-$(this).data('codigo-cotizacion')
      //$("#comentarios-" + $(this).data('codigo-cotizacion')).show();
      //evt.preventDefault();
    });

    $("#chk_adjuntar_archivo").on("change", function(evt) {

       if($(this).is(":checked")) {

          $('#archivo_adjunto').show();
            
        }
        else
        {
          $('#archivo_adjunto').hide();
        }
    });    


    $("#btnRegistrarComentario").on("click", function(evt) {

        var descripcion_comentario = $('#descripcion_comentario').val().trim();

          if( descripcion_comentario == null || descripcion_comentario.length == 0  ) {
            descripcion_comentario = null;
            $("#ErrorMensaje-descripcion_comentario").text('El comentario no puede ser vacio.');
              $("#ErrorMensaje-descripcion_comentario").show();
              $("#descripcion_comentario").focus();
              return false;
            }
      });

    $(".btnRegistrarCotizacion").on('click', function(event) {

    var titulo_solicitud = $("#titulo_cotizacion").val().trim();

    if( titulo_solicitud == null || titulo_solicitud.length == 0 ) {
      titulo_solicitud = null;
      $("#ErrorMensaje-titulo_cotizacion").text('El titulo de la solicitud no puede ser vacío.');
        $("#ErrorMensaje-titulo_cotizacion").show();
        $("#titulo_cotizacion").focus();
        return false;
      }

    var descripcion_cotizacion =  $("#descripcion_cotizacion").val().trim();

    if( descripcion_cotizacion == null || descripcion_cotizacion.length == 0 ) {
      descripcion_cotizacion = null;
      $("#ErrorMensaje-descripcion_cotizacion").text('El detalle de la solicitud de cotización no puede ser vacio');
        $("#ErrorMensaje-descripcion_cotizacion").show();
        $("#descripcion_cotizacion").focus();
        return false;
      }

      var nombre_contacto_cotizacion =  $("#nombre_contacto_cotizacion").val().trim();

      if( nombre_contacto_cotizacion == null || nombre_contacto_cotizacion.length == 0  ) {
        nombre_contacto_cotizacion = null;
        $("#ErrorMensaje-nombre_contacto_cotizacion").text('El Nombre del Contacto No puede ser vacio');
        $("#ErrorMensaje-nombre_contacto_cotizacion").show();
        $("#nombre_contacto_cotizacion").focus();
        return false;
        }

      var apellido_contacto_cotizacion =  $("#apellido_contacto_cotizacion").val().trim();

      if( apellido_contacto_cotizacion == null || apellido_contacto_cotizacion.length == 0  ) {
        apellido_contacto_cotizacion = null;
        $("#ErrorMensaje-apellido_contacto_cotizacion").text('El Apellido del Contacto No puede ser Vacío.');
        $("#ErrorMensaje-apellido_contacto_cotizacion").show();
        $("#apellido_contacto_cotizacion").focus();
        return false;
        }


      var celular_contacto_cotizacion = $("#celular_contacto_cotizacion").val().trim();

      if( celular_contacto_cotizacion == null || celular_contacto_cotizacion.length == 0  ) {
        celular_contacto_cotizacion = null;
        $("#ErrorMensaje-celular_contacto_cotizacion").text('El Celular del Contacto No puede ser Vacío.');
        $("#ErrorMensaje-celular_contacto_cotizacion").show();
        $("#celular_contacto_cotizacion").focus();
        return false;
        }

      var email_contacto_cotizacion = $("#email_contacto_cotizacion").val().trim();

      if( email_contacto_cotizacion == null || email_contacto_cotizacion.length == 0  ) {
        email_contacto_cotizacion = null;
        $("#ErrorMensaje-email_contacto_cotizacion").text('El Email del Contacto No puede ser Vacío.');
        $("#ErrorMensaje-email_contacto_cotizacion").show();
        $("#email_contacto_cotizacion").focus();
        return false;
        }

      if (!ValidarEmail(email_contacto_cotizacion)) {
          email_contacto_cotizacion=null;
        $("#ErrorMensaje-email_contacto_cotizacion").text('Debe Ingresar un Dirección de Email Válido');
        $("#ErrorMensaje-email_contacto_cotizacion").show();
        $("#email_contacto_cotizacion").focus();
        return false;
        }

        var direccion_cotizacion = $("#direccion_cotizacion").val().trim();

      if( direccion_cotizacion == null || direccion_cotizacion.length == 0  ) {
        direccion_cotizacion = null;
        $("#ErrorMensaje-direccion_cotizacion").text('La Dirección de Contacto No puede ser Vacío.');
        $("#ErrorMensaje-direccion_cotizacion").show();
        $("#direccion_cotizacion").focus();
        return false;
        } 


        var chk = $('#chk_adjuntar_archivo').is(":checked"); 
        
        if (chk) { 

          var archivo = $('#archivo_adjunto').val();

          if (archivo.length > 0 ) {

            $('#chk_adjuntar').val(1);            

          } else{

            $('#chk_adjuntar').val(0);
            $('#ErrorMensaje-archivo_adjunto').text('Debe Seleccionar Un Archivo a Cargar');
            $('#ErrorMensaje-archivo_adjunto').show();

            return false;

          };

        } else { $('#chk_adjuntar').val(0); };

        //return false;
        

      $("#gifloading").show();

  });

$('#direccion_cotizacion').on("keypress",function (){
    $("#ErrorMensaje-direccion_cotizacion").hide();
  })

$('#email_contacto_cotizacion').on("keypress",function (){
    $("#ErrorMensaje-email_contacto_cotizacion").hide();
  })

$('#celular_contacto_cotizacion').on("keypress",function (){
    $("#ErrorMensaje-celular_contacto_cotizacion").hide();
  })

$('#nombre_contacto_cotizacion').on("keypress",function (){
    $("#ErrorMensaje-nombre_contacto_cotizacion").hide();
  })

$('#apellido_contacto_cotizacion').on("keypress",function (){
    $("#ErrorMensaje-apellido_contacto_cotizacion").hide();
  })

  $('#titulo_cotizacion').on("keypress",function (){
    $("#ErrorMensaje-titulo_cotizacion").hide();
  })

  $('#descripcion_cotizacion').on("keypress",function (){
    $("#ErrorMensaje-descripcion_cotizacion").hide();
  })



    $('#descripcion_comentario').on("keypress",function (){
        $("#ErrorMensaje-descripcion_comentario").hide();
      });

    $('#nombre_contacto_cotizacion').on("keypress",function (){
        $("#ErrorMensaje-nombre_contacto_cotizacion").hide();
      });

    $('select[name=contacto_id_departamento]').change(function(){

      $('#contacto_id_provincia option').remove();
      GetDataProvincia($('select[name=contacto_id_departamento]').val());

      event.preventDefault();
    
    });

    $('select[name=contacto_id_provincia]').change(function(){

      $('#contacto_id_distrito option').remove();
      GetDataDistrito($('select[name=contacto_id_provincia]').val());
      event.preventDefault();
    
    });

});
function getData(page){
        $.ajax(
        {
            url: '?page=' + page,
            type: "get",
            datatype: "html",
            // beforeSend: function()
            // {
            //     you can show your loader 
            // }
        })
        .done(function(data)
        {
            //console.log(data);
            
            $("#lista-cotizaciones").empty().html(data);

            $(".btnVerComentario").bind("click",function(evt) {
      //alert('hizo clic');

              if ($("#comentarios-"+$(this).data('codigo-cotizacion')).is(":visible")) 
                {
                     $("#comentarios-"+$(this).data('codigo-cotizacion')).hide();
                } 
                else
                  {
                    $(".comentarios-users-"+$(this).data('codigo-cotizacion')).empty();
                    postDataComentarios($(this).data('codigo-cotizacion'));      
                  };
              
              //comentarios-$(this).data('codigo-cotizacion')
              //$("#comentarios-" + $(this).data('codigo-cotizacion')).show();
              //evt.preventDefault();
            });

            $(".btnAgregarComentario").on("click", function(evt) {
              $('#TituloCotizacion').text($(this).data('titulo-cotizacion'));
              $('#cotizaciones_id').text($(this).data('codigo-cotizacion'));
              //$("#cotizaciones_id").attr("value",$(this).data('codigo-cotizacion'));
            });

            //location.hash = page;
        })
        .fail(function(jqXHR, ajaxOptions, thrownError)
        {
              alert('No response from server');
        });
}

function postDataComentarios(codigo)
{

    jQuery.ajax({
      url: '../cotizacion/ListarComentarios/' + codigo,
      type:'POST',
      data: {id: codigo},
      success: function(respuesta){
          var cadena = "";
          var row="";

           $.each(respuesta, function(index, value) {
                 // row =  cadena ;
                 cadena=row;
                 row = "<div class='row'><div class='col-xs-12'><div class='media'><div class='media-left'><span class='text-center'><i class='fa fa-user-circle-o fa-3x' style='color: #ec971f;' aria-hidden='true'></i></span></div><div class='media-body'><p class='media-heading comentario-usuarios-row'><small class='color-azul'>" + respuesta[index].usuario  + " / " + respuesta[index].email + " / " + respuesta[index].celular + "</small></p><p class='media-heading  comentario-usuarios-row'><small>" + respuesta[index].fecha_registro + " / " + respuesta[index].costo  + " / " + respuesta[index].fecha_vigencia_maxima + "</small></p><p class='media-heading descripcion-comentario'><i class='fa fa-quote-left' aria-hidden='true'></i>&nbsp;<small>" + respuesta[index].descripcion_comentario+"&nbsp;<i class='fa fa-quote-right' aria-hidden='true'></i></small></p><div class='row'></div><div class='row'></div></div></div>";
                    
                   row = cadena + row;
           });

           if (row != "") 
           {
              $(".comentarios-users-"+ codigo).append(row);
              $("#comentarios-"+ codigo).show();
           } 

          
      }
    })
    .fail(function()
        {
              alert('No response from server');
        });




}

function GetDataProvincia(codigo)
{

jQuery.ajax({
  url: '../cotizacion/ListarProvincias/' + codigo,
  type: 'POST',
  data: {id: codigo},
  success: function(respuesta){

          var lista = [].slice.call(respuesta);
           $.each(respuesta, function(index, value) {

              $('#contacto_id_provincia').append($('<option>', { 
                                    value:lista[index].id,
                                    text : lista[index].cNomZona
                }));
                   
           });

     $('#contacto_id_distrito option').remove();

    GetDataDistrito($('select[name=contacto_id_provincia]').val());      

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
  url: '../cotizacion/ListarDistritos/' + codigo,
  type: 'POST',
  data: {id: codigo},
  success: function(respuesta){

          var lista = [].slice.call(respuesta);
           $.each(respuesta, function(index, value) {

              $('#contacto_id_distrito').append($('<option>', { 
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



