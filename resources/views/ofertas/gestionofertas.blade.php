@extends('app')
 
@section('content-proveedores')
<br>
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-10 col-sm-offset-1">
			<h1 class="text-center color-azul"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp; Registro de Ofertas&nbsp; <i class="fa fa-pencil-square-o" aria-hidden="true"></i></h1>
            <ul class="nav nav-pills">
                <li class="active"><a data-toggle="pill" href="#home"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;Registrar Oferta  
                    @if($id == 0)
                        Publica
                    @else
                        Privada
                    @endif
                 </a></li>
            </ul>
          
          <div class="tab-content">
           
            <div id="home" class="tab-pane fade in active">
                {!! Form::open(['route' => 'Ofertas/Registrar', 'class' => 'form','method' => 'POST','id'=> 'RegistroOfertaForm','files' => true]) !!}
              <div class="panel panel-default">

                <div class="panel-heading fondo-naranja-oscuro color-blanco">
                    <h2 class="panel-title text-center" style="font-weight:bold;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp; Oferta @if($id == 0)
                        Publica
                    @else
                        Privada
                    @endif</h2>
                </div>
                    <div class="panel-body">
                         
                        <div class="form-group row">
                            <div class="col-sm-12">
                              <label class="color-azul">Titulo de Oferta:</label>
                              <input type="text" class="form-control" id="titulo_oferta" name="titulo_oferta"  required maxlength="100">
                              <span  id ="ErrorMensaje-titulo_oferta" class="help-block"></span>
                            </div>
                        </div>
 
                        <div class="form-group row">
                          <div class="col-sm-6">
                            <label class="color-azul">Tipo de Oferta</label>
                            <select class="form-control text-center" name="nTipo_Oferta" id="nTipo_Oferta">

                              @foreach ($tipoofertas as $tipooferta): ?>

                                @if ($id == 0 and $tipooferta->id == 1 )
                                    <option selected value="{{ $tipooferta->id }}" >{{ $tipooferta->nombre_tipos_oferta }}</option>
                                @elseif ($id > 0 and $tipooferta->id == 2)
                                    <option value="{{ $tipooferta->id }}" >{{ $tipooferta->nombre_tipos_oferta }}</option>
                                @endif    
                              @endforeach
                              
                            </select>
                            <span  id ="ErrorMensaje-nTipo_Oferta" class="help-block"></span>
                          </div>
                          <div class="col-sm-6">
                            <label class="color-azul">Servicio</label>
                            <select class="form-control text-center" name="servicio_id" id="servicio_id">
                              <?php foreach ($servicios as $servicio): ?>
                                              <option value="{{ $servicio->id }}">{{ $servicio->nombre_servicio }}</option>  
                              <?php endforeach;?> 
                            </select>
                            <span  id ="ErrorMensaje-servicio_id" class="help-block"></span>
                          </div>
                        </div>

                        @if($id > 0 )
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
                            <legend  class="color-azul">Precios y Moneda</legend>
                            <div class="col-sm-4">
                                <label class="color-azul">Precio Oferta</label>
                                <input type="number" step="0.1" class="form-control"  id="precio_oferta" name="precio_oferta"  required  value="1.00">
                                <span  id ="ErrorMensaje-precio_oferta" class="help-block"></span>
                            </div>
                            <div class="col-sm-4">
                                <label class="color-azul">Precio Real</label>
                                <input type="number" step="0.1" class="form-control"  id="precio_real" name="precio_real"  required  value="1.00">
                                <span  id ="ErrorMensaje-precio_real" class="help-block"></span>
                            </div>
                            <div class="col-sm-4">
                                <label class="color-azul">Moneda</label>
                                <select class="form-control text-center" name="monedas_id" id="monedas_id">
                                  <?php foreach ($monedas as $moneda): ?>
                                                  <option value="{{ $moneda->id }}">{{ $moneda->descripcion_moneda }}</option>  
                                  <?php endforeach;?> 
                                </select>
                                <span  id ="ErrorMensaje-monedas_id" class="help-block"></span>
                            </div>
                             <div class="col-sm-4" style="display:none;">
                                <label class="color-azul">Descuento (%)</label>
                                <input type="number" step="0.1" class="form-control"  id="descuento" name="descuento"  required  value="0.00" readonly>
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
                                  value="{{date('Y-m-d')}}" required>
                                <span  id ="ErrorMensaje-fecha_inicio" class="help-block"></span>
                            </div>
                            <div class="col-sm-6">
                                <label class="color-azul">Fecha Termino</label>
                                <input type="date" class="form-control"  id="fecha_termino" name="fecha_termino" value="{{date('Y-m-d')}}" required>
                                <span  id ="ErrorMensaje-fecha_termino" class="help-block"></span>
                            </div>
                          </fieldset>
                        </div>

                        <div class="form-group">
                          <fieldset>
                            <legend  class="color-azul">Imagen de la Oferta</legend>
                            <input type="file" id="files" name="files" class="form-control" accept="image/jpg"/>
                            <br />
                            <output id="list"></output>
                            <span  id ="ErrorMensaje-files" class="help-block"></span>
                          </fieldset>
                        </div>

                        <div class="form-group">
                          <fieldset>
                            <legend  class="color-azul">Detalle de Oferta</legend>
                            <div class="col-sm-12">
                                <div class="row">
                                  <button type="button" class="btnAgregarFila btn btn-success pull-left"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp; Agregar</button>
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
                                    </tbody>
                                  </table>
                                </div>
                            </div>
                          </fieldset>
                        </div>

                        <div class="form-group">
                            <input type="text" style="display:none;" class="form-control" name="user_id"  value="{{Auth::user()->id}}">
                            <input type="submit" id = "btnRegistrarOferta" class="btnRegistrarOferta btn btn-principal" value="Registrar Oferta @if($id == 0)
                        Publica
                    @else
                        Privada
                    @endif" >
                        </div>

                    </div>
              </div>
              {!! Form::close() !!}
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


  $(document).on('click',".btnAgregarFila" ,function(event) {

      $('#ErrorMensaje-tabla').hide();

      var row="<tr class='row-fila-detalle'><td><textarea name='descripcion_detalle[]' id='descripcion_detalle' class='form-control descripcion_detalle' rows='3'  required></textarea></td><td style='vertical-align: middle;' class='eliminar-fila-detalle text-center'><button type='button' class='btnEliminarFila btn btn-danger'>Eliminar</button></td></tr>";
      
      $("#tabla tbody").append(row);

    /* Act on the event */
  });

  $(document).on("click",".eliminar-fila-detalle",function(){
    var parent = $(this).parents().get(0);
    $(parent).remove();
  });


  $(document).on("click",".btnRegistrarOferta",function(){
    
    var titulo_oferta = $('#titulo_oferta').val().trim();

    if( titulo_oferta == null || titulo_oferta.length == 0  ) {
      titulo_oferta = null;
      $("#ErrorMensaje-titulo_oferta").text('El titulo de la oferta no puede ser vacio.');
        $("#ErrorMensaje-titulo_oferta").show();
        $("#titulo_oferta").focus();
        return false;
      }

      var precio_oferta = $('#precio_oferta').val().trim();

    if( precio_oferta == null || precio_oferta.length == 0  || precio_oferta == undefined ) {
      precio_oferta = null;
      $("#ErrorMensaje-precio_oferta").text('El Precio de la Oferta no puede ser vacio.');
        $("#ErrorMensaje-precio_oferta").show();
        $("#precio_oferta").focus();
        return false;
      }

      if( precio_oferta <= 0 ) {
      precio_oferta = null;
      $("#ErrorMensaje-precio_oferta").text('El Precio de la Oferta no puede ser menor que cero.');
        $("#ErrorMensaje-precio_oferta").show();
        $("#precio_oferta").focus();
        return false;
      }
      

    var precio_real = $('#precio_real').val().trim();

    if( precio_real == null || precio_real.length == 0  || precio_real == undefined ) {
      precio_real = null;
      $("#ErrorMensaje-precio_real").text('El Precio Real no puede ser vacio.');
        $("#ErrorMensaje-precio_real").show();
        $("#precio_real").focus();
        return false;
      }
      
      if( precio_real <= 0 ) {
        precio_real = null;
      $("#ErrorMensaje-precio_real").text('El Precio Real no puede ser menor que cero');
        $("#ErrorMensaje-precio_real").show();
        $("#precio_real").focus();
        return false;
      }

      var fecha_inicio = $('#fecha_inicio').val().trim();

      if( fecha_inicio == null || fecha_inicio.length == 0  || fecha_inicio == undefined ) {
          fecha_inicio = null;
      $("#ErrorMensaje-fecha_inicio").text('La Fecha de Inicio no puede ser vacio.');
        $("#ErrorMensaje-fecha_inicio").show();
        $("#fecha_inicio").focus();
        return false;
      }

      var fecha_termino = $('#fecha_termino').val().trim();

      if( fecha_termino == null || fecha_termino.length == 0  || fecha_termino == undefined ) {
          fecha_termino = null;
      $("#ErrorMensaje-fecha_termino").text('La Fecha de Termino no puede ser vacio.');
        $("#ErrorMensaje-fecha_termino").show();
        $("#fecha_termino").focus();
        return false;
      }

      if ( fecha_inicio >= fecha_termino)
      {
        $("#ErrorMensaje-fecha_inicio").text('La Fecha de Inicio no puede ser mayor o igual que la Fecha de Termino de Oferta.');
        $("#ErrorMensaje-fecha_inicio").show();
        $("#fecha_inicio").focus();
        return false;

      }

        var Hoy = new Date().toJSON().slice(0,10)

      if ( fecha_inicio < Hoy)
      {
        $("#ErrorMensaje-fecha_inicio").text('La Fecha de Inicio no puede ser menor que la fecha del dia.');
        $("#ErrorMensaje-fecha_inicio").show();
        $("#fecha_inicio").focus();
        return false;

      }

      if ( fecha_termino < Hoy)
      {
        $("#ErrorMensaje-fecha_termino").text('La Fecha de Termino no puede ser menor que la fecha del dia.');
        $("#ErrorMensaje-fecha_termino").show();
        $("#fecha_termino").focus();
        return false;

      }

      if ($('#tabla >tbody >tr').length == 0){
          $("#ErrorMensaje-tabla").text('No Existe detalle de la Oferta');
          $("#ErrorMensaje-tabla").show();
        return false;
      }


      var files = $('#files').val();

          if (files.length <= 0 ) {

            $('#ErrorMensaje-files').text('Debe seleccionar una Imagen a Cargar Para la Oferta');
            $('#ErrorMensaje-files').show();

            return false;

          };


     // return false;

  });

$("#titulo_oferta").on('keypress',function(event) {
  $("#ErrorMensaje-titulo_oferta").hide();

});

$("#precio_oferta").on('keypress',function(event) {
  $("#ErrorMensaje-precio_oferta").hide();
});

$("#precio_real").on('keypress',function(event) {
  $("#ErrorMensaje-precio_real").hide();
});

$("#fecha_inicio").on('click',function(event) {
  $("#ErrorMensaje-fecha_inicio").hide();
});

$("#fecha_termino").on('click',function(event) {
  $("#ErrorMensaje-fecha_termino").hide();
});


function archivo(evt) {
                  var files = evt.target.files; // FileList object
             
                  // Obtenemos la imagen del campo "file".
                  for (var i = 0, f; f = files[i]; i++) {
                    //Solo admitimos imágenes.
                    if (!f.type.match('image.*')) {
                        continue;
                    }
             
                    var reader = new FileReader();
             
                    reader.onload = (function(theFile) {
                        return function(e) {
                          // Insertamos la imagen
                         //document.getElementById("list").innerHTML = ['<img class="imagen-oferta" src="', e.target.result,'" title="', 
                         //escape(theFile.name), '"/>'].join('');

                         document.getElementById("list").innerHTML = ['<div class="alert alert-info text-center"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><img class="img img-responsive imagen-oferta" src="', e.target.result,'" title="', escape(theFile.name), '"/></div>'].join('');

                         
                        
                        
                      


                        };
                    })(f);
             
                    reader.readAsDataURL(f);
                  }
              }
             
              document.getElementById('files').addEventListener('change', archivo, false);


  
});
</script>
@endsection



