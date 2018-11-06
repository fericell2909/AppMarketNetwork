<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
  	protected $table = 'servicios';
    public $primarykey = 'id';

    static public function listar_servicios_id($id)
    {
        $servicios = Servicio::select('servicios.id','servicios.nombre_servicio')
                                        ->where('servicios.categoria_id',$id)
                                        ->where('servicios.nEstado',1)
                                        ->get();                                
      
      return $servicios;

    }

    static public function listar_servicios_todos()
    {
        $servicios = Servicio::select('servicios.id','servicios.nombre_servicio')
                                        ->where('servicios.nEstado',1)
                                        ->get();                                
      
      return $servicios;
    }
    static public function listar_servicios_sin_todos()
    {
        $servicios = Servicio::select('servicios.id','servicios.nombre_servicio')
                                        ->where('servicios.nEstado',1)
                                        ->whereNotIn('servicios.id',array(12))
                                        ->get();                                
      
      return $servicios;

    }

    static public function listar_codigo_servicio($id)
    {
        $categoria = Servicio::select('servicios.categoria_id')
                                        ->where('servicios.nEstado',1)
                                        ->where('servicios.id',$id)
                                        ->get();                                
      
      return $categoria;

    }
    static public function listar_codigo_servicio_nombre($id)
    {
        $categoria = Servicio::select('servicios.categoria_id','servicios.nombre_servicio')
                                        ->where('servicios.nEstado',1)
                                        ->where('servicios.id',$id)
                                        ->get();                                
      
      return $categoria;

    }
    static public function listar_servicios_busqueda($cadena_busqueda)
    {

        return Servicio::select('servicios.id','servicios.nombre_servicio')
                                        ->where('servicios.nEstado',1)
                                        ->where('servicios.nombre_servicio','like','%'.$cadena_busqueda.'%')
                                        ->get();                                

    }

    static public function listar_servicios_menu()
    {

    $servicios = Servicio::select('servicios.id','servicios.nombre_servicio','servicios.cIconoFonts','servicios.categoria_id')
                                        ->where('servicios.nEstado',1)
                                        ->whereNotIn('servicios.id',array(12))
                                        ->get();                                
      
      return $servicios;

    }

}
