@foreach($comentarios as $comentario)
                      <div class="row">
                        <div class="col-xs-12">
                          <div class="media">
                            <div class="row">
                              <div class="col-xs-2">
                                <div class="text-center"><span class="text-center"><i class="fa fa-user-circle-o fa-3x" style="color: #ec971f;" aria-hidden="true"></i></span>
                                <span class="badge">{{$comentario->calificacionestrella}}</span>
                                </div>
                              </div>
                              <div class="col-xs-10">
                                <p class="media-heading comentario-usuarios-row"><small class="color-azul">{{$comentario->Nombres . ' / ' .$comentario->Apellidos . ' / ' .$comentario->email}}</small> <a class="btn btn-default btn-info pull-right"  href="{{route('Encuesta/VerEncuestaClienteDefault', ['id' => $comentario->id])}}"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp; Ver Encuesta</a></p>
                              <p class="media-heading  comentario-usuarios-row"><small class="color-azul">{{$comentario->fecha_encuesta}}</small></p>
                              <p class="media-heading descripcion-comentario"><i class="fa fa-quote-left color-azul" aria-hidden="true"></i>&nbsp;<small class="color-azul">{{$comentario->descripcion_comentario}}&nbsp;<i class="fa fa-quote-right" aria-hidden="true"></i></small></p>    
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
                                        <span class="badge">{{$comentario->calificacionestrella}}</span>
                                        <strong >Calificación</strong>
                                      </li>
                                      <li class="list-group-item">
                                        <span class="badge">{{$comentario->puntaje}}</span>
                                        <strong >Puntaje</strong>
                                      </li>
                                      <li class="list-group-item">
                                        <span class="badge">{{$comentario->promedio}}</span>
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
{!!$comentarios->render()!!}