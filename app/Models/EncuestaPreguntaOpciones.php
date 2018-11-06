<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EncuestaPreguntaOpciones extends Model
{
	protected $table = 'encuesta_preguntas_opciones';
    public $primarykey = 'id';
    protected $hidden = ['created_at', 'updated_at'];

    static public function Devuelve_Valor_Puntaje_Opcion($codigo_opcion,$codigo_pregunta)
    {

    	$valor_puntaje = EncuestaPreguntaOpciones::select('encuesta_preguntas_opciones.nValorPuntaje')
    											  ->where('encuesta_preguntas_opciones.pregunta_id',$codigo_pregunta)
    											  ->where('encuesta_preguntas_opciones.CodigoOpcion',$codigo_opcion)
    											  ->get();

    
		if ( COUNT($valor_puntaje) > 0 ) 
		{
		    return $valor_puntaje[0]->nValorPuntaje;
		} 

		else 
		
		{

			return 0;
		}


    }

}
