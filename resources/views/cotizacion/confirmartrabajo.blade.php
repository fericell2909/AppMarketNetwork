@extends('app')
 
@section('content-proveedores')
@if(COUNT($datos) > 0)
  <br>
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-10 col-sm-offset-1">
        <h1 class="text-center color-azul"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp; Confirmación de Trabajo Realizado&nbsp; <i class="fa fa-pencil-square-o" aria-hidden="true"></i></h1>
              <ul class="nav nav-pills">
                  <li class="active">
                    <a data-toggle="pill" href="#home"><i class="fa fa-commenting-o" aria-hidden="true"></i>&nbsp;Mi Confirmación</a>
                  </li>
              </ul>
            
            <div class="tab-content">
             {!! Form::open(['route' => 'proveedores/RegistrarConfirmarTrabajo', 'class' => 'form','method' => 'POST','id'=> 'ActualizarTrabajoForm']) !!}
              <div id="home" class="tab-pane fade in active">
                  <div class="panel panel-default">

                    <div class="panel-heading fondo-naranja-oscuro color-blanco">
                        <h2 class="panel-title text-center" style="font-weight:bold;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp; Codigo de Oferta : {{$datos[0]->codigo_oferta}}</h2>
                    </div>
                    <div class="panel-body">

                            <label class="color-azul">Datos del Comprador</label>
                            <div class="form-group">
                                <div class="row">
                                  
                                  <input type="text" class="form-control" value="{{$datos[0]->codigo_detalle_orden}}" style="display:none;" id="codigo_detalle_orden" name="codigo_detalle_orden">
                                  
                                  <input type="text" class="form-control" value="{{$datos[0]->codigo_orden}}" style="display:none;" id="codigo_orden" name="codigo_orden">

                                  <input type="text" class="form-control" value="{{$datos[0]->codigo_oferta}}" style="display:none;" id="codigo_orden" name="codigo_oferta">

                                  <div class="col-xs-12 col-sm-3">
                                    <label class="color-azul">Nombres</label>
                                    <input type="text" class="form-control" value="{{$datos[0]->Nombres}}" readonly id="comprador_nombre" name="comprador_nombre">
                                  </div>
                                  <div class="col-xs-12 col-sm-3">
                                    <label class="color-azul">Apellidos</label>
                                    <input type="text" class="form-control" value="{{$datos[0]->Apellidos}}" readonly 
                                    id="apellidos_comprador" name="apellidos_comprador">
                                  </div>
                                  <div class="col-xs-12 col-sm-3">
                                    <label class="color-azul">Email</label>
                                    <input type="text" class="form-control" value="{{$datos[0]->email}}" readonly name="email_comprador" id="email_comprador">
                                  </div>
                                  <div class="col-xs-12 col-sm-3">
                                    <label class="color-azul">Celular</label>
                                    <input type="text" class="form-control" value="{{$datos[0]->celular}}" readonly>
                                  </div>
                                </div>                             
                            </div>
                            
                            <label class="color-azul">Datos de la Oferta</label>
                            <div class="form-group">
                              <label class="color-azul">Proveedor</label>
                              <input type="text" class="form-control" value="{{$datos[0]->prov_razon_social}}" readonly
                              id= "prov_razon_social" name="prov_razon_social">
                            </div>
                            <div class="form-group">
                              <label class="color-azul">Titulo de la Oferta</label>
                              <input type="text" class="form-control" value="{{$datos[0]->titulo_oferta}}" readonly>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                  <div class="col-xs-12 col-sm-3">
                                    <label class="color-azul">Estado</label>
                                    <input type="text" class="form-control" value="{{$datos[0]->nombre_estado_oferta}}" readonly>
                                  </div>
                                  <div class="col-xs-12 col-sm-3">
                                    <label class="color-azul">Tipo de Oferta</label>
                                    <input type="text" class="form-control" value="{{$datos[0]->nombre_tipos_oferta}}" readonly>
                                  </div>
                                  <div class="col-xs-12 col-sm-3">
                                    <label class="color-azul">Fecha de Inicio</label>
                                    <input type="text" class="form-control" value="{{$datos[0]->fecha_inicio}}" readonly>
                                  </div>
                                  <div class="col-xs-12 col-sm-3">
                                    <label class="color-azul">Fecha de Término</label>
                                    <input type="text" class="form-control" value="{{$datos[0]->fecha_termino}}" readonly>
                                  </div>
                                </div>      
                            </div>
                            
                            <div class="form-group">
                                <div class="row">
                                  <div class="col-xs-12 col-sm-3">
                                    <label class="color-azul">Precio Real</label>
                                    <input type="text" class="form-control" value="{{$datos[0]->precio_real}}" readonly>
                                  </div>
                                  <div class="col-xs-12 col-sm-3">
                                    <label class="color-azul">Precio Oferta</label>
                                    <input type="text" class="form-control" value="{{$datos[0]->precio_oferta}}" readonly>
                                  </div>
                                  <div class="col-xs-12 col-sm-3">
                                    <label class="color-azul">Descuento</label>
                                    <input type="text" class="form-control" value="{{$datos[0]->descuento}}" readonly>
                                  </div>
                                  <div class="col-xs-12 col-sm-3">
                                    <label class="color-azul">Total de Comentarios</label>
                                    <input type="text" class="form-control" value="{{$datos[0]->total_comentarios}}" readonly>
                                  </div>
                                </div>
                            </div>
                            <label class="color-azul">Imagen de la Oferta</label>
                            <div class="form-group">
                              <center>
                                <img src="{{$datos[0]->ruta_imagen_oferta}}" class="img-responsive" alt="Imagen de la Oferta" style="border-radius:5px;">
                              </center>
                            </div>
                             <div class="form-group">
                                <input type="text" style="display:none;" class="form-control" name="user_id"  value="{{$datos[0]->user_id}}">
                                <input type="submit" id = "btnConfirmarTrabajo" class="btnConfirmarTrabajo btn btn-principal" style="margin-left:15px;" value="Confirmar Trabajo">
                                <img src="/images/loading.gif" alt="" id="gifloading" style="display:none;">
                            </div>
                    </div>
                  </div>
              </div> 
               {!! Form::close() !!}
            </div>
      </div>
    </div>
  </div>
@else
<div class="container">
  <div class="row">
        <h1 class="text-center color-azul"><i class="fa fa-list" aria-hidden="true"></i>&nbsp;Confirmar Trabajo&nbsp;<i class="fa fa-list" aria-hidden="true"></i></h1>
        <ul class="list-group">
            <li class="list-group-item active"><i class="fa fa-lock" aria-hidden="true"></i>&nbsp;Trabajo&nbsp;<span class="badge">0</span></li>
            <li class="list-group-item">
                <center>
                    <img src="/images/cero.png" title="Cero Datos Encontrados" class="img img-responsive">
                    <p class="color-azul cuenta-usuario-row"><b>No se encontraron datos para Confirmar Trabajo</b></p>
                    <p class="color-azul cuenta-usuario-row">Por favor comuníquese con soporte</p>
                </center>
            </li>
        </ul>

    </div>
</div>



@endif
  
@endsection

@section('scripts')

<script>

$(document).ready(function()
{

    $("#btnConfirmarTrabajo").on("click", function(evt) {
       $("#gifloading").show();
    });

});
</script>
@endsection