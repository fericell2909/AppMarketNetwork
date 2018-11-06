@extends('app')

@section('javascript')
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBC-ueG56d4pm8xrNLlPssupxlCCuwWIOo&libraries=adsense&language=es"></script>
@endsection

@section('content-proveedores')

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <h1 class="titulo-cuenta-usuario text-center"><i class="fa fa-user-secret" aria-hidden="true"></i>&nbsp; Cuenta de Proveedores <i class="fa fa-user-secret" aria-hidden="true"></i></h1>
            <ul class="list-group">
                <li class="list-group-item active text-center"><i class="fa fa-address-book-o" aria-hidden="true"></i>&nbsp; Datos Personales</li>
                <li class="list-group-item">
                    <div class="row">                        
                            <p class="cuenta-usuario-row">
                                <label class="lbl-cuenta-usuario  lbl-cuenta-usuario-concepto">Usuario     :</label>
                                <label class="lbl-cuenta-usuario lbl-cuenta-usuario-descripcion">{{Auth::user()->email}}</label>
                            </p>
                            <p class="cuenta-usuario-row">
                                <label class="lbl-cuenta-usuario  lbl-cuenta-usuario-concepto">Contraseña :</label>
                                <label class="lbl-cuenta-usuario lbl-cuenta-usuario-descripcion">***********</label>
                            </p>
                            <p class="cuenta-usuario-row">
                                <label class="lbl-cuenta-usuario  lbl-cuenta-usuario-concepto">Ruc o Dni:</label>
                                <label class="lbl-cuenta-usuario lbl-cuenta-usuario-descripcion">{{Auth::user()->prov_ruc}}</label>
                            </p>
                            <p class="cuenta-usuario-row">
                                <label class="lbl-cuenta-usuario  lbl-cuenta-usuario-concepto">Razon Social :</label>
                                <label class="lbl-cuenta-usuario lbl-cuenta-usuario-descripcion">{{Auth::user()->prov_razon_social}}</label>
                            </p>
                             <p class="cuenta-usuario-row">
                                <label class="lbl-cuenta-usuario  lbl-cuenta-usuario-concepto">Direccion :</label>
                                <label class="lbl-cuenta-usuario lbl-cuenta-usuario-descripcion">{{Auth::user()->prov_direccion}}</label>
                            </p>
                            <p class="cuenta-usuario-row">
                                <label class="lbl-cuenta-usuario  lbl-cuenta-usuario-concepto">Telefono :</label>
                                <label class="lbl-cuenta-usuario lbl-cuenta-usuario-descripcion">{{Auth::user()->prov_telefono}}</label>
                            </p>
                            <p class="cuenta-usuario-row">
                                <label class="lbl-cuenta-usuario  lbl-cuenta-usuario-concepto">Celular :</label>
                                <label class="lbl-cuenta-usuario lbl-cuenta-usuario-descripcion">{{Auth::user()->prov_celular}}</label>
                            </p>
                            <p class="cuenta-usuario-row">
                                <label class="lbl-cuenta-usuario  lbl-cuenta-usuario-concepto">Descripcion :</label>
                                <label class="lbl-cuenta-usuario lbl-cuenta-usuario-descripcion">{{Auth::user()->prov_descripcion}}</label>
                            </p>
                            <p class="cuenta-usuario-row">
                                <label class="lbl-cuenta-usuario  lbl-cuenta-usuario-concepto">Pagina Web :</label>
                                <label class="lbl-cuenta-usuario lbl-cuenta-usuario-descripcion">{{Auth::user()->prov_pagina_web}}</label>
                            </p>

                            

                            <p class="cuenta-usuario-row" style="display:none;">
                                <label class="lbl-cuenta-usuario  lbl-cuenta-usuario-concepto">Direccion :</label>
                                <label class="lbl-cuenta-usuario lbl-cuenta-usuario-descripcion">{{Auth::user()->direccion}}</label>
                            </p>
                            <p class="cuenta-usuario-row" style="display:none;">
                                <label class="lbl-cuenta-usuario  lbl-cuenta-usuario-concepto">Dni :</label>
                                <label class="lbl-cuenta-usuario lbl-cuenta-usuario-descripcion">{{Auth::user()->dni}}</label>
                            </p>
                            
                                <p class="cuenta-usuario-row color-azul">
                                    <b>Lugar donde se realizarán los servicios</b>
                                </p>
                                <p class="cuenta-usuario-row">
                                <label class="lbl-cuenta-usuario  lbl-cuenta-usuario-concepto">Departamento :</label>
                                        <?php foreach ($departamentos as $departamento): ?>
                                          <label data-codigo-departamento = "{{ $departamento->id }}" class="lbl-cuenta-usuario lbl-cuenta-usuario-descripcion">{{ $departamento->nombre_departamento }}</label>  
                                      <?php endforeach;?> 
                            </p> 
                            <p class="cuenta-usuario-row">
                                <label class="lbl-cuenta-usuario  lbl-cuenta-usuario-concepto">Distrito :</label>

                                <?php foreach ($distritos as $distrito): ?>
                                          <label data-codigo-distrito = "{{ $distrito->id }}" class="lbl-cuenta-usuario lbl-cuenta-usuario-descripcion">{{ $distrito->nombre_distrito }}</label>  
                                      <?php endforeach;?> 
                            </p>
                            <p class="cuenta-usuario-row">
                                <label class="lbl-cuenta-usuario  lbl-cuenta-usuario-concepto color-azul">Servicios que brinda :</label>
                                    <ul>
                                        @foreach ($servicios as $servicio)  
                                                  <li style ="list-style-type:square;">
                                                      {{ $servicio->nombre_servicio }}
                                                  </li>
                                        @endforeach
                                    </ul>

                            </p>
                            <p class="cuenta-usuario-row">
                                <label class="lbl-cuenta-usuario  lbl-cuenta-usuario-concepto color-azul">Ubicacion de Negocio :</label>
                            </p>    
                             <p class="cuenta-usuario-row">
                                <label  class="lbl-cuenta-usuario  lbl-cuenta-usuario-concepto">Latitud</label>
                                <label id="latitud" class="lbl-cuenta-usuario lbl-cuenta-usuario-descripcion">{{Auth::user()->latitud}}</label>
                            </p>
                            <p class="cuenta-usuario-row">
                                <label class="lbl-cuenta-usuario  lbl-cuenta-usuario-concepto">Longitud</label>
                                <label  id = "longitud"class="lbl-cuenta-usuario lbl-cuenta-usuario-descripcion">{{Auth::user()->longitud}}</label>
                            </p>

                            <div class="row">  
                                <div class="col-xs-12">
                                    <center><div id='map_canvas' style="background:#f7f7f7;"></div></center>
                                </div>
                            </div> 
                            <br>
                            <br>
                            {{-- <ul>
                            @if(Auth::user()->prov_servicios_id == 12)
                                @foreach ($servicios as $servicio)
                                    <li>{{ $servicio->nombre_servicio }}</li>

                                @endforeach
                            @endif
                            </ul> --}}

                                                      
                            <p class="cuenta-usuario-row">
                                <button data-toggle="modal" data-target="#ModalEditar"  type="button" class="btn btn-principal btn-cuenta-editar pull-left"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp; Editar Proveedor</button>
                                <button data-toggle="modal" data-target="#ModalPassWord" type="button" class="btn btn-principal btn-cambiar-contraseña pull-left"><i class="fa fa-lock" aria-hidden="true"></i>&nbsp; Cambiar Contraseña</button>
                            </p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
 
<div class="modal fade" id="ModalEditar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="myModalLabel">Editar Cuenta de Proveedor</h4>
      </div>
      <div class="modal-body">
      	 {!! Form::open(['route' => 'usuarios/cuenta/editar', 'class' => 'form','id' => 'EditarCuentaProveedorForm']) !!}

        <div class="row">
            <div style="box-sizing:border-box;" class="col-xs-12">
                <div class="form-group">
                    <label class="control-label" for="personDetailsModalEmail">
                        <span>Correo Electrónico:</span>
                    </label>
                    <div id="personDetailsModalEmail">{{Auth::user()->email}}</div>
                </div>
            </div>
        </div>
        <div class="row" style="display:none;">
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label undefined required">
                        <span class="input-label-text" >Nombre:</span>
                    </label>
                    <input type="text" name="Nombres" maxlength="100" class="form-control letras"  id="EditarNombreUsuario"
                    	value="{{Auth::user()->Nombres}}">
                    <span  id ="ErrorMensaje-EditarNombreUsuario" class="help-block"></span>
                </div>
            </div>

            <div class="col-sm-6 col-xs-12" style="display:none;">
                <div class="form-group">
                    <label class="control-label undefined required">
                        <span class="input-label-text">Apellidos:</span>
                    </label>
                    <input type="text" name="Apellidos" maxlength="100" class="form-control letras" id="EditarApellidosUsuario" value="{{Auth::user()->Apellidos}}">
                    <span  id ="ErrorMensaje-EditarApellidosUsuario" class="help-block"></span>
                </div>
            </div>
        </div>
        <div class="row"  style="display:none;">
            <div style="box-sizing:border-box;" class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label" for="CelularCuentaUsuario">
                        <span>Celular</span>
                    </label>
                    <input type="text" name="celular" maxlength="9" id="CelularCuentaUsuario" class="form-control" value="{{Auth::user()->celular}}">
                    <span  id ="ErrorMensaje-editarCelularCuentaUsuario" class="help-block"></span>
                </div>
            </div>
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label undefined required">
                        <span class="input-label-text">Dni:</span>
                    </label>
                    <input type="text" name="dni" maxlength="8" class="form-control" id="EditarDniUsuario" value="{{Auth::user()->dni}}">
                    <span  id ="ErrorMensaje-EditarDniUsuario" class="help-block"></span>
                </div>
            </div>
        </div>
        <div class="row"  style="display:none;">
            <div style="box-sizing:border-box;" class="col-xs-12">
                <div class="form-group">
                    <label class="control-label undefined required">
                        <span class="input-label-text">Dirección:</span>
                    </label>
                    <input type="text" name="direccion" class="form-control" id="EditarDireccionUsuario" value="{{Auth::user()->direccion}}">
                    <span  id ="ErrorMensaje-EditarDireccionUsuario" class="help-block"></span>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label undefined required">
                        <span class="input-label-text" >Ruc:</span>
                    </label>
                    <input type="text" name="prov_ruc" maxlength="100" class="form-control"  id="Editarprov_ruc"
                        value="{{Auth::user()->prov_ruc}}">
                    <span  id ="ErrorMensaje-Editarprov_ruc" class="help-block"></span>
                </div>
            </div>

            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label undefined required">
                        <span class="input-label-text">Razon Social:</span>
                    </label>
                    <input type="text" name="prov_razon_social" maxlength="100" class="form-control letras" id="Editarprov_razon_social" value="{{Auth::user()->prov_razon_social}}">
                    <span  id ="ErrorMensaje-Editarprov_razon_social" class="help-block"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <div class="form-group">
                    <label class="control-label undefined required">
                        <span class="input-label-text">Direccion:</span>
                    </label>
                    <input type="text" name="prov_direccion" maxlength="100" class="form-control" id="Editarprov_direccion" value="{{Auth::user()->prov_direccion}}">
                    <span  id ="ErrorMensaje-Editarprov_direccion" class="help-block"></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label undefined required">
                        <span class="input-label-text" >Telefono:</span>
                    </label>
                    <input type="text" name="prov_telefono" maxlength="100" class="form-control"  id="Editarprov_telefono"
                        value="{{Auth::user()->prov_telefono}}">
                    <span  id ="ErrorMensaje-Editarprov_telefono" class="help-block"></span>
                </div>
            </div>

            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label undefined required">
                        <span class="input-label-text">Celular:</span>
                    </label>
                    <input type="text" name="prov_celular" maxlength="100" class="form-control" id="Editarprov_celular" value="{{Auth::user()->prov_celular}}">
                    <span  id ="ErrorMensaje-Editarprov_celular" class="help-block"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <div class="form-group">
                    <label class="control-label undefined required">
                        <span class="input-label-text">Descripcion:</span>
                    </label>
                    <textarea name="prov_descripcion" id="prov_descripcion" class="form-control" rows="10" required="required">{{Auth::user()->prov_descripcion}}</textarea>
                    <span  id ="ErrorMensaje-Editarprov_descripcion" class="help-block"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <div class="form-group">
                    <label class="control-label undefined required">
                        <span class="input-label-text">Pagina Web:</span>
                    </label>
                    <input type="text" name="prov_pagina_web" maxlength="100" class="form-control" id="Editarprov_pagina_web" value="{{Auth::user()->prov_pagina_web}}">
                    <span  id ="ErrorMensaje-Editarprov_pagina_web" class="help-block"></span>
                </div>
            </div>
        </div>
        
        <div class="row">
        <p class="cuenta-usuario-row color-azul">
            <b>Lugar donde se realizarán los servicios</b>
            
        </p>
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label undefined required">
                        <span class="input-label-text">Departamento:</span>
                    </label>
                    <select class="form-control text-center" id="editardepartamento" name="editardepartamento">
                                	       		 
                                             @foreach ($departamentos_editar as $departamento_editar)

                                                <option value="{{$departamento_editar->id}}"
                                                        @<?php if (Auth::user()->departamento_id == $departamento_editar->id): ?>
                                                                selected
                                                        <?php else: ?>
                                                                class=""           
                                                        <?php endif ?>
                                                        > {{$departamento_editar->nombre_departamento }}</option>

                                             @endforeach
                                			

                    </select>
                    <span  id ="ErrorMensaje-editardepartamento" class="help-block"></span>
                </div>
            </div>
            <input type="text" style="display:none;" id="prov_distrito_id" value="{{Auth::user()->distrito_id}}" name ="editardepartamento_prov_distrito" >
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label undefined required">
                        <span class="input-label-text">Distrito:</span>
                    </label>
                    <select class="form-control text-center" id="editardistrito" name="editardistrito">
                    </select>
                    <span  id ="ErrorMensaje-editardistrito" class="help-block"></span>
                </div>
            </div>
        </div>
        <p class="cuenta-usuario-row color-azul">
            <b>Servicios que brinda</b>
             <button type="button" class="btn btn-success" style="margin-bottom:5px;" id="btnAgregarMasServicioEditar">Agregar</button>
        </p>
        <select id="prov_servicios_id" style="display:none;">
            @foreach($lista_servicios as $lista_servicio)
                <option value="{{$lista_servicio->id}}">{{$lista_servicio->nombre_servicio}}</option>
            @endforeach
        </select>
        <div class="row" id="ServicioConcatenar">
            @foreach($servicios as $servicio)
                <div class="col-sm-6"> 
                    <div class="row">
                        <div class="col-xs-8">
                            <select name="prov_servicios_id[]" class="form-control clsservicio" readonly>
                                <option value="{{$servicio->id}}">{{$servicio->nombre_servicio}}</option>
                            </select>
                        </div>
                        <div class="col-xs-4">
                            <button type='button' class='btn btn-danger btnEliminarServicioEditar'>Eliminar</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Salir</button>
        <input value="Editar" type="submit" href="" id="btnEditarProveedor" class="btnEditarProveedor btn btn-principal btn-cunta-editar-modal pull-right"></input>
        
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>

<div class="modal fade" id="ModalPassWord" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="myModalLabel">Cambiar Contraseña</h4>
      </div>
      <div class="modal-body details-modal_body">
    {!! Form::open(['route' => 'usuarios/cuenta/reset', 'class' => 'form','id' => 'CambiarPassForm']) !!}

        <div class="row">
            <div class="col-xs-12">
                <div class="form-group">
                    <label class="control-label undefined required">
                        <span class="input-label-text">Contraseña:</span>
                    </label>
                    <input type="password" name="oldPassword" class="form-control" id="oldPassword">
                    <span  id ="ErrorMensaje-oldPassword" class="help-block"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="form-group">
                    <label class="control-label undefined required">
                        <span class="input-label-text">Nueva Contraseña:</span>
                    </label>
                     <input type="password" name="newPassword" class="form-control" id="newPassword">
                    <span  id ="ErrorMensaje-newPassword" class="help-block"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="form-group">
                    <label class="control-label undefined required">
                        <span class="input-label-text">Nueva Contraseña (Confirmar):</span>
                    </label>
                    <input type="password" id="newPasswordConfirmation" name="newPasswordConfirmation" class="form-control">
                    <span  id ="ErrorMensaje-newPasswordConfirmation" class="help-block"></span>
                    <span  id ="ErrorMensaje-ComparacionPassword" class="help-block"></span>
                </div>
            </div>
        </div>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Salir</button>
        <input type="submit" value="Cambiar" id="btnCambiarClave" class="btnCambiarClave btn btn-principal btn-cambiar-contraseña pull-right"></button>
      </div>
       {!! Form::close() !!}
    </div>
  </div>
</div>
@endsection

@section('scripts')

<script>

$(document).ready(function()
{
    initialize();

$(document).on('click', '.btnEliminarServicioEditar',function(event)
    {
        var parent = $(this).parents().get(2);
        var servicios =  document.querySelectorAll(".clsservicio");
        servicios = [].slice.call(servicios);

        if (servicios.length > 1)
            {
                $(parent).remove();
            }
     });

 $(document).on('click', '#btnAgregarMasServicioEditar',function(event)
    {
        //alert('Hizo CLick shi shi shi shi shi shi');

        var options = document.querySelectorAll("#prov_servicios_id option");

        options = [].slice.call(options);

        //console.log(options);
      
        option ="";
        $.each(options, function(index, key) {
          option  = option + options[index].outerHTML;
       });

        var row="<div class = 'col-sm-6'><div class = 'row'><div class = 'col-xs-8'><select class='form-control text-center clsservicio' name='prov_servicios_id[]'>" + option + "</select></div><div class='col-xs-4'><button type='button' class='btn btn-danger btnEliminarServicioEditar'>Eliminar</button></div></div></div>";

      $("#ServicioConcatenar").append(row);


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

    //$('#latitud').val(markerLatLng.lat());
    //$('#longitud').val(markerLatLng.lng());
}
 
function initialize() {
    //alert();
    //alert();
    var myLatlng = new google.maps.LatLng($('#latitud').text(),$('#longitud').text());
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
        title:'Aqué es la ubicación de su negocio'
    });
 
    google.maps.event.addListener(marker, 'dragend', function(){ openInfoWindow(marker); });
    google.maps.event.addListener(marker, 'click', function(){ openInfoWindow(marker); });

}


});

</script>
@endsection
