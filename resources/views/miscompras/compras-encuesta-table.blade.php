<table class="table table-hover" id="#tbl-encuesta">
  <thead>
     <tr>
      <th class="color-azul text-center" style="vertical-align:middle;">Código</th>
      <th class="color-azul text-center" style="vertical-align:middle;">Fecha de Pago de Orden</th>
      <th class="color-azul text-center" style="vertical-align:middle;">Total</th>
      <th class="color-azul text-center" style="vertical-align:middle;"># de Ofertas Compradas</th>
      <th class="color-azul text-center" style="vertical-align:middle;">Encuestas Pendientes</th>
      <th class="color-azul text-center" style="vertical-align:middle;"># Encuestas de Pendientes</th>
      <th class="color-azul text-center" style="vertical-align:middle;">Acciones</th>
    </tr>
  </thead>
  <tbody>

  @foreach($compras_encuestas as $compras_encuesta)
    <tr>
      <td class="color-negro text-center"   style="font-weight:300; vertical-align:middle;">{{$compras_encuesta->id}}</td>
      <td class="color-negro text-center"   style="font-weight:300; vertical-align:middle;">{{$compras_encuesta->fecha_pago_orden }}</td>
      <td class="color-negro text-center"   style="font-weight:300; vertical-align:middle;">{{$compras_encuesta->total}}</td>
      <td class="color-negro text-center"   style="font-weight:300; vertical-align:middle;">{{$compras_encuesta->CantidadDetalle}}</td>
      <td class="color-negro text-center"   style="font-weight:300; vertical-align:middle;">@if($compras_encuesta->CantidadEncuestaPendiente > 0) Si @else No  @endif </td>
      <td class="color-negro text-center"   style="font-weight:300; vertical-align:middle;">{{$compras_encuesta->CantidadEncuestaPendiente}}</td>
      <td class="color-negro text-center" style="font-weight:300; vertical-align:middle;">
       		<div>
            <a style="width:100px;margin :2px;" href="{{route('Encuestas/MisPendientes')}}" class="btn btn-default btn-info"><i class="fa fa-search" aria-hidden="true"></i>&nbsp; Pendientes</a>
           {{-- <a href="{{route('Ofertas/EditarOfertasVigentes', ['id' => $compras_atencion->id])}}" class="btnEditarOferta btn btn-danger" style="width:100px;margin :2px;" data-codigo-oferta="{{$compras_atencion->id}}"><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;Editar</a> --}}
          <div>
      </td> 
    </tr>
  @endforeach
  </tbody>
  {!!$compras_encuestas->render()!!}  
</table>
