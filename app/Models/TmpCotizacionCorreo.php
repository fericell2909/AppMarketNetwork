<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
Use App\Models\Zona as Zona;
Use App\Models\Servicio as Servicio;

class TmpCotizacionCorreo extends Model
{
    protected $table = 'tmp_cotizaciones_correos';
    public $primarykey = 'id';

static public function Registrar_Tmp_Cotizacion_Correos($codigo_generado,array $valores,$correo_admin,$nombre_admin,$correo_usu_reg,$nombre_usu_reg,$apellido_usu_reg)
	{


		$servicio_nombre = Servicio::listar_codigo_servicio_nombre($valores['servicio_id']);
		$tiempos_cotizacion = TiemposCotizacion::Listar_Tiempos_Cotizacion_x_ID($valores['tiempo_id']);

		$nombre_departamento = Zona::Listar_Zona_x_ID($valores['contacto_id_departamento']);
		$nombre_provincia = Zona::Listar_Zona_x_ID($valores['contacto_id_provincia']);
		$nombre_distrito = Zona::Listar_Zona_x_ID($valores['contacto_id_distrito']);

		$tmp_cot_correo = new TmpCotizacionCorreo();
		
		$tmp_cot_correo->Correo_Administrador = $correo_admin;
		$tmp_cot_correo->Nombre_Administrador = $nombre_admin;
		$tmp_cot_correo->Correo_Usuario_Registro = $correo_usu_reg;
		$tmp_cot_correo->Nombre_Usuario_Registro = $nombre_usu_reg;
		$tmp_cot_correo->Apellidos_Usuario_Registro = $apellido_usu_reg;
		$tmp_cot_correo->descripcion_cotizacion = $valores['descripcion_cotizacion'];
		$tmp_cot_correo->Servicio = $servicio_nombre[0]->nombre_servicio;
		$tmp_cot_correo->Tiempo = $tiempos_cotizacion[0]->tiempo_cotizacion;
		$tmp_cot_correo->nombre_contacto_cotizacion = $valores['nombre_contacto_cotizacion'];
		$tmp_cot_correo->apellido_contacto_cotizacion = $valores['apellido_contacto_cotizacion'];
		$tmp_cot_correo->celular_contacto_cotizacion = $valores['celular_contacto_cotizacion'];
		$tmp_cot_correo->email_contacto_cotizacion = $valores['email_contacto_cotizacion'];
		
		$tmp_cot_correo->contacto_departamento = $nombre_departamento[0]->cNomZona;
		$tmp_cot_correo->contacto_provincia = $nombre_provincia[0]->cNomZona;
		$tmp_cot_correo->contacto_distrito = $nombre_distrito[0]->cNomZona;
		
		$tmp_cot_correo->direccion_cotizacion = $valores['direccion_cotizacion'];
		
		$tmp_cot_correo->nEnvioCotizacion = 0;
		$tmp_cot_correo->cotizacion_id = $codigo_generado;
		$tmp_cot_correo->save();
	}
}
