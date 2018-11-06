<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB as DB;
use App\Models\Cotizacion as Cotizacion;

class OfertaPrivada extends Model
{
    protected $table = 'ofertas_privadas';
    public $primarykey = 'id';
    
    public static function Listar_Ofertas_Privadas($id)
    {

        return DB::select("call usp_listar_ofertas_privadas($id)");
    }

    public static function RegistarOfertaPrivada($oferta_id,$users_id,$cotizaciones_id)
    {

    	$ofertaprivada =  new OfertaPrivada();

    	$ofertaprivada->ofertas_id = $oferta_id;
    	$ofertaprivada->users_id = $users_id;
    	$ofertaprivada->cotizaciones_id = $cotizaciones_id;
    	$ofertaprivada->save();
    	$ofertaprivada =  null;

        // cerrar la Cotizacion.

        $valores = array('estado_id'=> 3 );

         Cotizacion::where('id',$cotizaciones_id)
            ->update($valores);

        $valores = null;
    	
    	return true;
    }
    public static function Devuelve_Codigo_Cotizacion_X_Oferta_X_Usuario($codigo_oferta,$codigo_usuario)
    {

        return OfertaPrivada::select("ofertas_privadas.cotizaciones_id")
                               ->join("ofertas","ofertas.id","=","ofertas_privadas.ofertas_id")
                               ->where("ofertas_privadas.ofertas_id",$codigo_oferta)
                               ->where("ofertas.user_id",$codigo_usuario)
                               ->get();

    }
}
