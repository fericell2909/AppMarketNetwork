<table class="table table-hover" id="tbl-mis-calificaciones">
  <thead>
   <tr>
    <th class="color-azul text-center">Comentario</th>
    <th class="color-azul text-center">Fecha de Encuesta</th>
    <th class="color-azul text-center">Email</th>
    <th class="color-azul text-center">Acciones</th>
  </tr>
  </thead>
  <tbody>
    @foreach($comentarios as $comentario)
      <tr>
        <td class="color-negro text-center"  style="font-weight:300; vertical-align:middle;">{{$comentario->descripcion_comentario}}</td>
        <td class="color-negro text-center"   style="font-weight:300; vertical-align:middle;">{{$comentario->fecha_encuesta}}</td>
        <td class="color-negro text-center"   style="font-weight:300; vertical-align:middle;">{{$comentario->email}}</td>
        <td class="color-negro text-center"   style="font-weight:300; vertical-align:middle;">

          <a class="btn btn-default btn-info"  href="{{route('Encuesta/VerEncuestaClienteProveedor', ['id' => $comentario->id])}}"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp; Ver Encuesta</a>     
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
{!!$comentarios->render()!!}