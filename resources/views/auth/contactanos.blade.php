@extends('app')
 
@section('content')
<br>
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-10 col-sm-offset-1">
			<h1 class="text-center color-azul"><i class="fa fa-envelope" aria-hidden="true"></i>&nbsp; Contáctanos - Nuevo Oficio&nbsp; <i class="fa fa-envelope" aria-hidden="true"></i></h1>
            <ul class="nav nav-pills">
                <li class="active"><a data-toggle="pill" href="#home"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;Solicitud Nuevo Oficio</a></li>
              </ul>
          
          <div class="tab-content">
           
            <div id="home" class="tab-pane fade in active">
                {!! Form::open(['route' => 'Oficios/Contactanos', 'class' => 'form','method' => 'POST','id'=> 'RegistroSolicitudOficioForm']) !!}
              <div class="panel panel-default">

                <div class="panel-heading fondo-naranja-oscuro color-blanco">
                    <h2 class="panel-title text-center" style="font-weight:bold;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp; Envio de Solicitud</h2>
                </div>
                    <div class="panel-body">
                        
                        <div class="form-group">
                            <label class="color-azul">Titulo de Solicitud:</label>
                            <input type="text" class="form-control" id="titulo_contacto" name="titulo_contacto" value="Solicitud de Registro de Nuevo Oficio y/o Profesión"  required maxlength="100">
                            <span  id ="ErrorMensaje-titulo_contacto" class="help-block"></span>
                        </div>

                        <div class="form-group">
                            <label class="color-azul">Nombres y Apellidos:</label>
                            <input type="text" class="form-control" id="Nombres" name="Nombres"  required maxlength="50" placeholder="Juan Perez" >
                            <span  id ="ErrorMensaje-Nombres" class="help-block"></span>
                        </div>

                        <div class="form-group">
                            <label class="color-azul">Correo Electrónico:</label>
                            <input type="email" class="form-control" id="Correo" name="correo" placeholder="Introduzca su correo electrónico" required>
                            <span  id ="ErrorMensaje-Correo" class="help-block"></span>
                        </div>

                        <div class="form-group">
                            <label class="color-azul">Mensaje</label>
                            <textarea class="color-negro" name="descripcion_mensaje_solicitud" id ="descripcion_mensaje_solicitud" rows=10 style="width: 100%">Por Favor solicito se agregue un nuevo oficio; el cual actualmente no se encuentra en la lista proporcionada.
                            El Oficio es el siguiente:  ********* .
                            </textarea>
                            <span  id ="ErrorMensaje-descripcion_mensaje_solicitud" class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <input type="submit" id = "btnRegistrarSolicitudOficio" class="btnRegistrarSolicitudOficio btn btn-principal" value="Enviar Solicitud de Nuevo Oficio">
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
     

});
  </script>
@endsection
