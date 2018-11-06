@extends('app')
@section('content-miembros')
<h1 class="color-azul text-center"><i class="fa fa-list" aria-hidden="true"></i>&nbsp; {{$servicios[0]->nombre_servicio}} &nbsp;<i class="fa fa-list" aria-hidden="true"></i>&nbsp;</h1>
<div class="container"> 
<div id="lista-proveedores">
	@include('proveedor.verservicios-table')
</div>
</div>

@endsection

@section('scripts')

<script>

$(document).ready(function()
{

$(document).on('click','#lista-proveedores .pagination a',function(event)
      { 

        //alert('hizo click Lista de Atencion');

         $('#lista-proveedores li').removeClass('active');
         $(this).parent('li').addClass('active');
         event.preventDefault();
         var myurl = $(this).attr('href');
        var page=$(this).attr('href').split('page=')[1];
       //alert(page);
       getDataServicios(page);
    });
});

function getDataServicios(page)
{

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
           // console.log(data);
            
            $("#lista-proveedores").empty().html(data);

            //location.hash = page;
        })
        .fail(function(jqXHR, ajaxOptions, thrownError)
        {
              alert('No response from server');
        });

} 

</script>
@endsection



