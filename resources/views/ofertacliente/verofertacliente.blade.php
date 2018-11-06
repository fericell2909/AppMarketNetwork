
@extends('app')
@section('content-miembros')
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="row">
				<div class="col-sm-8">
					<div class="offer_info">
						<div class="offer_main-info">
							<div class="row">
								<div class="clearfix">
									<div class="col-sm-10 col-xs-11 col-xs-offset-1">
										<div class="offer_title"><span style="color:#29a036;display:none;">{{$ofertas[0]->precio_oferta}}</span><span style="color:#337ab7;">&nbsp;{{$ofertas[0]->titulo_oferta}}</span>
										</div>
										<div class="offer_sp">
											<span  >Ofertado por:</span><a href="{{route('Public/Proveedor',[ 'id' => $ofertas[0]->user_id])}}" title="Ver Datos de Proveedor">{{$ofertas[0]->prov_razon_social}}</a>
											<a class="offer_see-reviews btn btn-link" type="button" href="#ComentariosRecientes">
												<span>Ver Comentarios</span>
											</a>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6 col-xs-12 text-center">
									<div class="offer_image">
										<center><img src="{{$ofertas[0]->ruta_imagen_oferta}}" alt="Imagen de Oferta" class="img img-responsive imagen-oferta"></center>
									</div>
								</div>
								<div class="col-sm-6 col-xs-12 text-center">
									<div class="offer_price">
										<div class="row">
											<div class="col-xs-12">
												<div class="precio-oferta">
													<span class="color-azul">Precio Oferta:</span>
													<span>{{$ofertas[0]->precio_oferta}}</span>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-xs-12">
												<div class="offer_price-info">
													<div class="precio-normal">
														<span class="color-azul">Precio Real:</span>
														<s><span>{{$ofertas[0]->precio_real}}</span></s>
													</div>
													<div class="precio-normal">
														<span class="color-azul">Descuento: </span>
														<span class="">{{$ofertas[0]->descuento}}</span>
													</div>
													<div class="clearfix">
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-xs-12">
												<div class="offer_price-info">
													<div class="precio-normal">
														<span class="color-azul">Fecha Inicio:</span>
														<span>{{$ofertas[0]->fecha_inicio}}</span>
													</div>
													<div class="precio-normal">
														<span class="color-azul">Fecha Término: </span>
														<span class="">{{$ofertas[0]->fecha_termino}}</span>
													</div>
													<div class="clearfix">
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-xs-12">
												<div class="offer_price-info">
													<div class="precio-normal">
														<span class="color-azul">Moneda:</span>
														<span>{{$ofertas[0]->descripcion_moneda}}</span>
													</div>
													<div class="clearfix">
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-xs-12">
												<a href="{{route('CarroCompra/Agregar',['id' => $ofertas[0]->id])}}" class="btn btn-principal btn-block">
													<center><span>Contratar Ahora</span></center>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-4 text-center">
					<div class="sidebar">
						<div class="offer-grades">
							<div class="offer-grades-header">
								<center><img class="img img-responsive" src="/images/imagen.png" style="height:200px;" alt="icono de Garantia" /></center>
								<h3 class="offer-grades-sp-title"><a href="{{route('Public/Proveedor',[ 'id' => $ofertas[0]->user_id])}}" title="Ver Datos del Proveedor">{{$ofertas[0]->prov_razon_social}}<a/></h3>
								<p class="offer-grades-sp-location">
									<span class="icon icon-location"></span>
									<span></span>
								</p>
							</div>
							<div class="offer-grades-content row">
								<div class="col-md-6 col-sm-6 col-xs-6 text-center">
									<span style="text-align:center !important;">Calificación</span>
									<span class="badge badge-heredado">{{$ofertas[0]->calificacion_oferta}}</span>
								</div>
								<div class="offer-grades-right col-md-6 col-sm-6 col-xs-6">
									<span style="text-align:center !important;">Comentarios</span>
									<span class="badge badge-heredado">{{$ofertas[0]->total_comentarios}}</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-sm-8">
						<div class="row">
							<div class="col-xs-12">
								<div class="offer_details offer_info">
											<ul class="list-group">
												<li  class="list-group-item active"><i class="fa fa-bars" aria-hidden="true"></i>&nbsp;Detalles de la Oferta</li>
												@foreach($ofertasdetalles as $ofertasdetalle)
													<li  class="list-group-item lista-detalle-texto"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;{{$ofertasdetalle->descripcion_detalle}}</li>
												@endforeach
											</ul>
								</div>
							</div>
						</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-8">
						<div class="row">
							<div class="col-xs-12">
								<div class="offer_details offer_info">
											<ul class="list-group">
												<li  class="list-group-item active"><i class="fa fa-bars" aria-hidden="true"></i>&nbsp;Oferta no Incluye</li>
												@foreach($ofertasrestricciones as $ofertasrestriccion)
													<li  class="list-group-item lista-detalle-texto"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;{{$ofertasrestriccion->descripcion_detalle}}</li>
												@endforeach
											</ul>
								</div>
							</div>
						</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-8">
				<div class="row">
					<div class="col-xs-12">
						<div class="offer_details offer_info">
							<ul class="list-group" id="ComentariosRecientes">
								<li  class="list-group-item active">
									<div class="row">
										<div class="col-xs-12 pull-left">
											{{-- <p><i class="fa fa-commenting" aria-hidden="true"></i>&nbsp; <span>Comentarios</span>&nbsp;&nbsp; /&nbsp;&nbsp;</p> --}}
											<a href="{{route('Public/Proveedor',[ 'id' => $ofertas[0]->user_id])}}" class="color-blanco" title="Ver Datos del Proveedor">{{$ofertas[0]->prov_razon_social}}</a>

										</div>
									</div>
								</li>
								@if(COUNT($ofertas_comentarios)>0)
									<li  class="list-group-item">
										
										@foreach($ofertas_comentarios as $oferta_comentario)
											<div class="row">
												<div class="col-xs-12">
													<div class="media">
														<div class="row">
															<div class="col-xs-2">
																<div class="text-center"><span class="text-center"><i class="fa fa-user-circle-o fa-3x" style="color: #ec971f;" aria-hidden="true"></i></span>
																<span class="badge">{{$oferta_comentario->calificacionestrella}}</span>
																</div>
															</div>
															<div class="col-xs-10">
																<p class="media-heading comentario-usuarios-row"><small class="color-azul">{{$oferta_comentario->Nombres . ' / ' .$oferta_comentario->Apellidos . ' / ' .$oferta_comentario->email}}</small>
																<a class="btn btn-default btn-info pull-right"  href="{{route('Encuesta/VerEncuestaClienteDefault', ['id' => $oferta_comentario->id])}}"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp; Ver Encuesta</a>

																</p>
															<p class="media-heading  comentario-usuarios-row"><small>{{$oferta_comentario->fecha_encuesta}}</small></p>
															<p class="media-heading descripcion-comentario"><i class="fa fa-quote-left" aria-hidden="true"></i>&nbsp;<small>{{$oferta_comentario->descripcion_comentario}}&nbsp;<i class="fa fa-quote-right" aria-hidden="true"></i></small></p>		
															</div>
														</div>

														<div class="media-body" style="display:none;">
															
															<div class="row LeerComentarios" style="display:none"><a href="" class="pull-right" class="">Leer Mas&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></div>

															<div   class="ExpandirComentarios row">
																<div class="col-xs-12  col-sm-8 col-sm-offset-2">
																	<ul class="list-group">
																			<li class="list-group-item active">
																			</li>
																			<li class="list-group-item">
																				<span class="badge">{{$oferta_comentario->calificacionestrella}}</span>
																				<strong >Calificación</strong>
																			</li>
																			<li class="list-group-item">
																				<span class="badge">{{$oferta_comentario->puntaje}}</span>
																				<strong >Puntaje</strong>
																			</li>
																			<li class="list-group-item">
																				<span class="badge">{{$oferta_comentario->promedio}}</span>
																				<strong >Ratio</strong>
																			</li>
																	</ul>
																</div>
															</div>
															<div class="row"><a href="" class="pull-right CerrarComentarios" style="display:none;">Cerrar&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></div>
														</div>
													</div>
												</div>
											</div>

										@endforeach	
									</li>
								@else
									<li  class="list-group-item">
										<center>
											<img src="/images/cero.png" title="Cero Comentarios" class="img img-responsive"  style="width:80px;heigth:80px;">
											<p class="color-azul cuenta-usuario-row"><b>La Oferta aún no tiene comentarios</b></p>
											<p class="color-azul cuenta-usuario-row">Cuando los clientes registren sus comentarios estas aparecerán aquí.</p>
										</center>
									</li>
								@endif
							</ul>
						</div>
					</div>
				</div>
		</div>				
	</div>
</div>

@endsection

@section('scripts')
<script>
$(document).ready(function()
{
	// $(".LeerComentarios-").on('click', function(event) {
	// 	var parent = $(this).parents().get(0);
	// 	//var parent2 = $(this).parents().get(2);
	// 	var hermanos = $('.LeerComentarios-').siblings('*');
 //    	//console.log(parent2);
 //    	$(parent).toggle();
 //    	$(hermanos).toogle();
 //    	//$(parent2).toggle();
 //    	//alert(parent);
	// 	//$(".ExpandirComentarios").toggle();
	// 	// $(".LeerComentarios").toggle();
	// 	// $(".CerrarComentarios").toggle();
	// 	event.preventDefault();
	// 	/* Act on the event */
	// });

	// $(".CerrarComentarios").on('click', function(event) {
			
	// 	$(".ExpandirComentarios").toggle();
	// 	$(".LeerComentarios").toggle();
	// 	$(".CerrarComentarios").toggle();
	// 	event.preventDefault();
	// 	/* Act on the event */
	// });

});
</script>
@endsection