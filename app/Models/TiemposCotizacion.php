<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TiemposCotizacion extends Model
{
    protected $table = 'tiempos_cotizacion';
    public $primarykey = 'id';

    static public function Listar_Tiempos_Cotizacion()
    {

    	return TiemposCotizacion::select('tiempos_cotizacion.id','tiempos_cotizacion.tiempo_cotizacion')
                                        ->where('tiempos_cotizacion.nEstado',1)
                                        ->get();                               
    }
    static public function Listar_Tiempos_Cotizacion_x_ID($id)
    {
    	return TiemposCotizacion::select('tiempos_cotizacion.id','tiempos_cotizacion.tiempo_cotizacion')
                                        ->where('tiempos_cotizacion.nEstado',1)
                                        ->where('tiempos_cotizacion.id',$id)
                                        ->get();
    }

}
