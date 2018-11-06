<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\EncuestaPregunta as EncuestaPregunta;
use Illuminate\Support\Facades\Auth as Auth;
use App\User as User;
use App\Models\TmpEncuestaPendienteCorreo as TmpEncuestaPendienteCorreo;
use App\Models\OfertaComentarioEncuesta as OfertaComentarioEncuesta; 
class EncuestaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function RegistrarEncuesta($id)
    {

        //$id : es el codigo de detalle de la orden el id.

        if (Auth::user()->users_tipos_id == 1) {
            
            if (TmpEncuestaPendienteCorreo::Usuario_Pertenece_Oferta_Encuesta($id,Auth::user()->email)) {
                
                $preguntas = EncuestaPregunta::ListarPreguntas();
                $cuestionarios = EncuestaPregunta::ListarCuestionario();

                $datos_temporales_encuestas=TmpEncuestaPendienteCorreo::Encuesta_Pendiente_X_Detalle_id($id);
                

                //var_dump($cuestionario);
                return view('encuesta.encuesta',compact('preguntas','cuestionarios','datos_temporales_encuestas'));
            
            } else {

                return view('errors.noacceso');    
            
            }            
        } else {
            
            return view('errors.noacceso');

        }
        

        
    }

    public function EnviarEncuesta(Request $request)
    {
        
        $data = $request->all();

        OfertaComentarioEncuesta::Registrar_Oferta_Comentarios($data,Auth::user()->id,Auth::user()->Nombres,Auth::user()->Apellidos,Auth::user()->email);
        
        $data =null;

        return redirect()->route('Encuestas/MisPendientes')->with('status','Se Registro la Encuesta de Satisfacción al Cliente Correctamente. Muchas Gracias.');

    }

    public function MisEncuestasPendientes(Request $request)
    {

        if ($request->ajax()) {
            $encuestas_pendientes = TmpEncuestaPendienteCorreo::Listar_Encuestas_Pendientes_x_Usuario(Auth::user()->id);    
            return view('encuesta.encuestas-pendientes-table',compact('encuestas_pendientes'));
        }
        
        $encuestas_pendientes = TmpEncuestaPendienteCorreo::Listar_Encuestas_Pendientes_x_Usuario(Auth::user()->id);

        return view('encuesta.listarencuestas',compact('encuestas_pendientes'));

    }

    public static function VerEncuestaClienteDefault($id)
    {
        $preguntas = EncuestaPregunta::ListarPreguntas();
        $cuestionarios = EncuestaPregunta::ListarCuestionario();
        $respuestas = OfertaComentarioEncuesta::Listar_Respuestas_Encuesta_Cliente($id);
        $encuestas = OfertaComentarioEncuesta::Listar_Descripcion_Comentario_Encuesta_Cliente($id);

        return view('encuesta.verencuestacliente',compact('preguntas','cuestionarios','respuestas','encuestas'));     
         

    }

    public static function VerEncuestaCliente($id)
    {
        //$id : Codigo autogenerado en la Tabla Encuesta

        $preguntas = EncuestaPregunta::ListarPreguntas();
        $cuestionarios = EncuestaPregunta::ListarCuestionario();
        $respuestas = OfertaComentarioEncuesta::Listar_Respuestas_Encuesta_Cliente($id);
        $encuestas = OfertaComentarioEncuesta::Listar_Descripcion_Comentario_Encuesta_Cliente($id);

        if (Auth::user()->email == $encuestas[0]->email) {

            return view('encuesta.verencuestacliente',compact('preguntas','cuestionarios','respuestas','encuestas'));     
         
         }
         else {
            return view('errors.noacceso');             
         }

    }

    public static function VerEncuestaClienteProveedor($id)
    {

        $preguntas = EncuestaPregunta::ListarPreguntas();
        $cuestionarios = EncuestaPregunta::ListarCuestionario();
        $respuestas = OfertaComentarioEncuesta::Listar_Respuestas_Encuesta_Cliente($id);
        $encuestas = OfertaComentarioEncuesta::Listar_Descripcion_Comentario_Encuesta_Cliente($id);

        if (Auth::user()->users_tipos_id == 2) {

            return view('encuesta.verencuestaclienteproveedor',compact('preguntas','cuestionarios','respuestas','encuestas'));     
         
         }
         else {
            return view('errors.noacceso');             
         }

    }
    public function MisCalificaciones(Request $request)
    {
        //Proveedores.
        
        if ($request->ajax()) {
            
            $comentarios = OfertaComentarioEncuesta::Listar_Comentarios_x_Proveedor(Auth::user()->id);

            return view('encuesta.calificaciones-table-proveedor',compact('comentarios'));    
        
        }


        if (Auth::user()->users_tipos_id == 2) {
            
            $comentarios = OfertaComentarioEncuesta::Listar_Comentarios_x_Proveedor(Auth::user()->id);

            return view('encuesta.listarencuestasproveedor',compact('comentarios'));    
        
        } else {
            return view('errors.noacceso');
        }

    }
    
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
