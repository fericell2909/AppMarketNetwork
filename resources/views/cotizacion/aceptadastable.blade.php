<table class="table table-hover" id="tbl-cotizaciones-aceptadas">
  <thead>
   <tr>
    <th class="color-azul text-center"># Orden</th>
    <th class="color-azul text-center">Comprador</th>
    <th class="color-azul text-center">Tipo de Oferta</th>
    <th class="color-azul text-center">Precio</th>
    <th class="color-azul text-center">Cantidad</th>
    <th class="color-azul text-center">Subtotal</th>
    <th class="color-azul text-center">Acciones</th>
  </tr>
  </thead>
  <tbody>
  @foreach($cotizaciones_aceptadas as $cotizaciones_aceptada)
    <tr>
      <td class="color-negro text-center"  style="font-weight:300; vertical-align:middle;">{{$cotizaciones_aceptada->codigo_orden}}</td>
      <td class="color-negro text-center"   style="font-weight:300; vertical-align:middle;">{{$cotizaciones_aceptada->email}}</td>
      <td class="color-negro text-center"   style="font-weight:300; vertical-align:middle;">{{$cotizaciones_aceptada->nombre_tipos_oferta}}</td>
      <td class="color-negro text-center"   style="font-weight:300; vertical-align:middle;">{{$cotizaciones_aceptada->precio}}</td>
      <td class="color-negro text-center"   style="font-weight:300; vertical-align:middle;">{{$cotizaciones_aceptada->cantidad}}</td>
      <td class="color-negro text-center"   style="font-weight:300; vertical-align:middle;">{{$cotizaciones_aceptada->subtotal}}</td>
      
      <td class="color-negro text-center"   style="font-weight:300; vertical-align:middle;">
        @if($cotizaciones_aceptada->nEstado_Oferta == 1) 
          <a class="btn btn-default btn-info" href="{{route('Ofertas/VerOfertasVigentes', ['id' => $cotizaciones_aceptada->codigo_oferta])}}"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp; Ver Oferta</a>
        @else
          @if($cotizaciones_aceptada->nEstado_Oferta == 2) 
            <a class="btn btn-default btn-info" href="{{route('Ofertas/VerOfertasCerradas', ['id' => $cotizaciones_aceptada->codigo_oferta])}}"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp; Ver Oferta</a>
          @else
            <a class="btn btn-default btn-info" href="{{route('Ofertas/VerOfertasAnuladas', ['id' => $cotizaciones_aceptada->codigo_oferta])}}"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp; Ver Oferta</a>
          @endif
        @endif
        <a class="btnVerComentario btn btn-default btn-success" href="{{route('proveedores/ConfirmarTrabajo', ['id' => $cotizaciones_aceptada->codigo_detalle_orden])}}" role="button" data-codigo-cotizacion="{{$cotizaciones_aceptada->codigo_detalle_orden}}"><i class="fa fa-check-square" aria-hidden="true"></i>&nbsp;Confirmar Trabajo</a>

      </td>
    </tr>
    </div>

  @endforeach
  </tbody>
  {!!$cotizaciones_aceptadas->render()!!}
</table>
  
