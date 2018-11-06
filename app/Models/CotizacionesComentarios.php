<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB as DB;

class CotizacionesComentarios extends Model
{
      protected $table = 'cotizaciones_comentarios';
    public $primarykey = 'id'; //


    static public function RegistrarComentariosCotizacion(Array $valores)
    {

        $cotizacioncomentario = new CotizacionesComentarios();
    	$cotizacioncomentario->descripcion_comentario = $valores['descripcion_comentario'];
    	$cotizacioncomentario->fecha_registro =date_create()->format('Y-m-d H:i:s'); 
    	$cotizacioncomentario->cotizaciones_id =$valores['cotizaciones_id'];
    	$cotizacioncomentario->users_tipos_id = $valores['users_tipos_id'];
        $cotizacioncomentario->users_id = $valores['users_id'];
    	$cotizacioncomentario->save();

         $data=array('estado_id'=>2,'costo'=> $valores['costo'],'fecha_vigencia_maxima'=> $valores['fecha_vigencia_maxima']);

        Cotizacion::where('id','=',$valores['cotizaciones_id'])
                        ->update($data);

        $valores = null;
        $data = null;
        $cotizacioncomentario = null;

    }

    static public function ListarComentariosCotizacion($id)
    {

        $cotizacioncomentarios =DB::select("call usp_listar_comentarios(?)",array($id));

        return $cotizacioncomentarios;

    }





}
