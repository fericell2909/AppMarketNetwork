<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TiposOfertas extends Model
{
   	protected $table = 'tipos_ofertas';
    public $primarykey = 'id';

    static public function Listar_Tipos_Ofertas()
    {

    	return TiposOfertas::select('tipos_ofertas.id','tipos_ofertas.nombre_tipos_oferta')
                                        ->where('tipos_ofertas.nEstado',1)
                                        ->get();                               
    }

    static public function Listar_Tipos_Ofertas_x_ID($codigo)
    {
    	return TiposOfertas::select('tipos_ofertas.id','tipos_ofertas.nombre_tipos_oferta')
                                        ->where('tipos_ofertas.nEstado',1)
                                        ->where('tipos_ofertas.id',$codigo)
                                        ->get(); 

    }
}
