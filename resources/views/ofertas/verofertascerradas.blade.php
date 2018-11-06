
@extends('app')
 
@section('content-proveedores')
<br>
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-10 col-sm-offset-1">
			<h1 class="text-center color-azul"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp; Ver Ofertas Cerradas &nbsp; <i class="fa fa-pencil-square-o" aria-hidden="true"></i></h1>
            <ul class="nav nav-pills">
                <li class="active"><a data-toggle="pill" href="#home"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;Ver Ofertas Cerradas </a></li>
            </ul>
          
          <div class="tab-content">
           
            <div id="home" class="tab-pane fade in active">
              <div class="panel panel-default">

                <div class="panel-heading fondo-naranja-oscuro color-blanco">
                    <h2 class="panel-title text-center" style="font-weight:bold;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp; Oferta N° {{$ofertas[0]->id}}</h2>
                </div>
                    <div class="panel-body">
                         
                        <div class="form-group row">
                            <div class="col-sm-12">
                              <label class="color-azul">Titulo de Oferta:</label>
                              <input type="text" class="form-control" id="titulo_oferta" name="titulo_oferta"  required maxlength="100" value="{{$ofertas[0]->titulo_oferta}}" readonly>
                              <span  id ="ErrorMensaje-titulo_oferta" class="help-block"></span>
                            </div>
                        </div>
 
                        <div class="form-group row">
                          <div class="col-sm-4">
                            <label class="color-azul">Tipo de Oferta</label>
                            <select class="form-control text-center" name="nTipo_Oferta" id="nTipo_Oferta" disabled>

                              <?php foreach ($tipoofertas as $tipooferta): ?>
                                              <option <?php if ($tipooferta->id == $ofertas[0]->nTipo_Oferta): ?>
                                              			selected
                                              <?php endif ?> value="{{ $tipooferta->id }}">{{ $tipooferta->nombre_tipos_oferta }}</option>  
                              <?php endforeach;?> 
                              
                            </select>
                            <span  id ="ErrorMensaje-nTipo_Oferta" class="help-block"></span>
                          </div>
                          <div class="col-sm-4">
                            <label class="color-azul">Servicio</label>
                            <select class="form-control text-center" name="servicio_id" id="servicio_id" disabled>
                              <?php foreach ($servicios as $servicio): ?>
                                              <option <?php if ($servicio->id == $ofertas[0]->servicio_id): ?>
                                              			selected
                                              <?php endif ?> value="{{ $servicio->id }}">{{ $servicio->nombre_servicio }}</option>  
                              <?php endforeach;?> 
                            </select>
                            <span  id ="ErrorMensaje-servicio_id" class="help-block"></span>
                          </div>
                          <div class="col-sm-4">
                            <label class="color-azul">Estado</label>
                            <select class="form-control text-center" name="nEstado_Oferta" id="nEstado_Oferta" disabled>
                              <?php foreach ($estadosOfertas as $estadosOferta): ?>
                                              <option <?php if ($estadosOferta->id == $ofertas[0]->nEstado_Oferta): ?>
                                                    selected
                                              <?php endif ?> value="{{ $estadosOferta->id }}">{{ $estadosOferta->nombre_estado_oferta }}</option>  
                              <?php endforeach;?> 
                            </select>
                            <span  id ="ErrorMensaje-nEstado_Oferta" class="help-block"></span>
                          </div>
                        </div>

                        @if($ofertas[0]->nTipo_Oferta == 2)
                           @foreach($cotizacionusuarios as $cotizacionusuario)
                             <div class="form-group">
                                <fieldset>
                                  <legend  class="color-azul">Datos del Usuario y Cotizacion</legend>
                                    <div class="row">
                                      <div class="col-sm-4">
                                          <label class="color-azul">Nombres</label>
                                          <input type="text" class="form-control"  id="Nombres_cotizacion" name="Nombres_cotizacion"  readonly value="{{$cotizacionusuario->Nombres}}">
                                          <span  id ="ErrorMensaje-Nombres_cotizacion" class="help-block"></span>
                                      </div>
                                      <div class="col-sm-4">
                                          <label class="color-azul">Apellidos</label>
                                          <input type="text" class="form-control"  id="Apellidos_cotizacion" name="Apellidos_cotizacion" readonly value="{{$cotizacionusuario->Apellidos}}">
                                          <span  id ="ErrorMensaje-Apellidos_cotizacion" class="help-block"></span>
                                      </div>
                                      <div class="col-sm-4">
                                          <label class="color-azul">Email</label>
                                          <input type="text" class="form-control"  id="email_cotizacion" name="email_cotizacion"    readonly value="{{$cotizacionusuario->email}}">
                                          <span  id ="ErrorMensaje-email_cotizacion" class="help-block"></span>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-12">
                                          <label class="color-azul">Titulo Cotización</label>
                                          <input type="text" class="form-control"  id="titulo_cotizacion" name="titulo_cotizacion"   readonly value="{{$cotizacionusuario->titulo_cotizacion}}">
                                          <span  id ="ErrorMensaje-titulo_cotizacion" class="help-block"></span>
                                      </div>
                                      <div class="col-sm-12">
                                          <label class="color-azul">Descripcion de Cotización</label>
                                          <textarea class="form-control"  id="Descripcion_cotizacion" name="Descripcion_cotizacion"  rows=4 readonly>{{$cotizacionusuario->descripcion_cotizacion}}</textarea>
                                          <span  id ="ErrorMensaje-descripcion_cotizacion" class="help-block"></span>
                                      </div>
                                    </div>
                                    <input type="text" style="display:none;" class="form-control" name="usersid"  value="{{$cotizacionusuario->usersid}}">
                                    <input type="text" style="display:none;" class="form-control" name="cotizacionid"  value="{{$cotizacionusuario->cotizacionid}}">
                                </fieldset>
                              </div>
                          @endforeach
                        @endif

                        <div class="form-group">
                          <fieldset>
                            <legend  class="color-azul">Precios y Descuentos</legend>
                            <div class="col-sm-4">
                                <label class="color-azul">Precio Oferta</label>
                                <input type="number" step="0.1" class="form-control"  id="precio_oferta" name="precio_oferta"  required  value="{{$ofertas[0]->precio_oferta}}" readonly>
                                <span  id ="ErrorMensaje-precio_oferta" class="help-block"></span>
                            </div>
                            <div class="col-sm-4">
                                <label class="color-azul">Precio Real</label>
                                <input type="number" step="0.1" class="form-control"  id="precio_real" name="precio_real"  required  value="{{$ofertas[0]->precio_real}}" readonly>
                                <span  id ="ErrorMensaje-precio_real" class="help-block"></span>
                            </div>
                            <div class="col-sm-4">
                                <label class="color-azul">Moneda</label>
                                <select class="form-control text-center" name="monedas_id" id="monedas_id" disabled>
                                  <?php foreach ($monedas as $moneda): ?>
                                                  <option <?php if ($moneda->id == $ofertas[0]->monedas_id): ?>
                                              			selected
                                              <?php endif ?> value="{{ $moneda->id }}">{{ $moneda->descripcion_moneda }}</option>  
                                  <?php endforeach;?> 
                                </select>
                                <span  id ="ErrorMensaje-monedas_id" class="help-block"></span>
                            </div>
                             <div class="col-sm-4" style="display:none;">
                                <label class="color-azul">Descuento (%)</label>
                                <input type="number" step="0.1" class="form-control"  id="descuento" name="descuento"  required  value="{{$ofertas[0]->descuento}}" readonly>
                                <span  id ="ErrorMensaje-descuento" class="help-block"></span>
                            </div>
                          </fieldset>
                        </div>

                        <div class="form-group">
                          <fieldset>
                            <legend  class="color-azul">Vigencia de Oferta</legend>
                            <div class="col-sm-6">
                                <label class="color-azul">Fecha Inicio</label>
                                <input type="date"  class="form-control"  id="fecha_inicio" name="fecha_inicio" 
                                  value="{{$ofertas[0]->fecha_inicio}}" required readonly>
                                <span  id ="ErrorMensaje-fecha_inicio" class="help-block"></span>
                            </div>
                            <div class="col-sm-6">
                                <label class="color-azul">Fecha Termino</label>
                                <input type="date" class="form-control"  id="fecha_termino" name="fecha_termino" value="{{$ofertas[0]->fecha_termino}}" required readonly>
                                <span  id ="ErrorMensaje-fecha_termino" class="help-block"></span>
                            </div>
                          </fieldset>
                        </div>

                        <div class="form-group">
                          <fieldset>
                            <legend  class="color-azul">Imagen de la Oferta</legend>
                            <img src="{{$ofertas[0]->ruta_imagen_oferta}}" class="img img-responsive imagen-oferta" alt="Imagen de Producto" readonly>
                            <output id="list"></output>
                            <span  id ="ErrorMensaje-file" class="help-block"></span>
                          </fieldset> 
                        </div>

                        <div class="form-group">
                          <fieldset>
                            <legend  class="color-azul">Detalle de Oferta</legend>
                            <div class="col-sm-12">
                                <div class="row">
                                  <button type="button" class="btnAgregarFila btn btn-success pull-left" disabled><i class="fa fa-plus" aria-hidden="true"></i>&nbsp; Agregar</button>
                                </div>
                                <span  id ="ErrorMensaje-tabla" class="help-block"></span>                               
                                <div class="table-responsive">
                                  <table id="tabla" class="table table-hover">
                                    <thead>
                                      <tr>
                                        <th class="color-azul text-center">Descripcion</th>
                                        <th class="color-azul text-center">Acciones</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($ofertasdetalles as $ofertasdetalle)
                                    	<tr class='row-fila-detalle'><td><textarea readonly name='descripcion_detalle[]' id='descripcion_detalle' class='form-control descripcion_detalle' rows='3'  required 
                                    	>{{$ofertasdetalle->descripcion_detalle}}</textarea></td><td style='vertical-align: middle;' class='eliminar-fila-detalle text-center'><button type='button' class='btnEliminarFila btn btn-danger' disabled>Eliminar</button></td></tr>
                                    @endforeach
                                    </tbody>
                                  </table>
                                </div>
                            </div>
                          </fieldset>
                        </div>

                        <div class="form-group">
                            <input type="text" style="display:none;" class="form-control" name="user_id"  value="{{Auth::user()->id}}">
                            <input type="text" style="display:none;" class="form-control" name="oferta_id"  value="{{$ofertas[0]->id}}">
                        </div>
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
@endsection


