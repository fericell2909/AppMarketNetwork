<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EncuestaPregunta extends Model
{
   protected $table = 'encuesta_preguntas';
    public $primarykey = 'id';
    protected $hidden = ['created_at', 'updated_at'];

     public function opciones()
        {
            return $this->hasMany('App\Models\EncuestaPreguntaOpciones','pregunta_id');
        }

     public static function ListarCuestionario()
     {
     	return EncuestaPregunta::select('encuesta_preguntas.id','encuesta_preguntas.titulo_pregunta','encuesta_preguntas_opciones.CodigoOpcion','encuesta_preguntas_opciones.titulo_opcion')
     							 ->join('encuesta_preguntas_opciones','encuesta_preguntas.id','=','encuesta_preguntas_opciones.pregunta_id')
     							->where('encuesta_preguntas.nEstado',1)->get();

     }

     public static function ListarPreguntas()
     {

     	return EncuestaPregunta::select('encuesta_preguntas.id','encuesta_preguntas.titulo_pregunta')
								->where('encuesta_preguntas.nEstado',1)->get();     		
     }

      public static function  Es_Contabilizable_para_puntaje($codigo_pregunta)
     {

        $valor_dato_pregunta =  EncuestaPregunta::select('encuesta_preguntas.nConsiderarPuntaje')
                                ->where('encuesta_preguntas.id',$codigo_pregunta)->get();

     
        if (COUNT($valor_dato_pregunta) > 0) {
            
            if ($valor_dato_pregunta[0]->nConsiderarPuntaje == 1) {
                return 1;
            } else {
                return 0;
            }
            

        } else {
            return 0;
        }
        

     }

     public static function Devuelve_Puntaje_x_CalificacionEstrella($calificacion_estrella)
     {
         if ($calificacion_estrella == 'A') {
            
            return 5;
        
        } else {

                    if ($calificacion_estrella == 'B') {

                        return 4;
                    } 
                    else 
                    {
                        if ($calificacion_estrella == 'C') {
                            
                            return 3;

                        } else {
                            if ($calificacion_estrella == 'D') {

                                return 2;

                            } else {

                                return 1;
                            }
                            
                        }
                        
                    }
                        
                }


     }

     public static function Devuelve_CalificacionEstrella($Total_Puntaje)
    {

        // if ($Total_Puntaje <= 0) {
        //     return 'E';
        // }
        
        $cantidad_preguntas_puntaje =   EncuestaPregunta::select('encuesta_preguntas.nConsiderarPuntaje')
                                                            ->where('encuesta_preguntas.nEstado',1)
                                                            ->where('encuesta_preguntas.nConsiderarPuntaje',1)
                                                            ->get();

        $cantidad = COUNT($cantidad_preguntas_puntaje);
        
        $cantidad_preguntas_puntaje = null;                                                                     
        
        $puntaje_minimo = $cantidad * 1;

        $valor_resultado = round( ($Total_Puntaje / $puntaje_minimo),0,PHP_ROUND_HALF_UP);


        if ($valor_resultado == 1) {

            $cantidad_preguntas_puntaje = null;
            $puntaje_minimo = null;
            $valor_resultado = null;
            
            return 'E';
        
        } else {

                    if ($valor_resultado == 2) {
                        
                        $cantidad_preguntas_puntaje = null;
                        $puntaje_minimo = null;
                        $valor_resultado = null;

                        return 'D';
                    } 
                    else 
                    {
                        if ($valor_resultado == 3) {
                            $cantidad_preguntas_puntaje = null;
                            $puntaje_minimo = null;
                            $valor_resultado = null;
                            return 'C';
                        } else {
                            if ($valor_resultado == 4) {
                                $cantidad_preguntas_puntaje = null;
                                $puntaje_minimo = null;
                                $valor_resultado = null;
                                return 'B';
                            } else {
                                $cantidad_preguntas_puntaje = null;
                                $puntaje_minimo = null;
                                $valor_resultado = null;
                                return 'A';
                            }
                            
                        }
                        
                    }
                        
                }

    }

}
