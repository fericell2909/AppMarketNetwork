@extends('app')
 
@section('content-miembros')

@if(Auth::user()->nTotalItemCarritoCompra > 0)
	<div class="container">
    <div class="row">
            <div class="col-xs-12 col-sm-12">
                    <h1 class="text-center color-azul"><i class="fa fa-shopping-cart fa" aria-hidden="true"></i>&nbsp;Carrito de Compra&nbsp;<i class="fa fa-shopping-cart" aria-hidden="true"></i></h1>
                    

                   {{--  {!! Form::open(['route' => 'payment', 'class' => 'form','method' => 'POST','id'=> 'CarroCompraForm']) !!} --}}

                     {!! Form::open(['route' => 'CarroCompra/Revisar', 'class' => 'form','method' => 'POST','id'=> 'CarroCompraForm']) !!}

                    <ul class="list-group" id="Carrito">
                        <li  class="list-group-item active"><i class="fa fa-shopping-cart color-blanco" aria-hidden="true"></i>&nbsp;Carrito de Compra&nbsp;<span class="badge">{{Auth::user()->nTotalItemCarritoCompra}}</span></li>
                        <li  class="list-group-item">
                             <div class="table-responsive">
                                 @include('carrocompra.item-table')
                             </div>
                        </li>
                    </ul>
                    <ul class="list-group">
						<li class="list-group-item active"><i class="fa fa-lock" aria-hidden="true"></i> Pago seguro cifrado SSL de 128 bits.</li>
						<li class="list-group-item"  style= "display:none;"><button id="btnPagarPaypal" type="submit" class="btn"><img src="/images/btn_xpressCheckout.png"> </button><span class="color-azul">&nbsp;<b>Pagar con Paypal<b></span></li>
                        <li class="list-group-item"><button id="btnPagarOrdenCompra" type="submit" class="btn btn-principal btnPagarOrdenCompra">Realizar Pago</button></li>
                         <img src="/images/loading.gif" alt="" id="gifloading" style ="display:none;">
					</ul>

                     {!! Form::close() !!}
            </div>      
     </div>		    	
</div>

@else
<div class="container">
	<div class="row">
        <h1 class="text-center color-azul"><i class="fa fa-shopping-cart fa" aria-hidden="true"></i>&nbsp;Carrito de Compra&nbsp;<i class="fa fa-shopping-cart" aria-hidden="true"></i></h1>
        <ul class="list-group">
            <li class="list-group-item active"><i class="fa fa-lock" aria-hidden="true"></i>&nbsp;Ofertas en el Carrito de Compra&nbsp;<span class="badge">0</span></li>
            <li class="list-group-item">
                <center>
                    <img src="/images/carrito.png" title="Carrito de Compra">
                    <p class="color-azul cuenta-usuario-row"><b>No tiene Ofertas en su carrito de compras.</b></p>
                    <p class="color-azul cuenta-usuario-row">Cuando agregue ofertas a su carrito, aparecerán aquí para completar su compra.</p>
                </center>
            </li>
            <li class="list-group-item">
                @include('partials.layout.publicas')
            </li>
        </ul>

    </div>
</div>
@endif



@endsection
@section('scripts')
<script type="text/javascript">
$(document).ready(function()
{

    

    $(document).on("click",".btnPagarOrdenCompra",function(){

        var total =  $('#CantidadTotalCarrito').text();

        if (parseInt(total) <= 0 ) {
            
            
            $("#ErrorMensaje-total-comprar").text('El Total a comprar no puede ser cero.');
            $("#ErrorMensaje-total-comprar").show();
            return false;
        }

       var coincidencias = document.querySelectorAll(".clsfechaatencion");
                coincidencias = [].slice.call(coincidencias);

        var Hoy = new Date().toJSON().slice(0,10)

        $.each(coincidencias, function( index, value ) {

                    if (coincidencias[index].value < Hoy) {
                        coincidencias = null;
                        $("#ErrorMensaje-total-comprar").text('La Fecha de Atencion no puede ser menor que la fecha del dia');
                        $("#ErrorMensaje-total-comprar").show();
                        return false;
                    };

                });

        var cantidadfilacarrito = document.querySelectorAll(".cantidadfilacarrito");
                cantidadfilacarrito = [].slice.call(cantidadfilacarrito);


          $.each(cantidadfilacarrito, function( index, value ) {

                    if (parseInt(cantidadfilacarrito[index].value) <= 0) {
                        cantidadfilacarrito = null;
                        $("#ErrorMensaje-total-comprar").text('La Cantidad No puede ser cero.');
                        $("#ErrorMensaje-total-comprar").show();
                        return false;
                    };

                });

          $("#gifloading").show();

        //return false;

      //   var fecha_atencion = $('#fecha_atencion').val().trim();

      // if( fecha_atencion == null || fecha_atencion.length == 0  || fecha_atencion == undefined ) {
      //     fecha_atencion = null;
      // $("#ErrorMensaje-fecha_atencion").text('La Fecha de Atencion no puede ser vacio.');
      //   $("#ErrorMensaje-fecha_atencion").show();
      //   $("#fecha_atencion").focus();
      //   return false;
      // }

      // if ( fecha_inicio >= fecha_termino)
      // {
      //   $("#ErrorMensaje-fecha_inicio").text('La Fecha de Inicio no puede ser mayor o igual que la Fecha de Termino de Oferta.');
      //   $("#ErrorMensaje-fecha_inicio").show();
      //   $("#fecha_inicio").focus();
      //   return false;

      // }

      //   var Hoy = new Date().toJSON().slice(0,10)

      // if ( fecha_inicio < Hoy)
      // {
      //   $("#ErrorMensaje-fecha_inicio").text('La Fecha de Inicio no puede ser menor que la fecha del dia.');
      //   $("#ErrorMensaje-fecha_inicio").show();
      //   $("#fecha_inicio").focus();
      //   return false;

      // }

     });

});    

</script>

    

@endsection