<table class="table table-hover">
  <thead>
   <tr>
    <th class="color-azul text-center">Codigo</th>
    <th class="color-azul text-center">Titulo</th>
    <th class="color-azul text-center">Estado</th>
    <th class="color-azul text-center">Acciones</th>

  </tr>
  </thead>
  <tbody>
  @foreach($cotizaciones as $cotizacion)
    <tr>
      <td class="color-negro text-center"  style="font-weight:300; vertical-align:middle;">{{$cotizacion->id}}</td>
      <td class="color-negro text-center"   style="font-weight:300; vertical-align:middle;">{{$cotizacion->titulo_cotizacion}}</td>
      <td class="color-negro text-center"   style="font-weight:300; vertical-align:middle;">{{$cotizacion->nombre_estado_cotizacion}}</td>
      <td class="color-negro text-center"   style="font-weight:300; vertical-align:middle;">

        <a class="btn btn-default btn-info"  href="{{route('cotizacion/VerCotizacion', ['id' => $cotizacion->id])}}"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp; Ver Detalle</a>

        <a class="btnVerComentario btn btn-default btn-success" href="#" role="button" data-codigo-cotizacion="{{$cotizacion->id}}"><i class="fa fa-commenting-o" aria-hidden="true"></i>&nbsp;Ver Comentarios</a>

        @if( $cotizacion->estado_id == 1  )
          <a data-toggle="modal" href="#AgregarComentario" class="btnAgregarComentario btn btn-danger" data-codigo-cotizacion="{{$cotizacion->id}}" data-titulo-cotizacion = "{{$cotizacion->titulo_cotizacion}}" ><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;Comentar</a>
        @endif
         @if( $cotizacion->estado_id == 2 )
          <a data-toggle="modal" href="#AgregarComentario" class="btnAgregarComentario btn btn-danger" data-codigo-cotizacion="{{$cotizacion->id}}" data-titulo-cotizacion = "{{$cotizacion->titulo_cotizacion}}" ><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;Comentar</a>

          @if(Auth::user()->users_tipos_id == 2) 
            <a class="btnGenerarOferta btn btn-default btn-warning" href="{{route('Ofertas/RegistrarOfertas', ['id' => $cotizacion->id])}}" role="button" data-codigo-cotizacion="{{$cotizacion->id}}"><i class="fa fa-file-powerpoint-o" aria-hidden="true"></i>&nbsp; Enviar Cotización</a>
          @endif
        @endif

      

      
      </td>
    </tr>
    <tr id="comentarios-{{$cotizacion->id}}" style="display:none;background:white; color:black;">
      <td  class="comentarios-users-{{$cotizacion->id}}"colspan="4">

      
      </td>
    </tr>

    {{-- <div class="modal fade" id="detalle-{{$cotizacion->id}}">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title text-center color-azul">Solicitud de Cotizacion N°: {{$cotizacion->id}}</h4>
          </div>
          <div class="modal-body">
              <div class="form-group">
                <label class="color-azul" style="font-weigth: 300;">Titulo</label>
                <input type="text" style="background-color:white;" readonly class="form-control" value="{{$cotizacion->titulo_cotizacion}}">
              </div>
              <div class="form-group">
                <label class="color-azul" style="font-weigth: 300;">Estado</label>
                <input type="text" style="background-color:white;" readonly class="form-control" value="{{$cotizacion->nombre_estado_cotizacion}}">
              </div>
              <div class="form-group">
                <label class="color-azul" style="font-weigth: 300;">Usuario de Registro</label>
                <input type="text" style="background-color:white;" readonly class="form-control" value="{{$cotizacion->email}}">
              </div>
              <div class="form-group">
                <label class="color-azul" style="font-weigth: 300;">Detalle de Cotizacion</label>
                <textarea readonly style="background-color:white;" class="form-control" rows="10" >{{$cotizacion->descripcion_cotizacion}}</textarea>
              </div>      
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div> --}}

  @endforeach
  </tbody>
</table>
  {!!$cotizaciones->render()!!}