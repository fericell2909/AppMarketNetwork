<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\OrdenDetalle as OrdenDetalle;
use App\Models\Oferta as Oferta;
use Illuminate\Support\Facades\DB as DB;
use App\User as User;
use Mail;

class Orden extends Model
{
    protected $table = 'ordenes';
    public $primarykey = 'id';

     public static function RegistraOrden($codigo_oferta,$codigo_usuario,$cantidad_items_usuario)
     {

     	// Solo los registrados.

     		$codigo_orden  = Orden::select('ordenes.id')
     								->where('ordenes.user_id',$codigo_usuario)
     								->where('ordenes.nEstado_Orden',1)
     								->get();

     		$actualiza_total_item = false;

     		if (count($codigo_orden) == 1) {
     			
     			// Ya tiene Orden
     			
     			// Logica


     			$orden_detalle_existe_producto = OrdenDetalle::select("ordenes_detalles.id")
     															->where("ordenes_detalles.orden_id",$codigo_orden[0]->id)
     															->where("ordenes_detalles.ofertas_id",$codigo_oferta)
     															->get();

     			if (count($orden_detalle_existe_producto) == 1) {
     				
     				$actualiza_total_item = false;
     			}
     			else
     			{
     				$precio_oferta = Oferta::Devuelve_Precio_Oferta($codigo_oferta);

     				$orden_detalle = new OrdenDetalle();
					$orden_detalle->orden_id = $codigo_orden[0]->id;
					$orden_detalle->precio = $precio_oferta[0]->precio_oferta;
					$orden_detalle->cantidad = 0;
					$orden_detalle->subtotal = 0;
                         $orden_detalle->ofertas_id = $codigo_oferta;
					$orden_detalle->save();

					$orden_detalle = null;
					$precio_oferta = null;

					$actualiza_total_item = true;

     			}

								     			

     		}
     		else
     		{
     			
     			// insertando la cabecera de la Orden.
     			$codigo_generado_orden = DB::table('ordenes')->insertGetId(
			     			[
			     				'total' => 0, 
			     				'user_id' => $codigo_usuario,
			     				'nEstado_Orden' => 1,
					 			'created_at' =>  date_create()->format('Y-m-d H:i:s'),
					 			'updated_at' =>  date_create()->format('Y-m-d H:i:s')
		 				]);

     			$precio_oferta = Oferta::Devuelve_Precio_Oferta($codigo_oferta);

     			$orden_detalle = new OrdenDetalle();

				$orden_detalle->orden_id = $codigo_generado_orden;
				$orden_detalle->precio = $precio_oferta[0]->precio_oferta;
				$orden_detalle->cantidad = 0;
				$orden_detalle->subtotal = 0;
                    $orden_detalle->ofertas_id = $codigo_oferta;
				$orden_detalle->save();

				$orden_detalle = null;
				$precio_oferta = null;
     			$actualiza_total_item = true;
     		}

     		if ($actualiza_total_item) {
     			
     			User::AumentaCantidadTotalCompra($codigo_usuario,$cantidad_items_usuario);

          $valor = array('CantidadDetalle'=>$cantidad_items_usuario + 1,
                        'nEncuestaPendiente'=>1,
                        'CantidadEncuestaPendiente'=>$cantidad_items_usuario + 1);

          if (count($codigo_orden) == 1)
          {

              Orden::where('id',$codigo_orden[0]->id)
                  ->update($valor);
          }
          else
          {
              Orden::where('id',$codigo_generado_orden)
                  ->update($valor);
          }

          
     			
     		}

     	return true;
     }

     public static function Listar_Ofertas_Orden($codigo_usuario)
     {


          return  DB::select("call usp_listar_ofertas_orden($codigo_usuario)"); 


     }

     public static function Listar_Ordenes_En_Atencion($codigo_usuario)
     {
        // nEstado_Orden : Ordenes en Estado de Atención.
        return Orden::select('ordenes.id','users.Nombres','users.Apellidos','users.email','ordenes.created_at',
                              'ordenes.CantidadDetalle','ordenes.nEncuestaPendiente','ordenes.CantidadEncuestaPendiente',
                              'ordenes.fecha_pago_orden','ordenes.total'
                            )
                      ->join('users','users.id','=','ordenes.user_id')
                    ->where('ordenes.nEstado_Orden',2)
                    ->where('ordenes.user_id',$codigo_usuario)
                    ->orderBy('ordenes.id','DESC')
                    ->paginate(10); 

     }

     public static function Listar_Ordenes_Cerradas($codigo_usuario)
     {
        // nEstado_Orden : Ordenes en Estado de Atención.
        return Orden::select('ordenes.id','users.Nombres','users.Apellidos','users.email','ordenes.created_at',
                              'ordenes.CantidadDetalle','ordenes.nEncuestaPendiente','ordenes.CantidadEncuestaPendiente',
                              'ordenes.fecha_pago_orden','ordenes.total'
                            )
                      ->join('users','users.id','=','ordenes.user_id')
                    ->where('ordenes.nEstado_Orden',3)
                    ->where('ordenes.user_id',$codigo_usuario)
                    ->orderBy('ordenes.id','DESC')
                    ->paginate(10); 

     }

      public static function Listar_Ordenes_Anuladas($codigo_usuario)
     {
        // nEstado_Orden : Ordenes en Estado de Atención.
        return Orden::select('ordenes.id','users.Nombres','users.Apellidos','users.email','ordenes.created_at',
                              'ordenes.CantidadDetalle','ordenes.nEncuestaPendiente','ordenes.CantidadEncuestaPendiente',
                              'ordenes.fecha_pago_orden','ordenes.total'
                            )
                      ->join('users','users.id','=','ordenes.user_id')
                    ->where('ordenes.nEstado_Orden',4)
                    ->where('ordenes.user_id',$codigo_usuario)
                    ->orderBy('ordenes.id','DESC')
                    ->paginate(10); 

     }

      public static function Listar_En_Encuesta($codigo_usuario)
     {
        // nEstado_Orden : Ordenes en Estado de Atención.
        return Orden::select('ordenes.id','users.Nombres','users.Apellidos','users.email','ordenes.created_at',
                              'ordenes.CantidadDetalle','ordenes.nEncuestaPendiente','ordenes.CantidadEncuestaPendiente',
                              'ordenes.fecha_pago_orden','ordenes.total'
                            )
                      ->join('users','users.id','=','ordenes.user_id')
                    ->where('ordenes.nEstado_Orden',5)
                    ->where('ordenes.user_id',$codigo_usuario)
                    //->where('ordenes.nEncuestaPendiente',0)
                    ->orderBy('ordenes.id','DESC')
                    ->paginate(10); 

     }

     public static function PagarItems($data,$codigo_usuario,$email)
     {

        // Actualizar Estado de Orden

          $codigo_orden  = Orden::select('ordenes.id')
                                             ->where('ordenes.user_id',$codigo_usuario)
                                             ->where('ordenes.nEstado_Orden',1)
                                             ->get();


          if (count($codigo_orden) == 1) {

          
               $total = 0;

               for ($i=0; $i < count($data['oferta_id']); $i++) { 
                    
                    $subtotal = floatval($data['preciofilacarrito'][$i])*intval($data['cantidadfilacarrito'][$i]);
                    $cantidad = intval($data['cantidadfilacarrito'][$i]);

                    $codigo_oferta = intval($data['oferta_id'][$i]);

                    $detalle_orden = array('fecha_atencion'=>date_create($data['fecha_atencion'][$i])->format('Y-m-d H:i:s'),
                                           'cantidad' => $cantidad,
                                           'subtotal' => $subtotal);

                    //$oferta_detalle = new OfertaDetalle();
                    // Evaluar si hay una oferta privada y cerrarla.

                    Oferta::Actualiza_Estado_Oferta_Privada($codigo_oferta);

                    // Actualizar Detalle de Orden

                    OrdenDetalle::where('orden_id',$codigo_orden[0]->id)
                                  ->where('ofertas_id',$codigo_oferta)
                                  ->update($detalle_orden);


                    $total = $total + $subtotal;
                    
                    $subtotal = null;
                    $cantidad = null;
                    $codigo_oferta = null;
                    $detalle_orden = null;

               }

               // Actualiza total de oferta
               $cantidad_total = array('total' => $total);

               Orden::where('id',$codigo_orden[0]->id)
                      ->update($cantidad_total);

               //Actualizando Carrito de Compra.
               $usuario = array('nTotalItemCarritoCompra' => 0);
               
               User::where('id',$codigo_usuario)
                    ->update($usuario);

               $usuario =  null;

               //Actualizando Orden.
               $valores = array('nEstado_Orden' => 2,'fecha_pago_orden' => date_create()->format('Y-m-d H:i:s')); 
               
               Orden::where('id',$codigo_orden[0]->id)
                    ->update($valores);
        
               $valores = null;

          }

          // Enviar Email

          $usuarios_emails = User::ListarEmailsOrden($codigo_orden[0]->id);


          foreach ($usuarios_emails as $valores) {
               
               if ($valores->tipo_usuario == 2) {
                    //Usuario Miembro

                    Mail::send('emails.ofertacompra', ['valores' => $valores], function ($message) use ($valores) {
                       $message->from(Config('mail.from.address'), Config('mail.from.name'));       
                       $message->to($valores->email, $valores->prov_razon_social);
                  
                       $message->subject('Felicitaciones: Compra de Oferta');
                  
                       $message->priority(5);
                   });
                    

               } else {
                    //Usuario Proveedor
                    Mail::send('emails.ofertacompramiembro', ['valores' => $valores], function ($message) use ($valores) {
                       $message->from(Config('mail.from.address'), Config('mail.from.name'));       
                       $message->to($valores->email, $valores->prov_razon_social);
                  
                       $message->subject('Felicitaciones: Realizaron una Compra de Oferta');
                  
                       $message->priority(5);
                   });

               }
               


          }

        // Enviar Correos a Proveedores.

          return true;

     }

     static public function Listar_Ordenes_Cotizaciones_Aceptadas_X_Confirmar($codigo_usuario)
     {

      return Orden::select('ordenes_detalles.id as codigo_detalle_orden',
                           'ordenes_detalles.orden_id as codigo_orden',
                           'ofertas.id as codigo_oferta',
                           'tipos_ofertas.nombre_tipos_oferta',
                           'ordenes_detalles.precio',
                           'ordenes_detalles.cantidad',
                           'ordenes_detalles.subtotal',
                           'users.email',
                           'ofertas.nEstado_Oferta as nEstado_Oferta')
                    ->join('ordenes_detalles','ordenes_detalles.orden_id','=','ordenes.id')
                    ->join('ofertas','ofertas.id','=','ordenes_detalles.ofertas_id')
                    ->join('tipos_ofertas','tipos_ofertas.id','=','ofertas.nTipo_Oferta')
                    ->join('users','users.id','=','ordenes.user_id')
                    ->where('ordenes.nEstado_Orden',2)
                    ->where('ofertas.user_id',$codigo_usuario)
                    ->where('ordenes_detalles.bRealizoEncuesta',0)
                    ->orderBy('ordenes_detalles.id','DESC')
                    ->paginate(5);
     }

     static public function Listar_Datos_confirmar_Trabajo($codigo_detalle_orden)
     {

      // Estado_Orden : 2 quiere decir en Atención.

      return Orden::select('users.email','users.Nombres','users.Apellidos','users.celular',
                           'ordenes.user_id',
                           'ofertas.titulo_oferta',
                           'ofertas.precio_oferta',
                           'ofertas.precio_real',
                           'ofertas.descuento',
                           'ofertas.fecha_inicio','ofertas.fecha_termino',
                           'ofertas.ruta_imagen_oferta','ofertas.prov_razon_social',
                           'ordenes_detalles.id as codigo_detalle_orden',
                           'tipos_ofertas.nombre_tipos_oferta',
                           'ordenes_detalles.bRealizoEncuesta',
                           'estados_ofertas.nombre_estado_oferta as nombre_estado_oferta',
                           'ofertas.id as codigo_oferta',
                           'ofertas.total_comentarios',
                           'ordenes_detalles.orden_id as codigo_orden')
                    ->join('ordenes_detalles','ordenes_detalles.orden_id','=','ordenes.id')
                    ->join('ofertas','ofertas.id','=','ordenes_detalles.ofertas_id')
                    ->join('tipos_ofertas','tipos_ofertas.id','=','ofertas.nTipo_Oferta')
                    ->join('users','users.id','=','ordenes.user_id')
                    ->join('estados_ofertas','estados_ofertas.id','=','ofertas.nEstado_Oferta')  
                    ->where('ordenes.nEstado_Orden',2)
                    ->where('ordenes_detalles.id',$codigo_detalle_orden)
                    ->where('ordenes_detalles.bRealizoEncuesta',0)
                    ->get();
     }

     static public function RegistrarTrabajoConfirmado(array $valores,$codigo_detalle_orden,$codigo_orden)
     {

        OrdenDetalle::where('id',$codigo_detalle_orden)
                      ->update($valores);

        
        $confirmaciones_faltantes = OrdenDetalle::select()
                                                   ->where('ordenes_detalles.orden_id',$codigo_orden)
                                                   ->where('ordenes_detalles.nConfirmarTrabajo',0)
                                                   ->get();             
        
        if (COUNT($confirmaciones_faltantes)> 0) {
          
          $valores = null;
          $codigo_detalle_orden = null;
        
        } else {
          // Actualizamos el Estado a Registro de Encuesta en la Orden. a Estado 5 : Registro de Encuesta.

          $valor = array('nEstado_Orden' => 5); 

          Orden::where('id',$codigo_orden)
                ->update($valor);

          $valores = null;
          $codigo_detalle_orden = null;
        }
     }

     static public function Actualizar_Orden_Encuesta_Realizada($codigo_detalles_id)
     {

      $codigo_ordens = OrdenDetalle::select('ordenes_detalles.orden_id')
                                      ->where('ordenes_detalles.id',$codigo_detalles_id)
                                      ->get(); 
      
      if (COUNT($codigo_ordens) > 0) 
        {
          
          $valor = array('bRealizoEncuesta' => 1);

          OrdenDetalle::where('id',$codigo_detalles_id)
                ->update($valor);

          $valor = null;

          $cantidad_items_orden = Orden::select('ordenes.CantidadDetalle')
                                      ->where('ordenes.id',$codigo_ordens[0]->orden_id)
                                      ->get();

          $cantidad_encuesta_confirmar_trabajo = OrdenDetalle::select()
                                                            ->where('ordenes_detalles.orden_id',$codigo_ordens[0]->orden_id)
                                                            ->where('ordenes_detalles.nConfirmarTrabajo',1)
                                                            ->where('ordenes_detalles.bRealizoEncuesta',1)
                                                            ->get();                                        

          if (COUNT($cantidad_encuesta_confirmar_trabajo) == $cantidad_items_orden[0]->CantidadDetalle ) 
          {
            
            //Cerrado.
            $valoractualizar = array('nEstado_Orden' => 3,'CantidadEncuestaPendiente'=>0,'nEncuestaPendiente' => 0); 

            Orden::where('id',$codigo_ordens[0]->orden_id)
                ->update($valoractualizar);

            $valoractualizar = null;
          }

          $codigo_ordens = null;
          $cantidad_encuesta_confirmar_trabajo = null;
          $cantidad_items_orden = null;                                                            

        }                                      
     }

}
