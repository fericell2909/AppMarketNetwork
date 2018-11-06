<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProveedorServicio as ProveedorServicio;
use Illuminate\Support\Facades\DB as DB;

class Cotizacion extends Model
{
    protected $table = 'cotizaciones';
    public $primarykey = 'id';

    static public function RegistrarCotizacion(array $valores, &$codigo_generado)
    {

      $categoria = Servicio::listar_codigo_servicio($valores['servicio_id']); 
      $codigo_generado = DB::table('cotizaciones')->insertGetId(
          [
            'titulo_cotizacion' => $valores['titulo_cotizacion'], 
            'estado_id' => 1,
            'descripcion_cotizacion' => $valores['descripcion_cotizacion'],
            'categoria_id' =>  $categoria[0]->categoria_id,
            'servicio_id' => $valores['servicio_id'],
            'user_id' => $valores['user_id'],
            'tiempo_id' => $valores['tiempo_id'],
            'nombre_contacto_cotizacion' => $valores['nombre_contacto_cotizacion'],
            'apellido_contacto_cotizacion' => $valores['apellido_contacto_cotizacion'],
            'celular_contacto_cotizacion' => $valores['celular_contacto_cotizacion'],
            'email_contacto_cotizacion' => $valores['email_contacto_cotizacion'],
            'contacto_id_departamento' => $valores['contacto_id_departamento'],
            'contacto_id_provincia' => $valores['contacto_id_provincia'],
            'contacto_id_distrito' => $valores['contacto_id_distrito'],
            'direccion_cotizacion' => $valores['direccion_cotizacion'],
            'latitud' => $valores['latitud'],
            'longitud' => $valores['longitud'],
            'chk_adjuntar' => $valores['chk_adjuntar'],
            'created_at' =>  date_create()->format('Y-m-d H:i:s'),
            'updated_at' =>  date_create()->format('Y-m-d H:i:s')       
          ]
      );
    }

    static public function ActualizarRutaImagen($ruta_imagen, $codigo_generado)
    {

      $data = array('cRutaArchivoAdjunto'=>$ruta_imagen);

      Cotizacion::where('id',$codigo_generado)
            ->update($data);

      $data = null;
    }

    static public function ListarCotizacionesPaginadas($id)
    {

        return Cotizacion::select("cotizaciones.id","cotizaciones.titulo_cotizacion",
                                  "estadocotizaciones.nombre_estado_cotizacion",
                                  "cotizaciones.descripcion_cotizacion","users.email",
                                  "cotizaciones.estado_id")
                            ->join("estadocotizaciones","estadocotizaciones.id","=","cotizaciones.estado_id")
                            ->join("users","users.id","=","cotizaciones.user_id")
                            ->where('cotizaciones.user_id',$id)
                            //->whereIn('cotizaciones.estado_id', array(1, 2))
                            ->orderBy('cotizaciones.id','DESC')
                            ->paginate(5);
    }

    static public function ListarCotizacionesProveedorPaginadas($id,$IdServicio)
    {

        if ($IdServicio == 12) {
           return Cotizacion::select("cotizaciones.id","cotizaciones.titulo_cotizacion",
                                  "estadocotizaciones.nombre_estado_cotizacion",
                                  "cotizaciones.descripcion_cotizacion","users.email",
                                  "cotizaciones.estado_id")
                            ->join("estadocotizaciones","estadocotizaciones.id","=","cotizaciones.estado_id")
                            ->join("users","users.id","=","cotizaciones.user_id")
                            ->orderBy('cotizaciones.id','DESC')
                            ->paginate(5);
        } else {

          $servicios = ProveedorServicio::select('proveedores_servicios.servicios_id')
                                          ->where('proveedores_servicios.users_id',$id)->get();

           return Cotizacion::select("cotizaciones.id","cotizaciones.titulo_cotizacion",
                                  "estadocotizaciones.nombre_estado_cotizacion",
                                  "cotizaciones.descripcion_cotizacion","users.email",
                                  "cotizaciones.estado_id")
                            ->join("estadocotizaciones","estadocotizaciones.id","=","cotizaciones.estado_id")
                            ->join("users","users.id","=","cotizaciones.user_id")
                            ->whereIn('cotizaciones.servicio_id', $servicios)
                            ->orderBy('cotizaciones.id','DESC')
                            ->paginate(5);
        }
        



    }
    static public function ListarDatosUsuario_x_Cotizacion($codigo_cotizacion)
    {

        return COtizacion::select("cotizaciones.id as cotizacionid","users.id as usersid",
                                  "users.email",
                                  "users.Nombres","users.Apellidos",
                                  "cotizaciones.titulo_cotizacion",
                                  "cotizaciones.descripcion_cotizacion")
                            ->join("estadocotizaciones","estadocotizaciones.id","=","cotizaciones.estado_id")
                            ->join("users","users.id","=","cotizaciones.user_id")
                            ->where('cotizaciones.id',$codigo_cotizacion)
                            ->get();

    }
    static public function ListarCotizacion_x_Codigo($codigo_cotizacion)
    {
      return COtizacion::select("cotizaciones.id",
                                  "users.email",
                                  "users.Nombres","users.Apellidos",
                                  "cotizaciones.titulo_cotizacion",
                                  "cotizaciones.descripcion_cotizacion",
                                  "cotizaciones.tiempo_id",
                                  "tiempos_cotizacion.tiempo_cotizacion",
                                  "cotizaciones.servicio_id",
                                  "servicios.nombre_servicio",
                                  "cotizaciones.nombre_contacto_cotizacion",
                                  "cotizaciones.apellido_contacto_cotizacion",
                                  "cotizaciones.celular_contacto_cotizacion",
                                  "cotizaciones.email_contacto_cotizacion",
                                  "cotizaciones.direccion_cotizacion",
                                  "cotizaciones.latitud",
                                  "cotizaciones.longitud",
                                  "cotizaciones.chk_adjuntar",
                                  "cotizaciones.cRutaArchivoAdjunto",
                                  "cotizaciones.contacto_id_departamento",
                                  "cotizaciones.contacto_id_provincia",
                                  "cotizaciones.contacto_id_distrito",
                                  "zonas.cNomZona as NombreDepartamento",
                                  "z1.cNomZona as NombreProvincia",
                                  "z2.cNomZona as NombreDistrito"
                                  )
                            ->join("estadocotizaciones","estadocotizaciones.id","=","cotizaciones.estado_id")
                            ->join("users","users.id","=","cotizaciones.user_id")
                            ->join("tiempos_cotizacion","tiempos_cotizacion.id","=","cotizaciones.tiempo_id")
                            ->join("servicios","servicios.id","=","cotizaciones.servicio_id")
                            ->join("zonas","zonas.id","=","cotizaciones.contacto_id_departamento")
                            ->join("zonas as z1","z1.id","=","cotizaciones.contacto_id_provincia")
                            ->join("zonas as z2","z2.id","=","cotizaciones.contacto_id_distrito")
                            ->where('cotizaciones.id',$codigo_cotizacion)
                            ->get(); 

    }
}
