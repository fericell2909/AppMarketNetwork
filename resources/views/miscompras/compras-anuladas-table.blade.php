<table class="table table-hover" id="#tbl-anuladas">
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

  @foreach($compras_anuladas as $compras_anulada)
    <tr>
      <td class="color-negro text-center"   style="font-weight:300; vertical-align:middle;">{{$compras_anulada->id}}</td>
      <td class="color-negro text-center"   style="font-weight:300; vertical-align:middle;">{{$compras_anulada->fecha_pago_orden }}</td>
      <td class="color-negro text-center"   style="font-weight:300; vertical-align:middle;">{{$compras_anulada->total}}</td>
      <td class="color-negro text-center"   style="font-weight:300; vertical-align:middle;">{{$compras_anulada->CantidadDetalle}}</td>
      <td class="color-negro text-center"   style="font-weight:300; vertical-align:middle;">@if($compras_anulada->CantidadEncuestaPendiente > 0) Si @else No  @endif </td>
      <td class="color-negro text-center"   style="font-weight:300; vertical-align:middle;">{{$compras_anulada->CantidadEncuestaPendiente}}</td>
      <td class="color-negro text-center" style="font-weight:300; vertical-align:middle;">
       		<div>
           {{-- <a href="{{route('Ofertas/EditarOfertasVigentes', ['id' => $compras_atencion->id])}}" class="btnEditarOferta btn btn-danger" style="width:100px;margin :2px;" data-codigo-oferta="{{$compras_atencion->id}}"><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;Editar</a> --}}
          <div>
      </td> 
    </tr>
  @endforeach
  </tbody>
  {!!$compras_anuladas->render()!!}  
</table>