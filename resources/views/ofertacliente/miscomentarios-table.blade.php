<table class="table table-hover" id="tbl-mis-comentarios">
  <thead>
   <tr>
    <th class="color-azul text-center">Comentario</th>
    <th class="color-azul text-center">Fecha de Encuesta</th>
    <th class="color-azul text-center">Proveedor</th>
    <th class="color-azul text-center">Acciones</th>
  </tr>
  </thead>
  <tbody>
    @foreach($mis_comentarios as $mis_comentario)
      <tr>
        <td class="color-negro text-center"  style="font-weight:300; vertical-align:middle;">{{$mis_comentario->descripcion_comentario}}</td>
        <td class="color-negro text-center"   style="font-weight:300; vertical-align:middle;">{{$mis_comentario->fecha_encuesta}}</td>
        <td class="color-negro text-center"   style="font-weight:300; vertical-align:middle;">{{$mis_comentario->prov_razon_social}}</td>
        <td class="color-negro text-center"   style="font-weight:300; vertical-align:middle;">

          <a class="btn btn-default btn-info"  href="{{route('Encuesta/VerEncuestaCliente', ['id' => $mis_comentario->id])}}"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp; Ver Encuesta</a>     
        </td>
      </tr>
    @endforeach
  </tbody>

</table>
{!!$mis_comentarios->render()!!}