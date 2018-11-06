@foreach($proveedores as $proveedor)
					<div class="row">                      
                        <div class="col-xs-12">
                          <div class="media">
                            <div class="row">
                              <div class="col-xs-2">
                                <div class="text-center"><center>
									<img src="/images/edificio.jpg" class="img-responsive" alt="Imagen Generica" style="margin-top:5px; background: #f5f5f5;
					    			border: 5px solid #e4e4e4;
					    			box-sizing: border-box;
					    			box-shadow: 0 20px 8px -15px #e4e4e4;">
								</center>
                                </div>
                              </div>
                              <div class="col-xs-10">
                                <p class="media-heading comentario-usuarios-row">
                                <h3 style="margin:0;"><a href="{{route('Public/Proveedor',[ 'id' => $proveedor->id])}}" title="Ver Datos de Proveedor" role="button">{{$proveedor->prov_razon_social }}</a></h3>
                                </p>
                                <p class="media-heading comentario-usuarios-row">
	                                 @if($proveedor->ratio == 0)
					                  <i class="fa fa-star fa-2x" style = "color: #ddd"></i>
					                  <i class="fa fa-star fa-2x" style = "color: #ddd"></i>
					                  <i class="fa fa-star fa-2x" style = "color: #ddd;"></i>
					                  <i class="fa fa-star fa-2x" style = "color: #ddd"></i>
					                  <i class="fa fa-star fa-2x" style = "color: #ddd;"></i>
					                  <h4  style="margin-top: 0;margin-bottom:0;">No Posee <strong class="color-azul">Calificación</strong> actualmente</h4>
					                @endif

					                @if($proveedor->ratio == 1)
					                  <i class="fa fa-star fa-2x" style = "color: green"></i>
					                  <i class="fa fa-star fa-2x" style = "color: #ddd"></i>
					                  <i class="fa fa-star fa-2x" style = "color: #ddd"></i>
					                  <i class="fa fa-star fa-2x" style = "color: #ddd"></i>
					                  <i class="fa fa-star fa-2x" style = "color: #ddd;"></i>
					                  <h4  style="margin-top: 0;margin-bottom:0;">Su <strong class="color-azul">Calificación</strong> es de <strong><span style="color:green">Una Estrella</span></strong> actualmente</h4>
					                @endif

					                @if($proveedor->ratio == 2)
					                  <i class="fa fa-star fa-2x" style = "color: green"></i>
					                  <i class="fa fa-star fa-2x" style = "color: green"></i>
					                  <i class="fa fa-star fa-2x" style = "color: #ddd"></i>
					                  <i class="fa fa-star fa-2x" style = "color: #ddd"></i>
					                  <i class="fa fa-star" style = "color: #ddd;"></i>
					                  <h4  style="margin-top: 0;margin-bottom:0;">Su <strong class="color-azul">Calificación</strong> es de <strong><span style="color:green">2 Estrellas</span></strong> actualmente</h4>
					                @endif


					                @if($proveedor->ratio == 3)
					                  <i class="fa fa-star fa-2x" style = "color: green"></i>
					                  <i class="fa fa-star fa-2x" style = "color: green"></i>
					                  <i class="fa fa-star fa-2x" style = "color: green"></i>
					                  <i class="fa fa-star fa-2x" style = "color: #ddd"></i>
					                  <i class="fa fa-star fa-2x" style = "color: #ddd;"></i>
					                  <h4 style="margin-top: 0;margin-bottom:0;">Su <strong class="color-azul">Calificación</strong> es de <strong><span style="color:green">3 Estrellas</span></strong> actualmente</h4>
					                @endif

					                @if($proveedor->ratio == 4)
					                  <i class="fa fa-star fa-2x" style = "color: green"></i>
					                  <i class="fa fa-star fa-2x" style = "color: green"></i>
					                  <i class="fa fa-star fa-2x" style = "color: green"></i>
					                  <i class="fa fa-star fa-2x" style = "color: green"></i>
					                  <i class="fa fa-star fa-2x" style = "color: #ddd;"></i>
					                  <h4 style="margin-top: 0;margin-bottom:0;">Su <strong class="color-azul">Calificación</strong> es de <strong><span style="color:green">4 Estrellas</span></strong> actualmente</h4>
					                @endif

					                @if($proveedor->ratio == 5)
					                  <i class="fa fa-star fa-2x" style = "color: green"></i>
					                  <i class="fa fa-star fa-2x" style = "color: green"></i>
					                  <i class="fa fa-star fa-2x" style = "color: green"></i>
					                  <i class="fa fa-star fa-2x" style = "color: green"></i>
					                  <i class="fa fa-star fa-2x" style = "color: green;"></i>
					                  <h4 style="margin-top: 0;margin-bottom:0;">Su <strong class="color-azul">Calificación</strong> es de <strong><span style="color:green">5 Estrellas</span></strong> actualmente</h4>
					                @endif
                                </p>

                              {{-- <p class="media-heading  comentario-usuarios-row"><small class="color-azul">{{$comentario->fecha_encuesta}}</small></p> --}}

                              <p class="media-heading descripcion-comentario"><i class="fa fa-quote-left color-azul" aria-hidden="true"></i>&nbsp;<small class="color-azul">{{$proveedor->prov_descripcion}}&nbsp;<i class="fa fa-quote-right" aria-hidden="true"></i></small></p>    
                              </div>
                            </div>

                            <div class="media-body" style="display:none;">

                            </div>
                          </div>
                        </div>
                      </div>
@endforeach
{!!$proveedores->render()!!}