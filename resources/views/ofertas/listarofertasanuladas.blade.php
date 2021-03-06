@extends('app')
 
@section('content-proveedores')
@if(COUNT($ofertasanuladas) > 0)
<br>
<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <h1 class="text-center color-azul"><i class="fa fa-list" aria-hidden="true"></i>&nbsp; Listado de Ofertas Anuladas&nbsp; <i class="fa fa-list" aria-hidden="true"></i></h1>
            <ul class="nav nav-pills">
                <li class="active"><a data-toggle="pill" href="#home"><i class="fa fa-list" aria-hidden="true"></i>&nbsp;Anuladas</a></li>
            </ul>
          
            
              

            <div class="tab-content">
             
               <div id="home" class="tab-pane fade in active">
                <div class="panel panel-default">

                  <div class="panel-heading fondo-naranja-oscuro color-blanco">
                      <h2 class="panel-title text-center" style="font-weight:bold;"><i class="fa fa-list" aria-hidden="true"></i>&nbsp; Ofertas Anuladas</h2>
                  </div>
                      <div class="panel-body">
                           
                         <div class="table-responsive" id="lista-anuladas">
                            @include('ofertas.anuladas-table')
                         </div>              

                      </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
@else
<div class="container">
  <div class="row">
        <h1 class="text-center color-azul"><i class="fa fa-list" aria-hidden="true"></i>&nbsp;Listado de Ofertas Anuladas&nbsp;<i class="fa fa-list" aria-hidden="true"></i></h1>
        <ul class="list-group">
            <li class="list-group-item active"><i class="fa fa-lock" aria-hidden="true"></i>&nbsp;Lista de Ofertas Anuladas&nbsp;<span class="badge">0</span></li>
            <li class="list-group-item">
                <center>
                    <img src="/images/cero.png" title="Cero Ofertas Anuladas" class="img img-responsive">
                    <p class="color-azul cuenta-usuario-row"><b>No tiene Ofertas Anuladas</b></p>
                    <p class="color-azul cuenta-usuario-row">Cuando Ud. Anule Ofertas estas aparecerán aquí.</p>
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
        $('li').removeClass('active');
        $(this).parent('li').addClass('active');
        event.preventDefault();
        var myurl = $(this).attr('href');
       var page=$(this).attr('href').split('page=')[1];
       getData(page);
    });
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
            console.log(data);
            
            $("#lista-anuladas").empty().html(data);

            //location.hash = page;
        })
        .fail(function(jqXHR, ajaxOptions, thrownError)
        {
              alert('No response from server');
        });
}
</script>
}
@endsection

