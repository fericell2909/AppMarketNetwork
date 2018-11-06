<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OfertaDetalle extends Model
{
    protected $table = 'ofertas_detalles';
    public $primarykey = 'id';


public static function Listar_Ofertas_Detalles_x_ID($codigo_oferta)
{

	return  OfertaDetalle::select('ofertas_detalles.descripcion_detalle')
						   ->where('ofertas_detalles.ofertas_id',$codigo_oferta)
						   ->get();

}
}
