<table class="table table-hover" id="#tbl-atencion">
  <thead>
     <tr>
      <th class="color-azul text-center" style="vertical-align:middle;">Código</th>
      <th class="color-azul text-center" style="vertical-align:middle;">Fecha de Pago de Orden</th>
      <th class="color-azul text-center" style="vertical-align:middle;">Total</th>
      <th class="color-azul text-center" style="vertical-align:middle;"># de Ofertas Compradas</th>
      <th class="color-azul text-center" style="vertical-align:middle;">Encuestas Pendientes</th>
      <th class="color-azul text-center" style="vertical-align:middle;"># Encuestas de Pendientes</th>
    </tr>
  </thead>
  <tbody>

  @foreach($compras_atenciones as $compras_atencion)
    <tr>
      <td class="color-negro text-center"   style="font-weight:300; vertical-align:middle;">{{$compras_atencion->id}}</td>
      <td class="color-negro text-center"   style="font-weight:300; vertical-align:middle;">{{$compras_atencion->fecha_pago_orden }}</td>
      <td class="color-negro text-center"   style="font-weight:300; vertical-align:middle;">{{$compras_atencion->total}}</td>
      <td class="color-negro text-center"   style="font-weight:300; vertical-align:middle;">{{$compras_atencion->CantidadDetalle}}</td>
      <td class="color-negro text-center"   style="font-weight:300; vertical-align:middle;">@if($compras_atencion->CantidadEncuestaPendiente > 0) Si @else No  @endif </td>
      <td class="color-negro text-center"   style="font-weight:300; vertical-align:middle;">{{$compras_atencion->CantidadEncuestaPendiente}}</td>
      {{-- <td class="color-negro text-center" style="font-weight:300; vertical-align:middle;">
       		<div>
            <a style="width:100px;margin :2px;" href="" class="btnVerDetalleOrden btn btn-default btn-info" data-codigo-orden="{{$compras_atencion->id}}"><i class="fa fa-search" aria-hidden="true"></i>&nbsp;Ver Detalle</a>
         {{--  <a href="{{route('Ofertas/EditarOfertasVigentes', ['id' => $compras_atencion->id])}}" class="btnEditarOferta btn btn-danger" style="width:100px;margin :2px;" data-codigo-oferta="{{$compras_atencion->id}}"><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;Editar</a>
          <div>
      </td> --}}
    </tr>
  @endforeach
  </tbody>  
</table>
{!!$compras_atenciones->render()!!}
      