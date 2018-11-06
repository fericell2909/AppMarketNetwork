<div class="row">
@foreach($ofertas as $ofertaspublica)
     <article class="item  col-xs-12 col-sm-4 col-lg-3">
              <div class="thumbnail oferta">
                  <a href="{{route('Ofertas/OfertaCliente',['id' => $ofertaspublica->id])}}"><img class="group list-group-image imagen-oferta" src="{{$ofertaspublica->ruta_imagen_oferta}}" alt="Imagen de Oferta" /></a>
                  <div class="caption">
                      <a href="{{route('Ofertas/OfertaCliente',['id' => $ofertaspublica->id])}}" title="{{$ofertaspublica->titulo_oferta}}">
                          <p class="group inner list-group-item-heading titulo-oferta-item">
                            {{$ofertaspublica->titulo_oferta}}
                          </p>
                      </a>
                      <div class="row">
                          <div class="col-xs-6 text-center">
                              <p class="cuenta-usuario-row"><label>Precio Real</label></p>
                              <p  class="cuenta-usuario-row precio-normal" ><s>{{$ofertaspublica->precio_real}}</s></p>
                          </div>
                          <div class="col-xs-6 text-center">
                              <p class="cuenta-usuario-row"><label>Precio Oferta</label></p>
                              <p  class="cuenta-usuario-row precio-oferta" > {{$ofertaspublica->precio_oferta}}</p>
                          </div>
                          <div class="col-xs-12">
                              <center><a class="btn btn-principal" href="{{route('Ofertas/OfertaCliente',['id' => $ofertaspublica->id])}}"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp; Ver Oferta</a></center>
                          </div>
                      </div>
                  </div>
              </div>
          </article>               
@endforeach
</div>
{!!$ofertas->render()!!}