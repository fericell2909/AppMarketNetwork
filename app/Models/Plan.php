<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB as DB;

class Plan extends Model
{
     protected $table = 'planes';
    public $primarykey = 'id';

   static public function MostrarPlanes()
    {
    	$planes = Plan::select("planes.id","planes.descripcion_plan","debitaciones.descripcion_debitacion as descripcion_debitacion","debitaciones.costo as costo","monedas.simbolo_moneda as simbolo_moneda")
            ->join("debitaciones","debitaciones.id","=","planes.debitacion_id")
            ->join("monedas","monedas.id","=","debitaciones.moneda_id")
            ->where('planes.nEstado',1)
            ->get();
           //echo $planes;
        return $planes;
    }
    static public function ListarPlanesUsuario($id)
    {
        
     $planes = Plan::select("planes.id","planes.descripcion_plan","debitaciones.descripcion_debitacion as descripcion_debitacion",
                            "debitaciones.costo as costo","monedas.simbolo_moneda as simbolo_moneda",
                            DB::raw("DATE_FORMAT(users.created_at , '%d/%m/%Y') as FechaInscripcion"))
            ->join("debitaciones","debitaciones.id","=","planes.debitacion_id")
            ->join("monedas","monedas.id","=","debitaciones.moneda_id")
            ->join("users","users.planes_id","=","planes.id")
            ->where('planes.nEstado',1)
            ->where('users.id',$id)
            ->get();
           //echo $planes;
        return $planes;   
        
    }
}
