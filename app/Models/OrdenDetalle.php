<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User as User;

class OrdenDetalle extends Model
{
    protected $table = 'ordenes_detalles';
    public $primarykey = 'id';

    public static function EliminarItems($codigo_detalle_id,$codigo_usuario,$cantidad_items_usuario)
    {

    	OrdenDetalle::where('id','=',$codigo_detalle_id)->delete();

    	User::DisminuyeCantidadTotalCompra($codigo_usuario,$cantidad_items_usuario);

    	return true;

    }
}
