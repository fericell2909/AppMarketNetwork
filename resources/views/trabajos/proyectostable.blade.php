<table class="table table-hover">
  <thead>
   <tr>
    <th class="color-azul text-center">Codigo</th>
    <th class="color-azul text-center">Titulo</th>
    <th class="color-azul text-center">Estado</th>
    <th class="color-azul text-center">Costo</th>
    <th class="color-azul text-center">Moneda</th>
    <th class="color-azul text-center">Acciones</th>

  </tr>
  </thead>
  <tbody>
  @foreach($proyectos as $proyecto)
    <tr>
      <td class="color-negro text-center"  style="font-weight:300; vertical-align:middle;">{{$proyecto->id}}</td>
      <td class="color-negro text-center"   style="font-weight:300; vertical-align:middle;">{{$proyecto->titulo_proyecto}}</td>
      <td class="color-negro text-center"   style="font-weight:300; vertical-align:middle;">{{$proyecto->nombre_estado}}</td>
      <td class="color-negro text-center"   style="font-weight:300; vertical-align:middle;">{{$proyecto->costo_proyecto}}</td>
      <td class="color-negro text-center"   style="font-weight:300; vertical-align:middle;">{{$proyecto->descripcion_moneda}}</td>
      <td class="color-negro text-center"   style="font-weight:300; vertical-align:middle;">

        <a class="btn btn-default btn-info"  href="{{route('proveedores/vertrabajos', ['id' => $proyecto->id])}}"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp; Ver Detalle</a>

        <a class="btn btn-default btn-warning"  href="{{route('proveedores/editartrabajos', ['id' => $proyecto->id])}}"><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp; Editar</a>
      
      </td>
    </tr>
  @endforeach
  </tbody>
</table>
  {!!$proyectos->render()!!}
