<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB as DB;
use App\Models\ProyectoImagen as ProyectoImagen;

class Proyecto extends Model
{
   protected $table = 'proyectos';
   public $primarykey = 'id';

   static public function RegistrarProyecto(Array $valores, &$codigo_generado)
   {


   	$codigo_generado = DB::table('proyectos')->insertGetId(
          [
            'titulo_proyecto' => $valores['titulo_proyecto'], 
            'mes_id' => $valores['mes_id'],
            'anio_id' => $valores['anio_id'],
            'costo_proyecto' =>  $valores['costo_proyecto'],
            'moneda_id' => $valores['moneda_id'],
            'descripcion_proyecto' => $valores['descripcion_proyecto'],
            'proyecto_id_departamento' => $valores['proyecto_id_departamento'],
            'proyecto_id_provincia' => $valores['proyecto_id_provincia'],
            'proyecto_id_distrito' => $valores['proyecto_id_distrito'],
            
            'direccion_proyecto' => $valores['direccion_proyecto'],
            'latitud' => $valores['latitud'],
            'longitud' => $valores['longitud'],
            'user_id' => $valores['user_id'],
            'estado_proyecto_id' => 1,
            'created_at' =>  date_create()->format('Y-m-d H:i:s'),
            'updated_at' =>  date_create()->format('Y-m-d H:i:s')       
          ]
      );


   }

   static public function Registrar_Imagen_Proyecto($codigo_generado,$ruta_imagen,$imagen_principal)
   {

   		$proy_imagen = new ProyectoImagen();

   		$proy_imagen->proyecto_id = $codigo_generado;
		   $proy_imagen->cRutaImagenProyecto = $ruta_imagen;
		   $proy_imagen->nImagenPrincipal = $imagen_principal;
		
		   $proy_imagen->save();

		   $proy_imagen = null;		
   }

   static public function Listar_Proyectos_x_Usuario($codigo_usuario)
   {
      return Proyecto::select('proyectos.id','proyectos.titulo_proyecto','estados_proyectos.nombre_estado','proyectos.costo_proyecto',
                              'monedas.descripcion_moneda')
                       ->join('estados_proyectos','estados_proyectos.id','=','proyectos.estado_proyecto_id')
                       ->join('monedas','monedas.id','=','proyectos.moneda_id')
                       ->where('proyectos.user_id',$codigo_usuario)
                       ->orderBy('proyectos.id','DESC')
                        ->paginate(2);
   }

   static public function Listar_Proyectos_x_Usuario_Cliente($codigo_usuario)
   {
      return Proyecto::select('proyectos.id','proyectos.titulo_proyecto',
                             'estados_proyectos.nombre_estado','proyectos.estado_proyecto_id',
                             'proyectos.moneda_id','monedas.descripcion_moneda',
                             'proyectos.mes_id','meses.nombre_mes',
                             'proyectos.anio_id','anios.nombre_anio',
                             'proyectos.proyecto_id_departamento','zonas.cNomZona as Nombre_Departamento',
                             'proyectos.proyecto_id_provincia','z1.cNomZona as Nombre_Provincia',
                             'proyectos.proyecto_id_distrito','z2.cNomZona as Nombre_Distrito',
                             'proyectos.latitud','proyectos.longitud','proyectos.direccion_proyecto',
                             'proyectos.costo_proyecto','proyectos.descripcion_proyecto',
                             'proyecto_imagenes.cRutaImagenProyecto as cRutaImagenProyecto')
                      ->join('estados_proyectos','estados_proyectos.id','=','proyectos.estado_proyecto_id')
                      ->join('monedas','monedas.id','=','proyectos.moneda_id')
                      ->join('meses','meses.id','=','proyectos.mes_id')
                      ->join('anios','anios.id','=','proyectos.anio_id')
                      ->join("zonas","zonas.id","=","proyectos.proyecto_id_departamento")
                      ->join("zonas as z1","z1.id","=","proyectos.proyecto_id_provincia")
                      ->join("zonas as z2","z2.id","=","proyectos.proyecto_id_distrito")
                      ->join("proyecto_imagenes","proyecto_imagenes.proyecto_id","=","proyectos.id")
                      ->where('proyectos.user_id',$codigo_usuario)
                      ->where('proyecto_imagenes.nImagenPrincipal',1)
                      ->where('proyectos.estado_proyecto_id',1)
                      ->orderBy('proyectos.id','DESC')
                      ->paginate(8);
   }

   static public function Listar_Proyecto_Ver_x_ID($codigo_proyecto)

  {
    return Proyecto::select('proyectos.id','proyectos.titulo_proyecto',
                             'estados_proyectos.nombre_estado','proyectos.estado_proyecto_id',
                             'proyectos.moneda_id','monedas.descripcion_moneda',
                             'proyectos.mes_id','meses.nombre_mes',
                             'proyectos.anio_id','anios.nombre_anio',
                             'proyectos.proyecto_id_departamento','zonas.cNomZona as Nombre_Departamento',
                             'proyectos.proyecto_id_provincia','z1.cNomZona as Nombre_Provincia',
                             'proyectos.proyecto_id_distrito','z2.cNomZona as Nombre_Distrito',
                             'proyectos.latitud','proyectos.longitud','proyectos.direccion_proyecto',
                             'proyectos.costo_proyecto','proyectos.descripcion_proyecto')
                      ->join('estados_proyectos','estados_proyectos.id','=','proyectos.estado_proyecto_id')
                      ->join('monedas','monedas.id','=','proyectos.moneda_id')
                      ->join('meses','meses.id','=','proyectos.mes_id')
                      ->join('anios','anios.id','=','proyectos.anio_id')
                      ->join("zonas","zonas.id","=","proyectos.proyecto_id_departamento")
                      ->join("zonas as z1","z1.id","=","proyectos.proyecto_id_provincia")
                      ->join("zonas as z2","z2.id","=","proyectos.proyecto_id_distrito")
                      ->where('proyectos.id',$codigo_proyecto)
                      ->get(); 
   }

   static public function Listar_Proyecto_Imagenes_x_ID($codigo_proyecto)
   {


    return ProyectoImagen::select('Proyecto_Imagenes.id','Proyecto_Imagenes.cRutaImagenProyecto','Proyecto_Imagenes.nImagenPrincipal')
                          ->where('Proyecto_Imagenes.proyecto_id',$codigo_proyecto)
                          ->get();

   }

   static public function ActualizarProyecto(array $valores,$codigo_proyecto)
   {
      Proyecto::where('id',$codigo_proyecto)
                ->update($valores);

   }
}
