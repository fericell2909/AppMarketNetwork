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

  @foreach($ofertasvigentes as $ofertasvigente)
    <tr>
      <td class="color-negro text-center"  style="font-weight:300; vertical-align:middle;">{{$ofertasvigente->id}}</td>
      <td class="color-negro text-center"   style="font-weight:300; vertical-align:middle;">{{$ofertasvigente->titulo_oferta}}</td>
      <td class="color-negro text-center"   style="font-weight:300; vertical-align:middle;">{{$ofertasvigente->fecha_inicio}}</td>
      <td class="color-negro text-center"   style="font-weight:300; vertical-align:middle;">{{$ofertasvigente->fecha_termino}}</td>
      <td class="color-negro text-center"   style="font-weight:300; vertical-align:middle;">{{$ofertasvigente->descripcion_moneda}}</td>
      <td class="color-negro text-center"   style="font-weight:300; vertical-align:middle;">{{round($ofertasvigente->precio_real,2)}}</td>
      <td class="color-negro text-center"   style="font-weight:300; vertical-align:middle;">{{round($ofertasvigente->precio_oferta,2)}}</td>
       	<td class="color-negro text-center"   style="font-weight:300; vertical-align:middle;">
       		<div>
          <a style="width:100px;margin :2px;" href="{{route('Ofertas/VerOfertasVigentes', ['id' => $ofertasvigente->id])}}" class="btnVerOferta btn btn-default btn-info" data-codigo-oferta="{{$ofertasvigente->id}}"><i class="fa fa-search" aria-hidden="true"></i>&nbsp;Ver Oferta</a>
          <a href="{{route('Ofertas/EditarOfertasVigentes', ['id' => $ofertasvigente->id])}}" class="btnEditarOferta btn btn-danger" style="width:100px;margin :2px;" data-codigo-oferta="{{$ofertasvigente->id}}"><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;Editar</a>
       	  <div>
        </td>
    </tr>
  @endforeach
  </tbody>
</table>
{!!$ofertasvigentes->render()!!}

