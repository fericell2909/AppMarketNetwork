<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TmpEncuestaPendienteCorreo extends Model
{
     protected $table = 'tmp_encuestas_pendientes';
    public $primarykey = 'id';

static public function Registrar_Tmp_Encuesta_Pendiente_Correo($codigo_detalle_orden_id,$correo_admin,$nombre_admin,$correo_usu_reg,$nombre_usu_reg,$apellido_usu_reg,$prov_razon_social,$codigo_oferta,$codigo_usuario_registro,$link_encuesta)
	{

		$tmp_encpt_correo = new TmpEncuestaPendienteCorreo();
		
		$tmp_encpt_correo->Correo_Administrador = $correo_admin;
		$tmp_encpt_correo->Nombre_Administrador = $nombre_admin;
		$tmp_encpt_correo->Correo_Usuario_Registro = $correo_usu_reg;
		$tmp_encpt_correo->Nombre_Usuario_Registro = $nombre_usu_reg;
		$tmp_encpt_correo->Apellidos_Usuario_Registro = $apellido_usu_reg;
		$tmp_encpt_correo->prov_razon_social = $prov_razon_social;
		$tmp_encpt_correo->titulo_mensaje = 'Recordatorio : Encuesta de Satisfacción al Cliente';
		$tmp_encpt_correo->link_encuesta = $link_encuesta;
		$tmp_encpt_correo->users_id = $codigo_usuario_registro; 
		$tmp_encpt_correo->oferta_id = $codigo_oferta; 
		$tmp_encpt_correo->ordenes_detalles_id = $codigo_detalle_orden_id; 
		$tmp_encpt_correo->nRealizoEncuesta = 0;

		$tmp_encpt_correo->save();

	}

	 static public function Usuario_Pertenece_Oferta_Encuesta($codigo_orden_detalle_id,$email_usuario)
     {

        $email_encontrado  = TmpEncuestaPendienteCorreo::select('tmp_encuestas_pendientes.Correo_Usuario_Registro')
                                          ->where('tmp_encuestas_pendientes.ordenes_detalles_id',$codigo_orden_detalle_id)
                                          ->get();

                      
        if (COUNT($email_encontrado) > 0) {
        	
        	if (strtoupper($email_encontrado[0]->Correo_Usuario_Registro) == strtoupper($email_usuario)) {
        		$bretorno = true;
        	} else {
        		$bretorno = false;
        	}        	
        } else {
        	$bretorno = false;
        }
        
        return $bretorno; 

     }

     static public function Listar_Encuestas_Pendientes_x_Usuario($codigo_usuario)
     {

     	return TmpEncuestaPendienteCorreo::select('tmp_encuestas_pendientes.Correo_Usuario_Registro',
													'tmp_encuestas_pendientes.Nombre_Usuario_Registro',
													'tmp_encuestas_pendientes.Apellidos_Usuario_Registro',
													'tmp_encuestas_pendientes.prov_razon_social',
													'tmp_encuestas_pendientes.titulo_mensaje',
													'tmp_encuestas_pendientes.link_encuesta',
													'tmp_encuestas_pendientes.users_id',
													'tmp_encuestas_pendientes.oferta_id',
													'ofertas.titulo_oferta',
													'ofertas.precio_real',
													'ofertas.precio_oferta',
													'ofertas.descuento',
													'tmp_encuestas_pendientes.ordenes_detalles_id')
                                          ->join('ofertas','ofertas.id','=','tmp_encuestas_pendientes.oferta_id')
                                          ->where('tmp_encuestas_pendientes.users_id',$codigo_usuario)
                                          ->where('tmp_encuestas_pendientes.nRealizoEncuesta',0)
                                          ->orderBy('tmp_encuestas_pendientes.ordenes_detalles_id','ASC')
                            			  ->paginate(5);
     }

     static public function Encuesta_Pendiente_X_Detalle_id($codigo_detalle_id)
     {

     	return TmpEncuestaPendienteCorreo::select('tmp_encuestas_pendientes.Correo_Usuario_Registro',
													'tmp_encuestas_pendientes.Nombre_Usuario_Registro',
													'tmp_encuestas_pendientes.Apellidos_Usuario_Registro',
													'tmp_encuestas_pendientes.prov_razon_social',
													'tmp_encuestas_pendientes.titulo_mensaje',
													'tmp_encuestas_pendientes.link_encuesta',
													'tmp_encuestas_pendientes.users_id',
													'tmp_encuestas_pendientes.oferta_id',
													'ofertas.titulo_oferta',
													'ofertas.precio_real',
													'ofertas.precio_oferta',
													'ofertas.descuento',
													'tmp_encuestas_pendientes.ordenes_detalles_id',
													'ofertas.user_id as codigo_proveedor')
                                          ->join('ofertas','ofertas.id','=','tmp_encuestas_pendientes.oferta_id')
                                          ->where('tmp_encuestas_pendientes.ordenes_detalles_id',$codigo_detalle_id)
                                          ->get();
     }
}
