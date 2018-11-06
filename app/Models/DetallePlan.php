<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB as DB;

class DetallePlan extends Model
{
    protected $table = 'detalleplanes';
    public $primarykey = 'id';

   static public function MostrarDetallePlanes()
    {
    	// $detalleplanes = DetallePlan::select("detalleplanes.id as id","detalleplanes.descripcion_detalle_planes as descripcion_detalle_planes","detalleplanes.nCheckPlan as nCheckPlan","detalleplanes.plan_id as plan_id","detalleplanes.codigo_detalle as codigo_detalle","detalleplanes.cantidad_grupo_detalle as cantidad_grupo_detalle")
     //        ->where('detalleplanes.nEstado',1)
     //        ->get();//->toArray();
           //echo $planes;

        $detalleplanes = DB::select("call usp_listar_detalle_planes()");
        return $detalleplanes;

    }
}
