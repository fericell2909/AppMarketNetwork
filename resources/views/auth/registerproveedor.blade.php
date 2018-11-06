@extends('app')
@section('css')
<style>

footer{
  display: none;
}


</style>
@endsection


@section('javascript')
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBC-ueG56d4pm8xrNLlPssupxlCCuwWIOo&libraries=adsense&language=es"></script>
@endsection
@section('content')

<div class="container">
<div class="row">

  <div class="col-xs-12 col-sm-10 col-sm-offset-1 formulario-registro">
        <h3 class="text-center titulo-auth color-azul"><strong><i class="fa fa-pencil-square" aria-hidden="true"></i>&nbsp; Registro de Proveedores&nbsp;<i class="fa fa-pencil-square" aria-hidden="true"></i></strong></h3>  
        {{-- <div class="formulario-contenedor"> --}}
          {!! Form::open(['route' => 'auth/register', 'class' => 'form','method' => 'POST','id'=> 'RegistroForm','class' =>'']) !!}
                                    <div class="form-group">
                                        <input type="text" class="form-control" style="display:none;" id="NombreUsuario" name="Nombres"  required placeholder="Nombres" maxlength="100">
                                        <span  id ="ErrorMensaje-NombreUsuario" class="help-block"></span>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" style="display:none;" id="direccion" name="direccion"  required placeholder="direccion" maxlength="100">
                                        <span  id ="ErrorMensaje-NombreUsuario" class="help-block"></span>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" style="display:none;" id="ApellidosUsuario" name="Apellidos"  required placeholder="Apellidos"  maxlength="100">
                                        <span  id ="ErrorMensaje-ApellidosUsuario" class="help-block"></span>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="celularregistro"  style="display:none;" name="celular"  required placeholder="Celular" maxlength="9">
                                        <span  id ="ErrorMensaje-celularregistro" class="help-block"></span>
                                    </div>
                                    <div class="form-group" style="display:none;">
                                        <input type="text" class="form-control" id="users_tipos_id" name="users_tipos_id" value="2">
                                        <span  id ="ErrorMensaje-users_tipos_id" class="help-block"></span>
                                    </div>
                                    <div class="form-group" style="display:none;">
                                        <input type="text" class="form-control" id="planes_id" name="planes_id" value="2">
                                        <span  id ="ErrorMensaje-planes_id" class="help-block"></span>
                                    </div>
                                     <div class="form-group" style="display:none;">
                                        <input type="text" class="form-control" id="dni" name="dni" value="">
                                        <span  id ="ErrorMensaje-planes_id" class="help-block"></span>
                                    </div>
                                    <div class="form-group" style="display:none;">
                                          <div class="row">
                                            <div class="col-xs-2">
                                              <a  data-toggle="modal" data-target="#myModal"class="btn btn-principal">Planes</a>
                                            </div>
                                          <div class="col-xs-10">
                                            <input type="text" id="descripcion_plan_id"   value="" readonly class="form-control">
                                            <input type="text" id="planes_id" name="planes_id" style="display:none;"  value="2" readonly class="form-control">
                                          </div>

                                          </div>
                                           
                                         <span  id ="ErrorMensaje-celularregistro" class="help-block"></span>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                          <label class="color-azul">Correo Eletrónico:</label>
                                          <input type="email" class="form-control" id="usernameregistro" name="email" placeholder="example@gmail.com">
                                          <span  id ="ErrorMensaje-usernameregistro" class="help-block"></span>
                                        </div>
                                        <div class="col-sm-6">
                                          <label class="color-azul">Contraseña:</label>
                                          <input type="password" class="form-control" id="passwordregistro" name="password"  required placeholder="Contraseña">
                                          <span  id ="ErrorMensaje-passwordregistro" class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                          <label class="color-azul">RUC o DNI</label>
                                          <input type="text" class="form-control"  id="prov_ruc" name="prov_ruc"  required placeholder="RUC o DNI" maxlength="11">
                                          <span  id ="ErrorMensaje-prov_ruc" class="help-block"></span>
                                        </div>
                                        <div class="col-sm-6">
                                          <label class="color-azul">Razon Social o Apellidos y Nombres</label>
                                          <input type="text" class="form-control"  id="prov_razon_social" name="prov_razon_social"  required placeholder="Razon Social o Apellidos y Nombres">
                                          <span  id ="ErrorMensaje-prov_razon_social" class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                      <div class="col-sm-12">
                                        <label class="color-azul">Dirección:</label>
                                        <input type="text" class="form-control"  id="prov_direccion" name="prov_direccion"  required placeholder="Direccion">
                                        <span  id ="ErrorMensaje-prov_direccion" class="help-block"></span>
                                      </div>  
                                    </div>
                                    <div class="form-group row">
                                      <div class="col-sm-4">
                                        <label class="color-azul">Telefono:</label>
                                        <input type="text" class="form-control"  id="prov_telefono" name="prov_telefono"  required placeholder="Telefono">
                                        <span  id ="ErrorMensaje-prov_telefono" class="help-block"></span>
                                      </div>
                                      <div class="col-sm-4">
                                        <label class="color-azul">Celular:</label>
                                        <input type="text" class="form-control"  id="prov_celular" name="prov_celular"  required placeholder="Celular" maxlength="9">
                                        <span  id ="ErrorMensaje-prov_celular" class="help-block"></span>
                                      </div>
                                      <div class="col-sm-4">
                                        <label class="color-azul">Pagina de Contacto:</label>
                                        <input type="text" class="form-control"  id="prov_pagina_web" name="prov_pagina_web"  placeholder="www.ejemplo.com">
                                          <span  id ="ErrorMensaje-prov_pagina_web" class="help-block"></span>
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <div class="col-sm-12">
                                        <label class="color-azul">Acerca de:</label>
                                        <textarea class="color-negro" name="prov_descripcion" id ="prov_descripcion" rows=10 style="width: 100%" placeholder="Breve Descripción de la Empresa o Breve Descripción de su persona"></textarea>
                                        <span  id ="ErrorMensaje-prov_descripcion" class="help-block"></span>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                        
                                    </div>
                                    <fieldset>
                                      <legend class="color-azul">Lugar donde se realizarán los servicios</legend>
                                      <div class="form-group">

                                          <div class="col-sm-6">
                                            <label class="color-azul">Departamento:</label>
                                            <select class="form-control text-center" name="departamento_id" id="registrodepartamento">

                                            <?php foreach ($departamentos as $departamento): ?>
                                                <option value="{{ $departamento->id }}">{{ $departamento->nombre_departamento }}</option>  
                                            <?php endforeach;?> 
                                              <span  id ="ErrorMensaje-registrodepartamento" class="help-block"></span>
                                            </select>
                                          </div>
                                          <div class="col-sm-6">
                                            <label class="color-azul">Distrito</label>
                                            <select class="form-control text-center" name="distrito_id" id="registrodistrito" style="display:none;">
                                            </select>
                                            <span  id ="ErrorMensaje-registrodistrito" class="help-block"></span>
                                          </div>
                                      </div>
                                    </fieldset>
                                    <div class="form-group">
                                        
                                    </div>

                                     <fieldset>
                                      <legend class="color-azul">Servicios que brinda : <button type="button" class="btn btn-success" style="margin-bottom:5px;" id="btnAgregarMasServicio">Agregar</button>
                                      <small ><a href="{{route('Oficios/Contactanos')}}" class="color-verde">No Encuentras Tu Oficio. Contáctanos</a></small>
                                      </legend>
                                      <div class="form-group">
                                          <div class="row" id="ServicioConcatenar">
                                            <div class="col-sm-6" >
                                              <div class="row">
                                                <div class="col-xs-12" >                                          
                                                <select class="form-control text-center clsservicio" name="prov_servicios_id[]" id="prov_servicios_id" >

                                                            @foreach($servicios as $servicio)
                                                              <option value="{{ $servicio->id }}">{{ $servicio->nombre_servicio }}</option>
                                                            @endforeach                                                      
                                                </select>
                                                </div>
                                              </div>
                                            </div>
                                          </div>

                                      </div>
                                       </fieldset>
                                    <label class="color-rojo">Ubicar su Negocio en el Mapa:</label>
                                    
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
                                        <center><div id='map_canvas' style="background:#f7f7f7;"></div></center>
                                        </div>
                                      </div>    
                                    </div>
                                    
                                   
                                    <div class="row"> 
                                      <div class="col-xs-12">
                                       {{-- <a href ="" id="btnContinuarPasoUno" class="btn btn-block pull-left btn-principal btn-continuar"><i class="fa fa-play-circle-o fa-3x" aria-hidden="true"></i><span style="font-size:40px;"> Continuar</span></a> --}}
                                       <button type="submit" id="btnRegistroProveedor" class="btn btn-block pull-left btn-principal btn-continuar"><i class="fa fa-play-circle-o fa-3x" aria-hidden="true"></i><span style="font-size:40px;">&nbsp; Registrarse</span></button>
                                       <br>
                                       <br>
                                       <br>
                                       <br>
                                       <br>
                                      </div>
                                      
                                    </div>
          {!! Form::close() !!}
        </div>


  </div>

  
  {{-- <div class="col-xs-12 col-sm-6 formulario-registro formulario-registro-publicidad">
     <h3 class="text-center titulo-auth"><strong>Asesoría</strong> 24 horas</h3>  
      <h4 class="text-center"><i class="fa fa-phone-square" aria-hidden="true"></i> Llámanos al 
        {{ Config('globales.TelefonoContacto') }}
      </h4>
      <center><img src="/images/call.jpeg" class="call-center"></center>
      <br>      
      <ul class="list-group"> 
        <li class="list-group-item "><i class="fa fa-check" aria-hidden="true"></i> Profesionales de Primera Calidad</li>
        <li class="list-group-item"><i class="fa fa-check" aria-hidden="true"></i> Boletines de Ofertas Semanales</li>
        <li class="list-group-item "><i class="fa fa-check" aria-hidden="true"></i> XYZ</li>
        <li class="list-group-item"><i class="fa fa-check" aria-hidden="true"></i> XYZ</li>
        <li class="list-group-item"><i class="fa fa-check" aria-hidden="true"></i> XYZ</li>

      </ul> 
  </div> --}}
</div>

<div id="AgregarMas">
</div>

</div> 
<br>
<br>
<br>
<br>
<br>
@endsection

@section('scripts')

<script>

$(document).ready(function()
{
   initialize();
      
    $(document).on('click', '#btnAgregarMasServicio',function(event)
    {
        //alert('Hizo CLick shi shi shi shi shi shi');

        var options = document.querySelectorAll("#prov_servicios_id option");

        options = [].slice.call(options);

        //console.log(options);
      
        option ="";
        $.each(options, function(index, key) {
          option  = option + options[index].outerHTML;
       });

        var row="<div class = 'col-sm-6'><div class = 'row'><div class = 'col-xs-8'><select class='form-control text-center clsservicio' name='prov_servicios_id[]'>" + option + "</select></div><div class='col-xs-4'><button type='button' class='btn btn-danger btnEliminarServicio'>Eliminar</button></div></div></div>";

        //console.log(row);
      $("#AgregarMas").append('<br>');
      $("#ServicioConcatenar").append(row);


    });

    $(document).on('click', '.btnEliminarServicio',function(event)
    {
      var parent = $(this).parents().get(2);
      $(parent).remove();
      $("#AgregarMas br:last").remove();
    }); 

    $("#btnRegistroProveedor").on("click", function(evt) 
    {
    

  
    

    var email = $('#usernameregistro').val().trim();

    if( email == null || email.length == 0  ) {
      email = null;
      $("#ErrorMensaje-usernameregistro").text('El email no puede ser vacio.');
        $("#ErrorMensaje-usernameregistro").show();
        $("#usernameregistro").focus();
        return false;
      }

    var email = $('#usernameregistro').val().trim();

    if( email == null || email.length == 0  ) {
      email = null;
      $("#ErrorMensaje-usernameregistro").text('El email no puede ser vacio.');
        $("#ErrorMensaje-usernameregistro").show();
        $("#usernameregistro").focus();
        return false;
      }

    var password = $('#passwordregistro').val().trim();

    if( password == null || password.length == 0  ) {
      password = null;
      $("#ErrorMensaje-passwordregistro").text('La contraseña no puede ser vacio.');
        $("#ErrorMensaje-passwordregistro").show();
        $("#passwordregistro").focus();
        return false;
      }

    var prov_ruc = $('#prov_ruc').val().trim();

    if( prov_ruc == null || prov_ruc.length == 0  ) {
      prov_ruc = null;
      $("#ErrorMensaje-prov_ruc").text('El RUC o DNI no puede ser vacio.');
        $("#ErrorMensaje-prov_ruc").show();
        $("#prov_ruc").focus();
        return false;
      }

    var prov_razon_social = $('#prov_razon_social').val().trim();

    if( prov_razon_social == null || prov_razon_social.length == 0  ) {
      prov_razon_social = null;
      $("#ErrorMensaje-prov_razon_social").text('La Razon Social o Apellidos y Nombres no puede ser vacio no puede ser vacio.');
        $("#ErrorMensaje-prov_razon_social").show();
        $("#prov_razon_social").focus();
        return false;
      }

    var prov_direccion = $('#prov_direccion').val().trim();

    if( prov_direccion == null || prov_direccion.length == 0  ) {
      prov_direccion = null;
      $("#ErrorMensaje-prov_direccion").text('La Direccion no puede ser vacio.');
        $("#ErrorMensaje-prov_direccion").show();
        $("#prov_direccion").focus();
        return false;
      }

    var prov_telefono = $('#prov_telefono').val().trim();

    if( prov_telefono == null || prov_telefono.length == 0  ) {
      prov_telefono = null;
      $("#ErrorMensaje-prov_telefono").text('El Telefono no puede ser vacio.');
        $("#ErrorMensaje-prov_telefono").show();
        $("#prov_telefono").focus();
        }

    var prov_celular = $('#prov_celular').val().trim();

    if( prov_celular == null || prov_celular.length == 0  ) {
      prov_celular = null;
      $("#ErrorMensaje-prov_celular").text('El Celular no puede ser vacio.');
        $("#ErrorMensaje-prov_celular").show();
        $("#prov_celular").focus();
        return false;
      }

    var prov_descripcion = $('#prov_descripcion').val().trim();

    if( prov_descripcion == null || prov_descripcion.length == 0  ) {
      prov_descripcion = null;
      $("#ErrorMensaje-prov_descripcion").text('La descripcion no puede ser vacio');
        $("#ErrorMensaje-prov_descripcion").show();
        $("#prov_descripcion").focus();
        return false;
      }

     // var servicios = document.querySelectorAll(".clsservicio");
     //  servicios = [].slice.call(servicios);
     //          repetido = 0;
     //  $.each(servicios, function(index, value) {
     //    if (repetido <= 0 ) {
     //      $.each(servicios, function(index2, val) { 
     //      if (repetido <= 0 ) {
     //      if (index2 +1 <= servicios.length) {
     //        if (servicios[index].value == servicios[index2 + 1].value ) {
     //            repetido = 1;
     //            //alert('repetido');
     //        };
     //      };
     //      };


     //    });

     //    };
        


     //  });   

     //  //alert('repetidoygnjgym');
     // if (repetido == 1 ) {
     //              //console.log('Los Servicios no pueden ser repetidos.');
     //             //alert('Servicios Repetidos');
     //              return false;
     //            }

    jQuery.ajax({
          url: '../Auth/validar_email',
          type: 'POST',
          data:  $("#RegistroForm").serialize(),
          success: function(respuesta){
            //alert('Correcto');
              lista = JSON.parse(respuesta);

                if (lista.length > 0)
              {
                $('#ErrorMensaje-usernameregistro').text("El email ya se encuentra registrado.");
                $('#ErrorMensaje-usernameregistro').show();
              }
              else
              {

                   


              $('#RegistroForm').submit();
              }
          }
        });

    
              
    
    return false;
  });

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


});

</script>
@endsection



