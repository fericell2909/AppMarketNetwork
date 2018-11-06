@extends('app')
 
@section('content')
<div class="container">
<div class="row">
  <div class="col-xs-12 col-sm-6 formulario-registro">
      <h3 class="text-center titulo-auth"><strong>Suscripcion</strong> por Planes</h3>  
      <h4 class="text-center"><i class="fa fa-thumbs-up" aria-hidden="true"></i> Averigua los Beneficios que tenemos para ti</h4>
      <div class="formulario-contenedor">
        {{-- <form id="RegistroForm" method="GET" action=""> --}}
          {!! Form::open(['route' => 'auth/register', 'class' => 'form','method' => 'POST','id'=> 'RegistroForm']) !!}
                                  <div class="form-group">
                                      <input type="text" class="form-control" id="NombreUsuario" name="Nombres"  required placeholder="Nombres" maxlength="100">
                                      <span  id ="ErrorMensaje-NombreUsuario" class="help-block"></span>
                                  </div>
                                  <div class="form-group">
                                      <input type="text" class="form-control" id="ApellidosUsuario" name="Apellidos"  required placeholder="Apellidos"  maxlength="100">
                                      <span  id ="ErrorMensaje-ApellidosUsuario" class="help-block"></span>
                                  </div>

                                  <div class="form-group">
                                      <input type="email" class="form-control" id="usernameregistro" name="email" placeholder="example@gmail.com" required>
                                      <span  id ="ErrorMensaje-usernameregistro" class="help-block"></span>
                                  </div>
                                  <div class="form-group">
                                      <input type="password" class="form-control" id="passwordregistro" name="password"  required placeholder="Contraseña">
                                      <span  id ="ErrorMensaje-passwordregistro" class="help-block"></span>
                                  </div>
                                  <div class="form-group">
                                      <input type="text" class="form-control" id="direccion" name="direccion" required placeholder="direccion">
                                      <span  id ="ErrorMensaje-direccion" class="help-block"></span>
                                  </div>
                                  <div class="form-group">
                                      <input type="text" class="form-control" id="dni" name="dni" required placeholder="dni" maxlength="8">
                                      <span  id ="ErrorMensaje-dni" class="help-block"></span>
                                  </div>
                                  <div class="form-group">
                                      <input type="text" class="form-control" id="celularregistro" name="celular"  required placeholder="Celular" maxlength="9">
                                      <span  id ="ErrorMensaje-celularregistro" class="help-block"></span>
                                  </div>
                                  
                                  <div class="form-group" style="display:none;">
                                      <input type="text" class="form-control" id="users_tipos_id" name="users_tipos_id" value="1">
                                      <span  id ="ErrorMensaje-users_tipos_id" class="help-block"></span>
                                  </div>
                                  

                                  <div class="form-group">
                                        <div class="row">
                                          <div class="col-xs-2">
                                            <a  id="btnplan-modal" data-toggle="modal" data-target="#myModal"class="btn btn-principal">Planes</a>
                                          </div>
                                        <div class="col-xs-10">
                                          <input type="text" id="descripcion_plan_id"   value="" readonly class="form-control">
                                          <input type="text" id="planes_id" name="planes_id" style="display:none;"  value="" readonly class="form-control">
                                           <span  id ="ErrorMensaje-descripcion_plan_id" class="help-block"></span>
                                        </div>

                                        </div>
                                         
                                       <span  id ="ErrorMensaje-celularregistro" class="help-block"></span>
                                  </div>
                                  <div class="form-group">
                                      <select class="form-control text-center" name="departamento_id" id="registrodepartamento" required>

                                      <?php foreach ($departamentos as $departamento): ?>
                                          <option value="{{ $departamento->id }}">{{ $departamento->nombre_departamento }}</option>  
                                      <?php endforeach;?> 
                                        <span  id ="ErrorMensaje-registrodepartamento" class="help-block"></span>
                                      </select>
                                  </div>
                                  <div class="form-group">
                                      <select class="form-control text-center" name="distrito_id" id="registrodistrito" style="display:none;" required>
                                      </select>
                                      <span  id ="ErrorMensaje-registrodistrito" class="help-block"></span>
                                  </div>

                                   <div class="form-group row" style="display:none;">
                                      <div class="col-sm-6">
                                        <label class="color-azul">RUC</label>
                                        <input type="text" class="form-control"  id="prov_ruc" name="prov_ruc"  required placeholder="RUC" maxlength="11">
                                        <span  id ="ErrorMensaje-prov_ruc" class="help-block"></span>
                                      </div>
                                      <div class="col-sm-6">
                                        <label class="color-azul">Razon Social:</label>
                                        <input type="text" class="form-control"  id="prov_razon_social" name="prov_razon_social"  required placeholder="Razon Social">
                                        <span  id ="ErrorMensaje-prov_razon_social" class="help-block"></span>
                                      </div>
                                  </div>
                                  <div class="form-group row"  style="display:none;">
                                    <div class="col-sm-12">
                                      <label class="color-azul">Dirección:</label>
                                      <input type="text" class="form-control"  id="prov_direccion" name="prov_direccion"  required placeholder="Direccion">
                                      <span  id ="ErrorMensaje-prov_direccion" class="help-block"></span>
                                    </div>  
                                  </div>
                                  <div class="form-group row"  style="display:none;">
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
                                  <div class="form-group row"  style="display:none;">
                                    <div class="col-sm-12">
                                      <label class="color-azul">Acerca de:</label>
                                      <textarea class="color-negro" name="prov_descripcion" id ="prov_descripcion" rows=10 style="width: 100%" placeholder="Breve Descripcion de la Empresa"></textarea>
                                      <span  id ="ErrorMensaje-prov_descripcion" class="help-block"></span>
                                    </div>
                                  </div>

                                  <fieldset style="display:none;">
                                    <legend class="color-azul">Servicios que brinda</legend>
                                    <div class="form-group">

                                        <div class="col-sm-6">
                                          <label class="color-azul">Servicios:</label>
                                          <select class="form-control text-center" name="prov_servicios_id" id="prov_servicios_id">

                                          <input type="text" name="prov_servicios_id" id="input" class="form-control" value="12" pattern="" title="">
                                        
                                        </div>
                                      </div>
                                     </fieldset>


                                  <div class="row"> 
                                    <div class="col-xs-12">
                                     {{-- <a href ="" id="btnContinuarPasoUno" class="btn btn-block pull-left btn-principal btn-continuar"><i class="fa fa-play-circle-o fa-3x" aria-hidden="true"></i><span style="font-size:40px;"> Continuar</span></a> --}}
                                     <button type="submit" id="btnContinuarPasoUno" class="btn btn-block pull-left btn-principal btn-continuar"><span style="font-size:40px;"><i class="fa fa-play-circle-o" aria-hidden="true"></i><span style="font-size:40px;">&nbsp; Registrarse</span></span></button>
                                    </div>
                                    
                                  </div>
        {!! Form::close() !!}
      </div>
  </div>
  <div class="col-xs-12 col-sm-6 formulario-registro formulario-registro-publicidad">
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
  </div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h2 class="text-center"><i class="fa fa-thumbs-up" aria-hidden="true"></i> Los Servicios te estan esperando <i class="fa fa-thumbs-up" aria-hidden="true"></i></h2>       </div>

      <div class="modal-body">
        <div class="row">
         <div class="col-xs-12 col-sm-12" style="">
          
          <table class="table-planes pull-left">
            <tr>
              {{-- <td class="table-planes-columna-plan hidden-xs">
                <h3></h3>
                <p class="open-paywall-price">
                <span class="PrecioPlan"></span></p>
                <p class="per-year">&nbsp;</p>
              </td> --}}
              <td class="text-center" style="border:1px solid black;">
              <p class="color-azul">Características</p>
              </td>
              <?php foreach ($planes as $plan): ?>
                  
                  @if ($plan->id === 2)
                      <td class="green-plan green-borde text-center ">
                        <h3 class="titulo-green" data-codigo="{{$plan->id}}">{{$plan->descripcion_plan}}</h3>
                        <p class="open-paywall-price">
                         <div class="row">
                          <div class="col-xs-12">
                          <span class="PrecioPlan">{{$plan->simbolo_moneda}}</span>
                          </div>
                          <div class="col-xs-12">
                            <span class="PrecioPlan precio-green">{{$plan->costo}}</span>
                          </div>
                         </div>
                        <p class="per-year debitacion-green">{{$plan->descripcion_debitacion}}</p>
                        <a href="" data-plan-type="green-plan green-borde" data-plan-id="green" class="btn btn-green">obtener</a>
                      </td>
                  @elseif ($plan->id === 3)
                     <td class="silver-plan text-center">
                      <h3 class="titulo-silver"  data-codigo="{{$plan->id}}">{{$plan->descripcion_plan}}</h3>
                      <p class="open-paywall-price">
                      <div class="row">
                        <div class="col-xs-12">
                        <span class="PrecioPlan">{{$plan->simbolo_moneda}}</span>
                        </div>
                        <div class="col-xs-12">
                          <span class="PrecioPlan  precio-silver ">{{$plan->costo}}</span>
                        </div>
                      <p class="per-year  debitacion-silver">{{$plan->descripcion_debitacion}}</p>
                      <a href="" data-plan-type="silver-plan" data-plan-id="silver" class="btn btn-silver">Obtener</a>
                    </td>
                  @else
                      <td class="gold-plan text-center">
                        <h3 class="titulo-gold"  data-codigo="{{$plan->id}}">{{$plan->descripcion_plan}}</h3>
                        <p class="open-paywall-price"> 
                          <div class="row">
                          <div class="col-xs-12">
                          <span class="PrecioPlan">{{$plan->simbolo_moneda}}</span>
                          </div>
                          <div class="col-xs-12">
                            <span class="PrecioPlan  precio-gold">{{$plan->costo}}</span>
                          </div>
                        </p>
                        <p class="per-year debitacion-gold">{{$plan->descripcion_debitacion}}</p>
                        <a href="" data-plan-type="oro-plan" data-plan-id="oro" class="btn btn-gold">Obtener</a>
                      </td>
                  @endif


                <?php endforeach;?> 
            </tr>
          </table>
          <table class="tables-planes-caracteristicas">
          <?php $contador = 1; foreach ($detalleplanes as $detalleplan): ?>
               @if ($contador == count($detalleplanes) )
                  <tr class="tables-planes-caracteristicas-fila tpc-ultima-fila">
               @else 
                  <tr class="tables-planes-caracteristicas-fila">
               @endif
              <td class="tpc-desripcion">{{$detalleplan->descripcion_detalle_planes}}</td>
              <td class="plan-check green-plan green-borde">
                @if ($detalleplan->nCheckLibre == 1)
                  <i class="fa fa-check-square-o" aria-hidden="true"></i>
                @endif
              </td>
              <td class="plan-check silver-plan selected">
                @if ($detalleplan->nCheckPlata == 1)
                  <i class="fa fa-check-square-o" aria-hidden="true"></i>
                @endif
              </td>
              <td class="plan-check gold-plan">
                @if ($detalleplan->nCheckOro == 1)
                <i class="fa fa-check-square-o" aria-hidden="true"></i>
                @endif
              </td>
            </tr>
            <?php $contador = $contador + 1; ?>
          <?php endforeach;?> 

           {{--  <tr class="tables-planes-caracteristicas-fila tpc-ultima-fila">
              <td class="tpc-desripcion">Precios con Descuentos</td>
              <td class="plan-check green-plan green-borde"></td>
              <td class="plan-check silver-plan selected"></td>
              <td class="plan-check gold-plan"><i class="fa fa-check-square-o" aria-hidden="true"></i></td>
            </tr> --}}
          </table>
        </div>
        </div>
      </div>
      <div class="modal-footer">
      
        <input type="submit" id="btnEscogerPlan" data-dismiss="modal" class="btn  btnEscogerPlan pull-right btn-danger" value="Escoger Plan"></input>

      </div>
                
    </div>
  </div>
</div>

@endsection


