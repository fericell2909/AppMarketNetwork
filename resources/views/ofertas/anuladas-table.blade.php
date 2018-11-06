<table class="table table-hover">
  <thead>
   <tr>
    <th class="color-azul text-center" style="vertical-align:middle;">#</th>
    <th class="color-azul text-center" style="vertical-align:middle;">Titulo</th>
    <th class="color-azul text-center" style="vertical-align:middle;">Fecha de Inicio</th>
    <th class="color-azul text-center" style="vertical-align:middle;">Fecha de Termino</th>
    <th class="color-azul text-center" style="vertical-align:middle;">Moneda</th>
    <th class="color-azul text-center" style="vertical-align:middle;">Precio Real</th>
    <th class="color-azul text-center" style="vertical-align:middle;">Precio Oferta</th>
    <th class="color-azul text-center" style="vertical-align:middle;">Acciones</th>

  </tr>
  </thead>
  <tbody>

  @foreach($ofertasanuladas as $ofertasanulada)
    <tr>
      <td class="color-negro text-center"  style="font-weight:300; vertical-align:middle;">{{$ofertasanulada->id}}</td>
      <td class="color-negro text-center"   style="font-weight:300; vertical-align:middle;">{{$ofertasanulada->titulo_oferta}}</td>
      <td class="color-negro text-center"   style="font-weight:300; vertical-align:middle;">{{$ofertasanulada->fecha_inicio}}</td>
      <td class="color-negro text-center"   style="font-weight:300; vertical-align:middle;">{{$ofertasanulada->fecha_termino}}</td>
      <td class="color-negro text-center"   style="font-weight:300; vertical-align:middle;">{{$ofertasanulada->descripcion_moneda}}</td>
      <td class="color-negro text-center"   style="font-weight:300; vertical-align:middle;">{{round($ofertasanulada->precio_real,2)}}</td>
      <td class="color-negro text-center"   style="font-weight:300; vertical-align:middle;">{{round($ofertasanulada->precio_oferta,2)}}</td>
       	<td class="color-negro text-center"   style="font-weight:300; vertical-align:middle;">
       		<div>
          <a style="width:100px;margin :2px;" href="{{route('Ofertas/VerOfertasAnuladas', ['id' => $ofertasanulada->id])}}" class="btnVerOfertaAnulada btn btn-default btn-info" data-codigo-oferta="{{$ofertasanulada->id}}"><i class="fa fa-search" aria-hidden="true"></i>&nbsp;Ver Detalle</a>
       	  <div>
        </td>
    </tr>
  @endforeach
  </tbody>
</table>
{!!$ofertasanuladas->render()!!}
