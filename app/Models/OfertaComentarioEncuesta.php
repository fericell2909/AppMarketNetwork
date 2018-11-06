<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB as DB;
use App\Models\OfertaComentarioEncuestaRespuesta as OfertaComentarioEncuestaRespuesta;
use App\Models\EncuestaPregunta as EncuestaPregunta;
use App\Models\EncuestaPreguntaOpciones as EncuestaPreguntaOpciones;
use App\Models\Orden as Orden; 
use App\Models\Oferta as Oferta;
use App\Models\TmpEncuestaPendienteCorreo as TmpEncuestaPendienteCorreo;
use App\User as User;

class OfertaComentarioEncuesta extends Model
{
    protected $table = 'ofertas_comentarios_encuesta';
    public $primarykey = 'id';




    static public function Listar_Comentarios_x_Proveedor($codigo_proveedor)
    {

         return OfertaComentarioEncuesta::select(
                                            'ofertas_comentarios_encuesta.users_id',
                                            'ofertas_comentarios_encuesta.Nombres',
                                            'ofertas_comentarios_encuesta.Apellidos',
                                            'ofertas_comentarios_encuesta.email',
                                            'ofertas_comentarios_encuesta.oferta_id',
                                            'ofertas_comentarios_encuesta.titulo_oferta',
                                            'ofertas_comentarios_encuesta.proveedor_id',    
                                            'ofertas_comentarios_encuesta.prov_razon_social',
                                            'ofertas_comentarios_encuesta.descripcion_comentario',
                                            'ofertas_comentarios_encuesta.fecha_encuesta',
                                            'ofertas_comentarios_encuesta.puntaje',
                                            'ofertas_comentarios_encuesta.promedio',
                                            'ofertas_comentarios_encuesta.calificacionestrella',
                                            'ofertas_comentarios_encuesta.id')
                                        ->where('ofertas_comentarios_encuesta.proveedor_id',$codigo_proveedor)
                                        ->orderBy('ofertas_comentarios_encuesta.id','DESC')
                                        ->paginate(8);

    }

    static public function Listar_Respuestas_Encuesta_Cliente($codigo_encuesta)
    {
        return OfertaComentarioEncuestaRespuesta::select('ofertas_comentarios_encuesta_respuestas.codigo_pregunta',
                                                        'ofertas_comentarios_encuesta_respuestas.codigo_respuesta',
                                                        'ofertas_comentarios_encuesta_respuestas.puntaje_pregunta')
                                                  ->where('ofertas_comentarios_encuesta_respuestas.comentario_id',$codigo_encuesta)
                                                  ->get();
    }

    static public function Listar_Descripcion_Comentario_Encuesta_Cliente($codigo_encuesta)
    {
        return OfertaComentarioEncuesta::select('ofertas_comentarios_encuesta.descripcion_comentario',
                                                        'ofertas_comentarios_encuesta.email'
                                                )
                                        ->where('ofertas_comentarios_encuesta.id',$codigo_encuesta)
                                        ->get();
    }

    static public function Listar_Comentarios_Usuario($codigo_usuario)
    {

        return OfertaComentarioEncuesta::select(
                                            'ofertas_comentarios_encuesta.users_id',
                                            'ofertas_comentarios_encuesta.Nombres',
                                            'ofertas_comentarios_encuesta.Apellidos',
                                            'ofertas_comentarios_encuesta.email',
                                            'ofertas_comentarios_encuesta.oferta_id',
                                            'ofertas_comentarios_encuesta.titulo_oferta',
                                            'ofertas_comentarios_encuesta.proveedor_id',    
                                            'ofertas_comentarios_encuesta.prov_razon_social',
                                            'ofertas_comentarios_encuesta.descripcion_comentario',
                                            'ofertas_comentarios_encuesta.fecha_encuesta',
                                            'ofertas_comentarios_encuesta.puntaje',
                                            'ofertas_comentarios_encuesta.promedio',
                                            'ofertas_comentarios_encuesta.calificacionestrella',
                                            'ofertas_comentarios_encuesta.id')
                                        ->where('ofertas_comentarios_encuesta.users_id',$codigo_usuario)
                                        ->orderBy('ofertas_comentarios_encuesta.id','DESC')
                                        ->paginate(10);

    }

    static public function Listar_Comentarios_Oferta($codigo_oferta)
    {

        return OfertaComentarioEncuesta::select(
                                            'ofertas_comentarios_encuesta.users_id',
                                            'ofertas_comentarios_encuesta.Nombres',
                                            'ofertas_comentarios_encuesta.Apellidos',
                                            'ofertas_comentarios_encuesta.email',
                                            'ofertas_comentarios_encuesta.oferta_id',
                                            'ofertas_comentarios_encuesta.titulo_oferta',
                                            'ofertas_comentarios_encuesta.proveedor_id',    
                                            'ofertas_comentarios_encuesta.prov_razon_social',
                                            'ofertas_comentarios_encuesta.descripcion_comentario',
                                            'ofertas_comentarios_encuesta.fecha_encuesta',
                                            'ofertas_comentarios_encuesta.puntaje',
                                            'ofertas_comentarios_encuesta.promedio',
                                            'ofertas_comentarios_encuesta.calificacionestrella',
                                            'ofertas_comentarios_encuesta.id')
                                        ->where('ofertas_comentarios_encuesta.oferta_id',$codigo_oferta)
                                        ->orderBy('ofertas_comentarios_encuesta.id','DESC')
                                        ->get();
    }

    static public function Registrar_Oferta_Comentarios($data,$usuario_codigo,$usuario_nombre,$usuario_apellidos,$usuario_email)
    {

    	$codigo_generado = DB::table('ofertas_comentarios_encuesta')->insertGetId(
			     			[
			     				'users_id' => $usuario_codigo,
								'Nombres' => $usuario_nombre, 
								'Apellidos' => $usuario_apellidos,
								'email' => $usuario_email,
								'oferta_id' => $data['oferta_id'],
								'titulo_oferta' => $data['titulo_oferta'],
								'proveedor_id' => $data['proveedor_id'],
								'prov_razon_social' => $data['prov_razon_social'],
								'descripcion_comentario' => $data['comentario_servicio'],
								'fecha_encuesta' => date_create()->format('Y-m-d H:i:s'),
					 			'created_at' =>  date_create()->format('Y-m-d H:i:s'),
					 			'updated_at' =>  date_create()->format('Y-m-d H:i:s')
		 				]);

    	$cantidad_preguntas = $data['numeropreguntas'];
    	$codigo_oferta = $data['oferta_id'];
    	$ordenes_detalles_id = $data['ordenes_detalles_id'];
    	$codigo_proveedor = $data['proveedor_id'];

    	$puntaje_total = 0;

    	for ($i=1; $i <= $cantidad_preguntas; $i++) { 
			
			$encuestas_respuestas = new OfertaComentarioEncuestaRespuesta();

			$encuestas_respuestas->comentario_id = $codigo_generado;
			$encuestas_respuestas->codigo_pregunta = $i;
			$encuestas_respuestas->codigo_respuesta = $data[$i];

			if (EncuestaPregunta::Es_Contabilizable_para_puntaje($i) == 1) {
				
				$valor = EncuestaPreguntaOpciones::Devuelve_Valor_Puntaje_Opcion($data[$i],$i);
				$encuestas_respuestas->puntaje_pregunta = $valor;

			} else {
				$valor = 0;
				$encuestas_respuestas->puntaje_pregunta = $valor;
			}

			$puntaje_total = $puntaje_total + $valor;

			$encuestas_respuestas->save();

    	}

    	$encuestas_respuestas =  null;

    	$calificacionestrella = EncuestaPregunta::Devuelve_CalificacionEstrella($puntaje_total);
    	$promedio = EncuestaPregunta::Devuelve_Puntaje_x_CalificacionEstrella($calificacionestrella);
    	
    	$valores =array('puntaje' => $puntaje_total,
    						'promedio' => $promedio,
    						'calificacionestrella' => $calificacionestrella);

    	$promedio = null;

    	// Actualizando Campos de la Tabla.

    	OfertaComentarioEncuesta::where('id',$codigo_generado)
    							  ->update($valores);
    	
    	//Actualiza bRealizoEncuesta y de ser el caso el Estado a Cerrado
		Orden::Actualizar_Orden_Encuesta_Realizada($ordenes_detalles_id);

		
        // Comentarios Totales del Proveedor.

    	$comentarios = Oferta::select('ofertas.total_comentarios')
    									->where('id',$codigo_oferta)
    									->get();


        $total_comentarios_oferta = $comentarios[0]->total_comentarios + 1;
        
        // Calificacion de Esta Oferta.

        $puntaje_oferta = OfertaComentarioEncuesta::select(DB::raw("sum(promedio) as promedio"))
                                        ->where('ofertas_comentarios_encuesta.oferta_id',$codigo_oferta)
                                        ->get();
        //

        $total_puntaje_oferta =  $puntaje_oferta[0]->promedio;

        $puntaje_oferta = null;                               

        $comentarios = null;

        // ratio_oferta
        $ratio_oferta = round(( $total_puntaje_oferta / ($total_comentarios_oferta * 1)) ,0,PHP_ROUND_HALF_UP);

        $calificacion_estrella_oferta = '';

        if ($ratio_oferta == 5) {
            
            $calificacion_estrella_oferta = 'A';
        
        } else {

                    if ($ratio_oferta == 4) {

                        $calificacion_estrella_oferta = 'B';
                    } 
                    else 
                    {
                        if ($ratio_oferta == 3) {

                            $calificacion_estrella_oferta = 'C';
                        
                        } else {
                            if ($ratio_oferta == 2) {

                                $calificacion_estrella_oferta = 'D';
                            
                            } else {

                                $calificacion_estrella_oferta = 'E';

                            }
                            
                        }
                        
                    }
                        
                }




        $comentarios_generales =  Oferta::select(DB::raw("sum(total_comentarios) as total_comentarios"))
                                        ->where('ofertas.user_id',$codigo_proveedor)
                                        ->get();
        
        $total_comentarios_generales = $comentarios_generales[0]->total_comentarios + 1;                                        

        $comentarios_generales = null;

    	$puntaje_proveedor = OfertaComentarioEncuesta::select(DB::raw("sum(promedio) as puntaje"))
    													  ->where('ofertas_comentarios_encuesta.proveedor_id',$codigo_proveedor)
    													  ->get();

		$total_puntaje = $puntaje_proveedor[0]->puntaje;

		$puntaje_proveedor = null;

		$ratio = round(( $total_puntaje / ($total_comentarios_generales * 1)) ,0,PHP_ROUND_HALF_UP);

		$calificacion_proveedor = '';

		if ($ratio == 5) {
            
            $calificacion_proveedor = 'A';
        
        } else {

                    if ($ratio == 4) {

                        $calificacion_proveedor = 'B';
                    } 
                    else 
                    {
                        if ($ratio == 3) {

                            $calificacion_proveedor = 'C';
                        
                        } else {
                            if ($ratio == 2) {

                                $calificacion_proveedor = 'D';
                            
                            } else {

                                $calificacion_proveedor = 'E';

                            }
                            
                        }
                        
                    }
                        
                }

        // Actualizar Calificacion de Oferta.

        $valores_oferta = array('total_comentarios'=> $total_comentarios_oferta, 'calificacion_oferta'=>$calificacion_estrella_oferta,'ratio' => $ratio_oferta);
		
        Oferta::where('id',$codigo_oferta)
    			 ->update($valores_oferta);

    	$valores_oferta = null;
    	$total_comentarios_oferta = null;
    	$calificacionestrella = null;
    	$codigo_oferta = null;

    	// Actualizar Ratio y Calificacion del Proveedor.

    	$user_valores_update = array( 'ratio' => $ratio,
        							  'prov_calificacion' => $calificacion_proveedor);

    	User::where('id',$codigo_proveedor)
    		  ->update($user_valores_update);

		$ratio = null;
		$calificacion_proveedor = null;
		$codigo_proveedor = null;
		$user_valores_update = null;

		$tmp_pendiente_valores = array('nRealizoEncuesta' => 1);

		TmpEncuestaPendienteCorreo::where('ordenes_detalles_id',$ordenes_detalles_id)
									->update($tmp_pendiente_valores);

		$ordenes_detalles_id = null;
		$tmp_pendiente_valores = null;
        $calificacion_estrella_oferta = null;		
        $ratio_oferta = null;
    }
}
