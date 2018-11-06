<table class="table table-hover" id="tbl-encuestas-pendientes">
  <thead>
   <tr>
    <th class="color-azul text-center">Titulo Oferta</th>
    <th class="color-azul text-center">Precio Oferta</th>
    <th class="color-azul text-center">Proveedor</th>
    <th class="color-azul text-center">Acciones</th>
  </tr>
  </thead>
  <tbody>
  @foreach($encuestas_pendientes as $encuestas_pendiente)
    <tr>
      <td class="color-negro text-center"  style="font-weight:300; vertical-align:middle;">{{$encuestas_pendiente->titulo_oferta}}</td>
      <td class="color-negro text-center"   style="font-weight:300; vertical-align:middle;">{{$encuestas_pendiente->precio_oferta}}</td>
      <td class="color-negro text-center"   style="font-weight:300; vertical-align:middle;">{{$encuestas_pendiente->prov_razon_social}}</td>
      <td class="color-negro text-center"   style="font-weight:300; vertical-align:middle;">

        <a class="btn btn-default btn-info"  href="{{route('Ofertas/EncuestaCliente', ['id' => $encuestas_pendiente->ordenes_detalles_id])}}"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp; Realizar Encuesta</a>     
      </td>
    </tr>
  @endforeach
  </tbody>
{!!$encuestas_pendientes->render()!!}
</table>
  