<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restriccion extends Model
{
     protected $table = 'restricciones';
    public $primarykey = 'id';

    public static function ListarRestricciones()
    {

    	return Restriccion::select('restricciones.id','restricciones.descripcion_detalle')
    						->where('nEstado',1)
    						->get();
    }
}
