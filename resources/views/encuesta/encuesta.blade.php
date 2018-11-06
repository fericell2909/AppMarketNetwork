@extends('app')
 @section('css')
 <style type="text/css" media="screen">
    .clsEncuesta
    {
    	min-width: 0;
	    border: 0;
	    display: block;
	    width: 100%;
	    padding: 10px 10px 35px 10px;
	    background-color: #ffffff;
	    -webkit-border-radius: 5px;
	    -moz-border-radius: 5px;
	    border-radius: 5px;
	    border: 1px solid var(--naranja);
    }  
    
    h2 .title-part {
    	padding-right: 29px;
    	padding-left: 29px;
    	padding-bottom: 15px;
    	color: var(--azul);
    }   

    h2 span.number {
	    display: block !important;
	    width: 30px !important;
	    height: 30px !important;
	    line-height: 30px !important;
	    font-size: 15px !important;
	    background: var(--naranja);
	    color:white;
	    border-radius: 2.5px;
	    text-align: center;
	    margin: 0 auto;
	}

	.input-group-title, .input-group-checkbox, .input-group-title {
    	background-color: var(--naranjafondo);
    	color:var(--azul);
	    display: table-cell;
    	min-height: 32px;
	    text-align: left;
	    padding: 5px 10px;
	    font-weight: normal;
	    width: 100%;
	    margin-bottom: 5px;
}
	input[type='radio']:after {
        width: 25px;
        height: 25px;
        border-radius: 25px;
        top: -2px;
        left: -1px;
        position: relative;
        background-color: #d1d3d1;
        content: '';
        display: inline-block;
        visibility: visible;
        border: 2px solid white;
    }

    input[type='radio']:checked:after {
        width: 25px;
        height: 25px;
        border-radius: 25px;
        top: -2px;
        left: -1px;
        position: relative;
        background-color: var(--naranja);
        content: '*';
        font-size: 20px;
        display: inline-block;
        visibility: visible;
        border: 2px solid white;
    }
    input:checked + span
    {
        background-color: var(--naranja);
        color: white;   
    }
 </style>
@endsection
@section('content-miembros')

<br>
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-10 col-sm-offset-1">
			<h1 class="text-center color-azul"><i class="fa fa-question-circle" aria-hidden="true"></i>&nbsp; Encuesta de Servicio Brindado&nbsp; <i class="fa fa-question-circle" aria-hidden="true"></i></h1>
            <ul class="nav nav-pills">
                <li class="active"><a data-toggle="pill" href="#home"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;Tú Opinión es Importante</a></li>
              </ul>
          
          <div class="tab-content">
           
            <div id="home" class="tab-pane fade in active">
                {!! Form::open(['route' => 'Encuestas/EnviarEncuesta', 'class' => 'form','method' => 'POST','id'=> 'RegistroEncuestaClienteForm']) !!}
              <div class="panel panel-default">

                <div class="panel-heading fondo-naranja-oscuro color-blanco">
                    <h2 class="panel-title text-center" style="font-weight:bold;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp; Ayúdanos a Mejorar</h2>
                </div>
                <div class="panel-body">

                    <h2><div class="title-part">
                                            <span class="number" style="width:200px !important;">Datos de la Oferta</span>
                                            </div>
                    </h2>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12">
                                <label class="color-azul">Titulo de Oferta</label>
                                <input type="text" name="titulo_oferta" id="titulo_oferta" class="form-control" value="{{$datos_temporales_encuestas[0]->titulo_oferta}}" style="display:block;" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xs-12">
                            <label class="color-azul">Proveedor</label>
                            <input type="text" name="prov_razon_social" id="prov_razon_social" class="form-control" maxlength="100" value="{{$datos_temporales_encuestas[0]->prov_razon_social}}" readonly >
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12 col-sm-4">
                                <label class="color-azul">Precio Real</label>
                                <input type="text" name="precio_real" id="precio_real" class="form-control" value="{{$datos_temporales_encuestas[0]->precio_real}}" readonly>
                            </div>
                            <div class="col-xs-12 col-sm-4">
                                <label class="color-azul">Precio Oferta</label>
                                <input type="text" name="precio_oferta" id="precio_oferta" class="form-control" value="{{$datos_temporales_encuestas[0]->precio_oferta}}"  readonly>
                            </div>
                            <div class="col-xs-12 col-sm-4">
                                <label class="color-azul">Descuento</label>
                                <input type="text" name="descuento" id="descuento" class="form-control" value="{{$datos_temporales_encuestas[0]->descuento}}"  readonly>
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <h2 class="color-azul" style="margin-left:30px;">Dejanos un Comentario</h2>
                        <textarea name="comentario_servicio" id="comentario_servicio" class="form-control" rows="3" required="required"></textarea>
                        <span  id ="ErrorMensaje-comentario_servicio" class="help-block"></span>
                    </div>
                        @foreach($preguntas as $pregunta)
                            <div class="form-group">
                                <fieldset class="clsEncuesta">
    	                            	<h2><div class="title-part">
    										<span class="number">{{$pregunta->id}}</span>
    										{{$pregunta->titulo_pregunta}}</div>
    									</h2>
    								@foreach($cuestionarios as $cuestionario)
                                        @if($cuestionario->id == $pregunta->id )
                                            <label class="input-group input-group-radio row">
            									<input type="radio" checked name="{{$pregunta->id}}" value="{{$cuestionario->CodigoOpcion}}" style="margin-left: 10px;
            													margin-right: 10px;">
            									<span class="input-group-title">{{$cuestionario->titulo_opcion}}</span>
            								</label>
                                        @endif
                                    @endforeach
    							</fieldset>
                            </div>
                        @endforeach

                        <div class="form-group">
                            <input type="submit" id = "btnRegistrarCuestionarioCliente" class="btnRegistrarCuestionarioCliente btn btn-principal" value="Enviar Encuesta">
                            <img src="/images/loading.gif" alt="" id="gifloading" style ="display:none;">
                             <input type="text" name="proveedor_id" id="proveedor_id" class="form-control" value="{{$datos_temporales_encuestas[0]->codigo_proveedor}}" style="display:none;">
                                <input type="text" name="oferta_id" id="oferta_id" class="form-control" value="{{$datos_temporales_encuestas[0]->oferta_id}}" style="display:none;">

                                 <input type="text" id = "numeropreguntas" name="numeropreguntas" value="{{COUNT($preguntas)}}" style="display:none;">
                                
                                <input type="text" id = "ordenes_detalles_id" name="ordenes_detalles_id" value="{{$datos_temporales_encuestas[0]->ordenes_detalles_id}}" style="display:none;">
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
<script type="text/javascript" >
$(document).ready(function()
	{

		$("#btnRegistrarCuestionarioCliente").click(function () { 

            var comentario_servicio =  $("#comentario_servicio").val().trim();

          if( comentario_servicio == null || comentario_servicio.length == 0  ) {
                comentario_servicio = null;
                $("#ErrorMensaje-comentario_servicio").text('El Comentario No puede ser vacío.');
                $("#ErrorMensaje-comentario_servicio").show();
                $("#comentario_servicio").focus();
                return false;
            }

        $('#gifloading').show();

        });

        $('#comentario_servicio').on("keypress",function (){
            $("#ErrorMensaje-comentario_servicio").hide();
        });





	});	

</script>

@endsection