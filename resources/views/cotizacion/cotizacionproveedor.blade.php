@extends('app')
 
@section('content-proveedores')
@if(COUNT($cotizaciones) > 0)
  <br>
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-10 col-sm-offset-1">
        <h1 class="text-center color-azul"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp; Gestión de Cotizaciones&nbsp; <i class="fa fa-pencil-square-o" aria-hidden="true"></i></h1>
              <ul class="nav nav-pills">
                  <li class="active">
                    <a data-toggle="pill" href="#home"><i class="fa fa-commenting-o" aria-hidden="true"></i>&nbsp;Comentarios</a>
                  </li>
                  <li>
                    <a data-toggle="pill" href="#aceptadas">
                      <i class="fa fa-check-square" aria-hidden="true"></i>
                      &nbsp;Cotizaciones Aceptadas
                    </a>
                  </li>
              </ul>
            
            <div class="tab-content">
              <div id="home" class="tab-pane fade in active">
                  <div class="panel panel-default">

                    <div class="panel-heading fondo-naranja-oscuro color-blanco">
                        <h2 class="panel-title text-center" style="font-weight:bold;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp; Listado de Cotizaciones</h2>
                    </div>
                        <div class="panel-body">
                             
                            <div class="table-responsive" id="lista-cotizaciones">
                              @include('cotizacion.table')
                            </div>
                            <div id="ListaComentarios">

                            </div>                    

                        </div>
                  </div>
              </div> 
              <div id="aceptadas" class="tab-pane fade">
                <div class="panel panel-default">

                    <div class="panel-heading fondo-naranja-oscuro color-blanco">
                        <h2 class="panel-title text-center" style="font-weight:bold;"><i class="fa fa-check-square" aria-hidden="true"></i>&nbsp; Mis Cotizaciones Aceptadas</h2>
                    </div>
                        <div class="panel-body">
                            @if(COUNT($cotizaciones_aceptadas) > 0) 
                            <div class="table-responsive" id="lista-cotizaciones-aceptadas">
                              @include('cotizacion.aceptadastable')
                            </div>
                            @else
                              <div class="row">
                                    <ul class="list-group">
                                        <li class="list-group-item active"><i class="fa fa-lock" aria-hidden="true"></i>&nbsp;Cotizaciones Aceptadas por Confirmar Trabajo&nbsp;<span class="badge">0</span></li>
                                        <li class="list-group-item">
                                            <center>
                                                <img src="/images/cero.png" title="Cero Cotizaciones"  class="img img-responsive">
                                                <p class="color-azul cuenta-usuario-row"><b>No tiene Cotizaciones Aceptadas por Confirmar Trabajo.</b></p>
                                                <p class="color-azul cuenta-usuario-row">Cuando Un cliente contrate su servicio estás aparecerán aquí.</p>
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
                            <textarea style="background-color:white;" id="descripcion_comentario" name="descripcion_comentario" placeholder="Escribir Comentario" class="form-control" rows="10"></textarea>
                             <span  id ="ErrorMensaje-descripcion_comentario" class="help-block"></span>
                            <label class="color-azul" style="display:none;">Costo Aproximado</label>
                            <input type="number" step="0.01" name="costo"  id="costo" value="1.00" style="display:none;" required/>
                            <span  id ="ErrorMensaje-costo" class="help-block"></span>
                            {{-- <label class="color-azul" style="font-weigth: 300;">Fecha Vigencia</label>
                            <input type="date" name="fecha_vigencia_maxima" step="1" min="2017-01-01" max="2013-12-31" value="2013-01-01">
                             <span  id ="ErrorMensaje-fecha_vigencia_maxima" class="help-block"></span> --}}
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
  </div>
@else
<div class="container">
  <div class="row">
        <h1 class="text-center color-azul"><i class="fa fa-list" aria-hidden="true"></i>&nbsp;Listado de Cotizaciones&nbsp;<i class="fa fa-list" aria-hidden="true"></i></h1>
        <ul class="list-group">
            <li class="list-group-item active"><i class="fa fa-lock" aria-hidden="true"></i>&nbsp;Cotizaciones&nbsp;<span class="badge">0</span></li>
            <li class="list-group-item">
                <center>
                    <img src="/images/cero.png" title="Cero Cotizaciones" class="img img-responsive">
                    <p class="color-azul cuenta-usuario-row"><b>No tiene Cotizaciones Asignadas</b></p>
                    <p class="color-azul cuenta-usuario-row">Cuando se registre una Cotización; referente al servicio que brinda aparecerá aquí.</p>
                </center>
            </li>
        </ul>

    </div>
</div>



@endif
  
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
     $(document).on('click', '.pagination a',function(event)
    {
        $('#list-cotizaciones li').removeClass('active');
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

    $('#descripcion_comentario').on("keypress",function (){
        $("#ErrorMensaje-descripcion_comentario").hide();
      })
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
                  row = "<div class='row'><div class='col-xs-12'><div class='media'><div class='media-left'><span class='text-center'><i class='fa fa-user-circle-o fa-3x' style='color: #ec971f;' aria-hidden='true'></i></span></div><div class='media-body'><p class='media-heading comentario-usuarios-row'><small class='color-azul'>" + respuesta[index].usuario  + " / " + respuesta[index].email + " / " + respuesta[index].celular + "</small></p><p class='media-heading  comentario-usuarios-row'><small>" + respuesta[index].fecha_registro + " / " + respuesta[index].costo  +  " / " + respuesta[index].fecha_vigencia_maxima + "</small></p><p class='media-heading descripcion-comentario'><i class='fa fa-quote-left' aria-hidden='true'></i>&nbsp;<small>" + respuesta[index].descripcion_comentario+"&nbsp;<i class='fa fa-quote-right' aria-hidden='true'></i></small></p><div class='row'></div><div class='row'></div></div></div>";
                    
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
</script>
@endsection

