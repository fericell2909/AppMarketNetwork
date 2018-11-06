<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Moneda extends Model
{
    protected $table = 'monedas';
    public $primarykey = 'id';

    public static function Listar_Monedas()
    {
    	$monedas  = Moneda::select("monedas.id as id","monedas.descripcion_moneda as descripcion_moneda")
            			->where('monedas.nEstado',1)
            			->get();

        return $monedas;
    }
}
