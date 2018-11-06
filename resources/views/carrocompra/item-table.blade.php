<table class="table table-hover table-bordered" id="table-carrito">
    <thead>
        {{-- <tr class="titulo-green text-center">
                </tr> --}}
            <th class="thtd-centrado-vertical fondo-naranja color-azul">Ofertas a Comprar</th>
            <th class="text-center thtd-centrado-vertical fondo-naranja color-azul">Precio</th>
            <th class="text-center thtd-centrado-vertical fondo-naranja color-azul">Cantidad</th>
            <th class="text-center thtd-centrado-vertical fondo-naranja color-azul"> Total </th>

    </thead>
    <tbody >
    @foreach($OrdenesItems as $OrdenItem)

        <tr>
          <td class=" thtd-centrado-vertical">
            <p class="cuenta-usuario-row titulo-oferta-item" style="width:320px;">
                <label class="lbl-cuenta-usuario color-azul">{{ $OrdenItem->titulo_oferta }}</label>
                <input type="text" style="display:none" name="oferta_id[]" value="{{$OrdenItem->id}}">
                <input type="text" style="display:none" name="detalle_id[]" value="{{$OrdenItem->detalle_id}}">
                <input type="text" style="display:none" name="titulo_oferta[]" value="{{$OrdenItem->titulo_oferta}}">
            </p>
            <p class="cuenta-usuario-row">
                <b><a href="{{route('Public/Proveedor',[ 'id' => $OrdenItem->user_id])}}" title="Ver Informacion del Proveedor" class="lbl-cuenta-usuario color-rojo">{{$OrdenItem->prov_razon_social}}</a><b>
            </p>
            <p class="cuenta-usuario-row">
                <label class="lbl-cuenta-usuario  lbl-cuenta-usuario-concepto">Precio Oferta:</label>
                <label class="lbl-cuenta-usuario lbl-cuenta-usuario-descripcion precio-oferta">{{$OrdenItem->s_precio_oferta}}</label>
                <label class="lbl-cuenta-usuario  lbl-cuenta-usuario-concepto">Precio Real:</label>
                <label class="lbl-cuenta-usuario lbl-cuenta-usuario-descripcion precio-real"><s><span>{{$OrdenItem->s_precio_real}}</span></s></label>
                &nbsp;<a href="{{route('CarroCompra/Eliminar',[ 'id' => $OrdenItem->detalle_id])}}" title="Eliminar Oferta de Carrito de Compra">Eliminar Oferta</a>
            </p>
            <p class="cuenta-usuario-row">
                <div class="col-sm-6">
                                <span class="color-azul">Fecha Atención</span>
                                <input type="date"  class="form-control clsfechaatencion"  name="fecha_atencion[]" 
                                  value="{{date('Y-m-d')}}" required>
                </div>
                            <span  id ="ErrorMensaje-fecha_atención" class="help-block"></span>
            </p>
          </td>
           <td class="text-center thtd-centrado-vertical"><span class="preciofilacarrito" name="preciofilacarrito[]">{{$OrdenItem->precio}}<span>
                <input type="text" style="display:none" name="preciofilacarrito[]" value="{{$OrdenItem->precio}}">
           </td>
           <td class="text-center  thtd-centrado-vertical"><input type="text" name="cantidadfilacarrito[]" class="cantidadfilacarrito" style="width:50px;" required  value="0" maxlength="2"></tD>
           <td class="text-center thtd-centrado-vertical"><span class="totalfilacarrito">{{$OrdenItem->subtotal}}<span>
           </td>
        </tr>
    @endforeach
        <tr>
            <td colspan="3">
                <p class="cuenta-usuario-row">
                    <label class="lbl-cuenta-usuario color-azul">Total a Comprar S/. </label>
                </p>
            </td>
            <td  class="text-center thtd-centrado-vertical">
                <p class="cuenta-usuario-row">
                    <label class="lbl-cuenta-usuario color-verde"><span id="CantidadTotalCarrito" name="CantidadTotalCarrito">0.00<span></label>

                </p>
                
            </td>
             <span  id ="ErrorMensaje-total-comprar" class="help-block"></span>
        </tr>

    </tbody>
</table>