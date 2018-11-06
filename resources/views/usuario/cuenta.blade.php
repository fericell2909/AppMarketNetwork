@extends('app')

@section('content-miembros')

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <h1 class="titulo-cuenta-usuario text-center"><i class="fa fa-user-secret" aria-hidden="true"></i>&nbsp; Cuenta de Usuario <i class="fa fa-user-secret" aria-hidden="true"></i></h1>
            <ul class="list-group">
                <li class="list-group-item active text-center"><i class="fa fa-address-book-o" aria-hidden="true"></i>&nbsp; Datos Personales</li>
                <li class="list-group-item">
                    <div class="row">                        
                            <p class="cuenta-usuario-row">
                                <label class="lbl-cuenta-usuario  lbl-cuenta-usuario-concepto">Usuario     :</label>
                                <label class="lbl-cuenta-usuario lbl-cuenta-usuario-descripcion">{{Auth::user()->email}}</label>
                            </p>
                            <p class="cuenta-usuario-row">
                                <label class="lbl-cuenta-usuario  lbl-cuenta-usuario-concepto">Nombres :</label>
                                <label class="lbl-cuenta-usuario lbl-cuenta-usuario-descripcion">{{Auth::user()->Nombres}}</label>
                            </p>
                            <p class="cuenta-usuario-row">
                                <label class="lbl-cuenta-usuario  lbl-cuenta-usuario-concepto">Apellidos :</label>
                                <label class="lbl-cuenta-usuario lbl-cuenta-usuario-descripcion">{{Auth::user()->Apellidos}}</label>
                            </p>
                             <p class="cuenta-usuario-row">
                                <label class="lbl-cuenta-usuario  lbl-cuenta-usuario-concepto">Celular :</label>
                                <label class="lbl-cuenta-usuario lbl-cuenta-usuario-descripcion">{{Auth::user()->celular}}</label>
                            </p>
                            <p class="cuenta-usuario-row">
                                <label class="lbl-cuenta-usuario  lbl-cuenta-usuario-concepto">Contraseña :</label>
                                <label class="lbl-cuenta-usuario lbl-cuenta-usuario-descripcion">***********</label>
                            </p>
                            <p class="cuenta-usuario-row">
                                <label class="lbl-cuenta-usuario  lbl-cuenta-usuario-concepto">Direccion :</label>
                                <label class="lbl-cuenta-usuario lbl-cuenta-usuario-descripcion">{{Auth::user()->direccion}}</label>
                            </p>
                            <p class="cuenta-usuario-row">
                                <label class="lbl-cuenta-usuario  lbl-cuenta-usuario-concepto">Dni :</label>
                                <label class="lbl-cuenta-usuario lbl-cuenta-usuario-descripcion">{{Auth::user()->dni}}</label>
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
                                <button data-toggle="modal" data-target="#ModalEditar"  type="button" class="btn btn-principal btn-cuenta-editar pull-left"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp; Editar</button>
                                <button data-toggle="modal" data-target="#ModalPassWord" type="button" class="btn btn-principal btn-cambiar-contraseña pull-left"><i class="fa fa-lock" aria-hidden="true"></i>&nbsp; Cambiar Contraseña</button>
                            </p>
                    </div>
                </li>
            </ul>
            <ul class="list-group">
                <li class="list-group-item active text-center"><i class="fa fa-id-card-o" aria-hidden="true"></i>&nbsp; Membresía de Cuenta</li>
                <li class="list-group-item">
                    <div class="table-responsive">              
                        <table class="table table-hover table-bordered">
                            <thead>
                              @if (Auth::user()->planes_id == 2)
                                    <tr class="titulo-green text-center">
                              @else
                                    @if (Auth::user()->planes_id == 3)
                                        <tr class="titulo-silver text-center">
                                    @else
                                        <tr class="titulo-gold text-center">
                                    @endif
                            @endif
                                    <th class="text-center thtd-centrado-vertical">Plan</th>
                                    <th class="text-center thtd-centrado-vertical">Fecha Inscripción</th>
                                    <th class="text-center thtd-centrado-vertical">Renovación</th>
                                    <th class="text-center thtd-centrado-vertical"> Moneda </th>
                                    <th class="text-center thtd-centrado-vertical"> Precio </th>
                                </tr>
                            </thead>
                            <tbody >
                                <?php foreach ($planes as $plan): ?>
                                    <tr>
                                        <td class="text-center thtd-centrado-vertical">{{$plan->descripcion_plan}}</td>
                                        <td class="text-center thtd-centrado-vertical">{{$plan->FechaInscripcion}}</td>
                                        <td class="text-center thtd-centrado-vertical">{{$plan->descripcion_debitacion}}</td>
                                        <td class="text-center thtd-centrado-vertical">{{$plan->simbolo_moneda}}</td>
                                        <td class="text-center thtd-centrado-vertical">{{$plan->costo}}</td>
                                    </tr>
                                <?php endforeach;?> 
                                
                            </tbody>
                        </table>
                    </div>
                </li>
            </ul>
            <ul class="list-group">
                <li class="list-group-item active text-center"><i class="fa fa-envelope" aria-hidden="true"></i>&nbsp; Notificaciones&nbsp; <i class="fa fa-mobile" aria-hidden="true"></i>&nbsp; <i class="fa fa-phone" aria-hidden="true"></i></li>
                <li class="list-group-item">
                        <div class="alert alert-success">
                            <p>Actualmente está suscrito a recibir las notificacion de Correo Electrónico en la dirección de correo electrónico <strong>{{Auth::user()->email}}</strong> y está dispuesto a aceptar las llamadas telefónicas de nuestro call center.</p>
                        </div>
                        <div class="row uenta-usuario-row">
                            <button data-toggle="modal" data-target="#ModalNotificacion"  type="button" class="btn btn-principal btn-cuenta-notificacion pull-left"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp; Cambiar Preferencias</button>
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
        <h4 class="modal-title text-center" id="myModalLabel">Editar Cuenta de Usuario</h4>
      </div>
      <div class="modal-body">
      	 {!! Form::open(['route' => 'usuarios/cuenta/editar', 'class' => 'form','id' => 'EditarCuentaForm']) !!}

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
        <div class="row">
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
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label undefined required">
                        <span class="input-label-text">Apellidos:</span>
                    </label>
                    <input type="text" name="Apellidos" maxlength="100" class="form-control letras" id="EditarApellidosUsuario" value="{{Auth::user()->Apellidos}}">
                    <span  id ="ErrorMensaje-EditarApellidosUsuario" class="help-block"></span>
                </div>
            </div>
        </div>
        <div class="row">
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
        <div class="row">
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
                        <span class="input-label-text">Departamento:</span>
                    </label>
                    <select class="form-control text-center" id="editardepartamento" name="editardepartamento">

                                	<?php foreach ($departamentos_editar as $departamento_editar) { ?>
                                	       		 
                                				<option value="{{$departamento_editar->id}}" 
                                					<?php 
                                						foreach ($departamentos as $departamento) {
                                							if ($departamento->id == $departamento_editar->id) { ?>
                                								selected <?php
                                							}
														 }?> 
                                				>{{ $departamento_editar->nombre_departamento }}</option>

                                			 <?php } ;?> 
                                			

                    </select>
                    <span  id ="ErrorMensaje-editardepartamento" class="help-block"></span>
                </div>
            </div>
            <input type="text" style="display:none;" id="prov_distrito_id" value="{{Auth::user()->distrito_id}}" name ="editardepartamento_prov_distrito">
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



            <div class="row" style="display:none;">
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label undefined">
                        <span class="input-label-text" >Ruc:</span>
                    </label>
                    <input type="text" name="prov_ruc" maxlength="100" class="form-control"  id="Editarprov_ruc"
                        value="{{Auth::user()->prov_ruc}}">
                    <span  id ="ErrorMensaje-Editarprov_ruc" class="help-block"></span>
                </div>
            </div>

            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label undefined">
                        <span class="input-label-text">Razon Social:</span>
                    </label>
                    <input type="text" name="prov_razon_social" maxlength="100" class="form-control letras" id="Editarprov_razon_social" value="{{Auth::user()->prov_razon_social}}">
                    <span  id ="ErrorMensaje-Editarprov_razon_social" class="help-block"></span>
                </div>
            </div>
        </div>
        <div class="row" style="display:none;">
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

        <div class="row" style="display:none;">
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
        <div class="row" style="display:none;">
            <div class="col-sm-12 col-xs-12">
                <div class="form-group">
                    <label class="control-label undefined required">
                        <span class="input-label-text">Descripcion:</span>
                    </label>
                    <textarea name="prov_descripcion" id="prov_descripcion" class="form-control" rows="10">{{Auth::user()->prov_descripcion}}</textarea>
                    <span  id ="ErrorMensaje-Editarprov_descripcion" class="help-block"></span>
                </div>
            </div>
        </div>
        <div class="row" style="display:none;">
            <div class="col-sm-12 col-xs-12">
                <div class="form-group">
                    <label class="control-label undefined required">
                        <span class="input-label-text">Descripcion:</span>
                    </label>
                    <select name="prov_servicios_id[]" class="form-control" >{{Auth::user()->prov_descripcion}}
                        <option value="1">Plomeros</option>
                    option
                    </select>
                    <span  id ="ErrorMensaje-Editarprov_descripcion" class="help-block"></span>
                </div>
            </div>
        </div>
        <div class="row" style="display:none;">
            <div class="col-sm-12 col-xs-12">
                <div class="form-group">
                    <label class="control-label undefined">
                        <span class="input-label-text">Pagina Web:</span>
                    </label>
                    <input type="text" name="prov_pagina_web" maxlength="100" class="form-control" id="Editarprov_pagina_web" value="{{Auth::user()->prov_pagina_web}}">
                    <span  id ="ErrorMensaje-Editarprov_pagina_web" class="help-block"></span>
                </div>
            </div>
        </div>






        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
        <input value="Editar" type="submit" href="" id="btnEditarUsuario" class="btnEditarUsuario btn btn-principal btn-cunta-editar-modal pull-right"></input>
        
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


<div class="modal fade" id="ModalNotificacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="myModalLabel">Cambiar Notificaciones</h4>
      </div>
      <div class="modal-body details-modal_body">
      {!! Form::open(['route' => 'usuarios/cuenta/notificar', 'class' => 'form','id' => 'NotificarCuentaForm']) !!}
        <div class="row">
            <div class="col-xs-12">
                <p>
                    <span>Actualmente está programado para recibir la siguiente correspondencia "marcada". Para cambiar sus preferencias, simplemente "marque" o "desmarque" el cuadro relacionado. Haga clic en "Guardar" para guardar los cambios..&nbsp;&nbsp;</span>
                    <em>Si bien los cambios suelen ser inmediatos, por favor deje cinco (5) días hábiles para asegurarse de que han entrado en vigor.
                    </em>
                </p>
                <p>
                    <span>Por cierto, los correos electrónicos están siendo enviados a &nbsp;</span>
                    <strong>{{Auth::user()->email}}</strong>
                    <span>.</span>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">

                
                <ul class="list-group">

                        <?php foreach ($promociones as $promocion): ?>
                                <li class="list-group-item">
                                    <div class="form-group">
                                        <div class="checkbox">
                                            <label class="">
                                                <input type="checkbox" name="{{$promocion->Titulo}}" 
                                                <?php if ($promocion->bMembresia == 1): ?>
                                                    checked 
                                                <?php endif ?> class="checkbox">
                                                <strong class="text-success">{{$promocion->Titulo}}</Strong>
                                            </label>
                                        </div>
                                    </div>
                                    <div>{{$promocion->Descripcion}}</div>
                                </li>

                        <?php endforeach;?> 
                </ul>


            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Salir</button>
            <input type="submit" value="Actualizar Notificaciones" id="btnNotificar" class="btnNotificar btn btn-principal btn-cambiar-contraseña pull-right"></input>
        </div>
       {!! Form::close() !!}
    </div>
  </div>
</div>

<script>

</script>
@endsection