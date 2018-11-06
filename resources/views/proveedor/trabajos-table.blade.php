<div class="row">
@foreach($trabajos as $trabajo)
     <article class="item  col-xs-12 col-sm-4 col-lg-3">
              <div class="thumbnail oferta">
                  <a href="{{route('proveedores/vertrabajoscliente',['id' => $trabajo->id])}}"><img class="group list-group-image imagen-oferta" src="{{$trabajo->cRutaImagenProyecto}}" alt="Imagen de proyecto" /></a>
                  <div class="caption">
                      <a href="{{route('proveedores/vertrabajoscliente',['id' => $trabajo->id])}}" title="{{$trabajo->titulo_proyecto}}">
                          <p class="group inner list-group-item-heading titulo-oferta-item">
                            {{$trabajo->titulo_proyecto}}
                          </p>
                      </a>
                      <div class="row">
                          <div class="col-xs-6 text-center">
                              <p class="cuenta-usuario-row"><label>Mes</label></p>
                              <p  class="cuenta-usuario-row precio-oferta" >{{$trabajo->nombre_mes}}</p>
                          </div>
                          <div class="col-xs-6 text-center">
                              <p class="cuenta-usuario-row"><label>Año</label></p>
                              <p  class="cuenta-usuario-row precio-oferta" > {{$trabajo->nombre_anio}}</p>
                          </div>
                          <div class="col-xs-12">
                              <center><a class="btn btn-principal" href="{{route('proveedores/vertrabajoscliente',['id' => $trabajo->id])}}"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp; Ver Trabajo</a></center>
                          </div>
                      </div>
                  </div>
              </div>
          </article>               
@endforeach
</div>
{!!$trabajos->render()!!}