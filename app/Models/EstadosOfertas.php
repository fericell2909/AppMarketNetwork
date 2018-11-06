<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstadosOfertas extends Model
{
    protected $table = 'estados_ofertas';
    public $primarykey = 'id';

    static public function Listar_Estados_Ofertas_sin_Cerradas()
    {
    	// Las Cerradas se realizan automaticamente por un job que hay que crear en la database
    		return EstadosOfertas::select("estados_ofertas.id","estados_ofertas.nombre_estado_oferta")
    								->whereNotIn('estados_ofertas.id',array(2))
                                        ->get();                                
    }

	static public function Listar_Estados_Ofertas_Cerradas()
    {
    	// Las Cerradas se realizan automaticamente por un job que hay que crear en la database
    		return EstadosOfertas::select("estados_ofertas.id","estados_ofertas.nombre_estado_oferta")
    								->where('estados_ofertas.id',2)
                                        ->get();                                
    }    

}
