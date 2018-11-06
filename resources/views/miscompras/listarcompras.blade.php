@extends('app')
 
@section('content-miembros')
<br>
<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <h1 class="text-center color-azul"><i class="fa fa-money" aria-hidden="true"></i>&nbsp; Listado de Mis Compras&nbsp; <i class="fa fa-money" aria-hidden="true"></i></h1>
            <ul class="nav nav-pills">
                <li class="active"><a data-toggle="pill" href="#atencion"><i class="fa fa-list" aria-hidden="true"></i>&nbsp;Compras En Atencion</a></li>
            </ul>
          
          <div class="tab-content">
           
             <div id="atencion" class="tab-pane fade in active">
                <div class="panel panel-default">

                  <div class="panel-heading fondo-naranja-oscuro color-blanco">
                    <h2 class="panel-title text-center" style="font-weight:bold;">
                        <i class="fa fa-list" aria-hidden="true"></i>
                        &nbsp; Lista de Compras en Atención&nbsp; <i class="fa fa-list" aria-hidden="true"></i>
                    </h2>
                  </div>
                      <div class="panel-body">

                        @if(COUNT($compras_atenciones) > 0) 
                          <div class="table-responsive" id="lista-atencion">
                            @include('miscompras.compras-atencion-table')
                          </div> 
                        @else 
                          {{-- <ul class="list-group">
                            <li class="list-group-item active"><i class="fa fa-lock" aria-hidden="true"></i>&nbsp;Compras en Atención&nbsp;<span class="badge">0</span></li>
                            <li class="list-group-item"> --}}
                                <center>
                                    <img src="/images/cero.png" title="0 Compras" style="width:80px;heigth:80px;">
                                    <p class="color-azul cuenta-usuario-row"><b>No posee ninguna compra en estado de atención.</b></p>
                                    <p class="color-azul cuenta-usuario-row">Cuando Realize Compras y se encuentren en Estado de Atención; éstas aparecerán aquí.</p>
                                </center>
                           {{--  </li> --}}
                          {{-- </ul> --}}
                        @endif 
                      </div>
                </div>
             </div>
          </div>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-xs-12">
            <ul class="nav nav-pills">
                <li class="active"><a data-toggle="pill" href="#atencion"><i class="fa fa-list" aria-hidden="true"></i>&nbsp;Compras en Registro de Encuesta</a></li>
            </ul>
          
          <div class="tab-content">
           
             <div id="atencion" class="tab-pane fade in active">
                <div class="panel panel-default">

                  <div class="panel-heading fondo-naranja-oscuro color-blanco">
                    <h2 class="panel-title text-center" style="font-weight:bold;">
                        <i class="fa fa-list" aria-hidden="true"></i>
                        &nbsp; Lista de Compras en Registro de Encuesta &nbsp; <i class="fa fa-list" aria-hidden="true"></i>
                    </h2>
                  </div>
                      <div class="panel-body">

                        @if(COUNT($compras_encuestas) > 0) 
                          <div class="table-responsive" id="lista-registro">
                            @include('miscompras.compras-encuesta-table')
                          </div> 
                        @else 
                          {{-- <ul class="list-group">
                            <li class="list-group-item active"><i class="fa fa-lock" aria-hidden="true"></i>&nbsp;Compras Cerrdas&nbsp;<span class="badge">0</span></li>
                            <li class="list-group-item"> --}}
                                <center>
                                    <img src="/images/cero.png" title="Carrito de Compra" style="width:80px;heigth:80px;">
                                    <p class="color-azul cuenta-usuario-row"><b>No posee ninguna compra para registrar su encuesta de satisfacción al cliente.</b></p>
                                    <p class="color-azul cuenta-usuario-row">Cuando Realize Compras y se encuentren en el Estado de Registro de Encuesta ; éstas aparecerán aquí.</p>
                                </center>
                            {{-- </li>
                          </ul> --}}
                        @endif 
                      </div>
                </div>
             </div>
          </div>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-xs-12">
            <ul class="nav nav-pills">
                <li class="active"><a data-toggle="pill" href="#atencion"><i class="fa fa-list" aria-hidden="true"></i>&nbsp;Compras Cerradas</a></li>
            </ul>
          
          <div class="tab-content">
           
             <div id="atencion" class="tab-pane fade in active">
                <div class="panel panel-default">

                  <div class="panel-heading fondo-naranja-oscuro color-blanco">
                    <h2 class="panel-title text-center" style="font-weight:bold;">
                        <i class="fa fa-list" aria-hidden="true"></i>
                        &nbsp; Lista de Compras Cerradas &nbsp; <i class="fa fa-list" aria-hidden="true"></i>
                    </h2>
                  </div>
                      <div class="panel-body">

                        @if(COUNT($compras_cerradas) > 0) 
                          <div class="table-responsive" id="lista-cerrada">
                            @include('miscompras.compras-cerradas-table')
                          </div> 
                        @else 
                          {{-- <ul class="list-group">
                            <li class="list-group-item active"><i class="fa fa-lock" aria-hidden="true"></i>&nbsp;Compras Cerrdas&nbsp;<span class="badge">0</span></li>
                            <li class="list-group-item"> --}}
                                <center>
                                    <img src="/images/cero.png" title="Carrito de Compra" style="width:80px;heigth:80px;">
                                    <p class="color-azul cuenta-usuario-row"><b>No posee ninguna compra en estado cerrado.</b></p>
                                    <p class="color-azul cuenta-usuario-row">Cuando Realize Compras y se encuentren en Estado Cerrado; éstas aparecerán aquí.</p>
                                </center>
                            {{-- </li>
                          </ul> --}}
                        @endif 
                      </div>
                </div>
             </div>
          </div>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-xs-12">
            <ul class="nav nav-pills">
                <li class="active"><a data-toggle="pill" href="#atencion"><i class="fa fa-list" aria-hidden="true"></i>&nbsp;Compras Anuladas</a></li>
            </ul>
          
          <div class="tab-content">
           
             <div id="atencion" class="tab-pane fade in active">
                <div class="panel panel-default">

                  <div class="panel-heading fondo-naranja-oscuro color-blanco">
                    <h2 class="panel-title text-center" style="font-weight:bold;">
                        <i class="fa fa-list" aria-hidden="true"></i>
                        &nbsp; Lista de Compras Anuladas &nbsp; <i class="fa fa-list" aria-hidden="true"></i>
                    </h2>
                  </div>
                      <div class="panel-body">

                        @if(COUNT($compras_anuladas) > 0) 
                          <div class="table-responsive" id="lista-anulada">
                            @include('miscompras.compras-anuladas-table')
                          </div> 
                        @else 
                          {{-- <ul class="list-group">
                            <li class="list-group-item active"><i class="fa fa-lock" aria-hidden="true"></i>&nbsp;Compras Cerrdas&nbsp;<span class="badge">0</span></li>
                            <li class="list-group-item"> --}}
                                <center>
                                    <img src="/images/cero.png" title="Carrito de Compra" style="width:80px;heigth:80px;">
                                    <p class="color-azul cuenta-usuario-row"><b>No posee ninguna compra en Estado Anulado.</b></p>
                                    <p class="color-azul cuenta-usuario-row">Cuando Realize Compras y se encuentren en Estado Anulado; éstas aparecerán aquí.</p>
                                </center>
                            {{-- </li>
                          </ul> --}}
                        @endif 
                      </div>
                </div>
             </div>
          </div>
      </div>
    </div>
  </div>
</div>
@endsection
{{-- $compras_encuestas;
        $compras_cerradas;
        $compras_anuladas;
                       <div class="table-responsive" id="lista-encuesta">
                          @include('miscompras.compras-encuesta-table')
                       </div>
                        <div class="table-responsive" id="lista-cerradas">
                          @include('miscompras.compras-cerradas-table')
                       </div>  
                        <div class="table-responsive" id="lista-anuladas">
                          @include('miscompras.compras-anuladas-table')
                       </div>  --}}
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
    //   $(document).on('click', '.pagination a',function(event)
    // { 

    //     alert('hizo click');

    //     $('#tbl-cerradas li').removeClass('active');
    //     $(this).parent('li').addClass('active');
    //     event.preventDefault();
    //     var myurl = $(this).attr('href');
    //    var page=$(this).attr('href').split('page=')[1];
    //    //alert(page);
    //    getData(page);
    // });

      $(document).on('click','#lista-atencion .pagination a',function(event)
      { 

        //alert('hizo click Lista de Atencion');

         $('#lista-atencion li').removeClass('active');
         $(this).parent('li').addClass('active');
         event.preventDefault();
         var myurl = $(this).attr('href');
        var page=$(this).attr('href').split('page=')[1];
       //alert(page);
       getDataEnAtencion(page);
    });

      $(document).on('click','#lista-cerrada .pagination a',function(event)
      { 

        //alert('hizo click Lista de Atencion');

         $('#lista-cerrada li').removeClass('active');
         $(this).parent('li').addClass('active');
         event.preventDefault();
         var myurl = $(this).attr('href');
        var page=$(this).attr('href').split('page=')[1];
       //alert(page);
       getDataCerrado(page);
    });

      $(document).on('click','#lista-anulada .pagination a',function(event)
      { 

        //alert('hizo click Lista de Atencion');

         $('#lista-anulada li').removeClass('active');
         $(this).parent('li').addClass('active');
         event.preventDefault();
         var myurl = $(this).attr('href');
        var page=$(this).attr('href').split('page=')[1];
       //alert(page);
       getDataAnulado(page);
    });

      $(document).on('click','#lista-registro .pagination a',function(event)
      { 

        //alert('hizo click Lista de Atencion');

         $('#lista-registro li').removeClass('active');
         $(this).parent('li').addClass('active');
         event.preventDefault();
         var myurl = $(this).attr('href');
        var page=$(this).attr('href').split('page=')[1];
       //alert(page);
       getDataRegistroEncuesta(page);
    });



});

function getDataEnAtencion(page){
// 1 REGISTRO
// 2 EN ATENCION
// 3 CERRADO
// 4 ANULADO
// 5 REGISTRO ENCUESTA

    $.ajax(
        {
            url: '?page=' + page,
            type: "get",
            data : "tipo=2",
            datatype: "html",
            // beforeSend: function()
            // {
            //     you can show your loader 
            // }
        })
        .done(function(data)
        {
            console.log(data);
            
            $("#lista-atencion").empty().html(data);

            //location.hash = page;
        })
        .fail(function(jqXHR, ajaxOptions, thrownError)
        {
              alert('No response from server');
        });



}

function getDataAnulado(page){
// 1 REGISTRO
// 2 EN ATENCION
// 3 CERRADO
// 4 ANULADO
// 5 REGISTRO ENCUESTA

    $.ajax(
        {
            url: '?page=' + page,
            type: "get",
            data : "tipo=4",
            datatype: "html",
            // beforeSend: function()
            // {
            //     you can show your loader 
            // }
        })
        .done(function(data)
        {
            console.log(data);
            
            $("#lista-cerrada").empty().html(data);

            //location.hash = page;
        })
        .fail(function(jqXHR, ajaxOptions, thrownError)
        {
              alert('No response from server');
        });

}

function getDataRegistroEncuesta(page){
// 1 REGISTRO
// 2 EN ATENCION
// 3 CERRADO
// 4 ANULADO
// 5 REGISTRO ENCUESTA

    $.ajax(
        {
            url: '?page=' + page,
            type: "get",
            data : "tipo=5",
            datatype: "html",
            // beforeSend: function()
            // {
            //     you can show your loader 
            // }
        })
        .done(function(data)
        {
            console.log(data);
            
            $("#lista-cerrada").empty().html(data);

            //location.hash = page;
        })
        .fail(function(jqXHR, ajaxOptions, thrownError)
        {
              alert('No response from server');
        });

}



function getDataCerrado(page){
// 1 REGISTRO
// 2 EN ATENCION
// 3 CERRADO
// 4 ANULADO
// 5 REGISTRO ENCUESTA

    $.ajax(
        {
            url: '?page=' + page,
            type: "get",
            data : "tipo=3",
            datatype: "html",
            // beforeSend: function()
            // {
            //     you can show your loader 
            // }
        })
        .done(function(data)
        {
            console.log(data);
            
            $("#lista-cerrada").empty().html(data);

            //location.hash = page;
        })
        .fail(function(jqXHR, ajaxOptions, thrownError)
        {
              alert('No response from server');
        });

}
</script>
@endsection

