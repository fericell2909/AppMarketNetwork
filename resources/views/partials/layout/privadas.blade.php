

@if(isset($ofertasprivadas))

@if(COUNT($ofertasprivadas) > 0)
<div class="container">
<div class="row">
	{{-- <h2>Nuestras Principales Ofertas</h2> <small><a href="" class="btn-ver-ofertas">ver más...</a></small> --}}
    <h2 class="color-azul">Ofertas Exclusivas para ti : {{Auth::user()->Nombres}}</h2>
    <div id="products" class="row list-group">    
    	@foreach($ofertasprivadas as $ofertasprivada)    
	        <article class="item  col-xs-12 col-sm-4 col-lg-3">
	            <div class="thumbnail oferta">
	                <a href="{{route('Ofertas/OfertaCliente',['id' => $ofertasprivada->id])}}"><img class="group list-group-image imagen-oferta" src="{{$ofertasprivada->ruta_imagen_oferta}}" alt="Imagen de Oferta" /></a>
	                <div class="caption">
	                    <a href="{{route('Ofertas/OfertaCliente',['id' => $ofertasprivada->id])}}" title="{{$ofertasprivada->titulo_oferta}}">
	                        <p class="group inner list-group-item-heading titulo-oferta-item">
	                        	{{$ofertasprivada->titulo_oferta}}
	                        </p>
	                    </a>
	                    <div class="row">
	                        <div class="col-xs-6 text-center">
	                            <p class="cuenta-usuario-row"><label>Precio Real</label></p>
	                            <p  class="cuenta-usuario-row precio-normal" ><s>{{$ofertasprivada->precio_real}}</s></p>
	                        </div>
	                        <div class="col-xs-6 text-center">
	                            <p class="cuenta-usuario-row"><label>Precio Oferta</label></p>
	                            <p  class="cuenta-usuario-row precio-oferta" > {{$ofertasprivada->precio_oferta}}</p>
	                        </div>
	                        <div class="col-xs-12">
	                            <center><a class="btn btn-principal" href="{{route('Ofertas/OfertaCliente',['id' => $ofertasprivada->id])}}"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp; Ver Oferta</a></center>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </article>
		@endforeach
	</div>
</div>
</div>
@endif
@endif