<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstadoProyecto extends Model
{
      protected $table = 'estados_proyectos';
    public $primarykey = 'id';

    static public function Listar_Estados_Proyectos()
    {

    	return EstadoProyecto::select('estados_proyectos.id','estados_proyectos.nombre_estado')
    						  ->get();


    }

}
