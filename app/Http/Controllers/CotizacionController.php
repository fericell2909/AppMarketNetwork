<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Categoria as Categoria;
use App\Models\Cotizacion as Cotizacion;
use App\Models\Servicio as Servicio;
use App\Models\Zona as Zona;
use App\Models\Orden as Orden;
use App\Models\TmpCotizacionCorreo as TmpCotizacionCorreo;
use App\Models\TiemposCotizacion as TiemposCotizacion;
use App\Models\CotizacionesComentarios as CotizacionesComentarios;
use Illuminate\Support\Facades\Auth as Auth;
use Illuminate\Support\Facades\DB as DB;
use Input;
use Intervention\Image\Facades\Image as Image;
class CotizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //echo date_create()->format('Y-m-d H:i:s'); 

        $cotizaciones = Cotizacion::ListarCotizacionesPaginadas(Auth::user()->id);

        if ($request->ajax())
        {
               
            return view('cotizacion.table',compact('cotizaciones'));

        } 

        $categorias = TiemposCotizacion::Listar_Tiempos_Cotizacion();
        $servicios = Servicio::listar_servicios_sin_todos();

        $zonas_departamentos =  Zona::Listar_zonas_departamentos();
        $zonas_provincias =  Zona::Listar_zonas_provincias_x_departamento(1);
        $zonas_distritos =  Zona::Listar_zonas_distritos_x_provincia(2);
        
        return view('cotizacion.cotizacion',compact('categorias','cotizaciones','servicios','zonas_departamentos','zonas_provincias','zonas_distritos'));
    }

    public function VerCotizacion($id)
    {
        

      $cotizaciones = Cotizacion::ListarCotizacion_x_Codigo($id);  
      
      return view('cotizacion.vercotizacion',compact('cotizaciones'));

    }

    public function getproveedor(Request $request)
    {

        $cotizaciones = Cotizacion::ListarCotizacionesProveedorPaginadas(Auth::user()->id,Auth::user()->prov_servicios_id);

        $cotizaciones_aceptadas = Orden::Listar_Ordenes_Cotizaciones_Aceptadas_X_Confirmar(Auth::user()->id);

        if ($request->ajax())
        {
               
            return view('cotizacion.table',compact('cotizaciones'));

        } 


        return view('cotizacion.cotizacionproveedor',compact('cotizaciones','cotizaciones_aceptadas'));


    }



    public function RegistrarCotizacion(Request $request)
    {

        //var_dump($request->all());

        //return false;

        $valores=array('titulo_cotizacion'=>$_POST['titulo_cotizacion'],
                    'descripcion_cotizacion' =>$_POST['descripcion_cotizacion'], 
                    'categoria_id'=>$_POST['servicio_id'],
                    'servicio_id'=>$_POST['servicio_id'],
                    'user_id'=>Auth::user()->id,
                    'tiempo_id' => $_POST['tiempo_id'],
                    'nombre_contacto_cotizacion' => $_POST['nombre_contacto_cotizacion'],
                    'apellido_contacto_cotizacion' => $_POST['apellido_contacto_cotizacion'],
                    'celular_contacto_cotizacion' => $_POST['celular_contacto_cotizacion'],
                    'email_contacto_cotizacion' => $_POST['email_contacto_cotizacion'],
                    'contacto_id_departamento' => $_POST['contacto_id_departamento'],
                    'contacto_id_provincia' => $_POST['contacto_id_provincia'],
                    'contacto_id_distrito' => $_POST['contacto_id_distrito'],
                    'direccion_cotizacion' => $_POST['direccion_cotizacion'],
                    'latitud' => $_POST['latitud'],
                    'longitud' => $_POST['longitud'],
                    'chk_adjuntar' => $_POST['chk_adjuntar'],
                    'cRutaArchivoAdjunto' => ''
          );
                
        //$data = $request->all();


        Cotizacion::RegistrarCotizacion($valores,$codigo_generado);

        if (intval($_POST['chk_adjuntar']) == 1) {
            
            $file = Input::file('archivo_adjunto');

            $image = Image::make(Input::file('archivo_adjunto'));

            $extension = strtolower($file->getClientOriginalExtension());

            $fileName = 'Cotizacion-' . strval($codigo_generado) . '.' .$extension;

            $ruta_imagen= '/cotizaciones/' .$fileName;

            $ruta_imagen2= public_path('cotizaciones') . '/' .$fileName;

            $image->resize(400,250);
            // Guardar
            $image->save($ruta_imagen2);

            Cotizacion::ActualizarRutaImagen($ruta_imagen,$codigo_generado);
        } 
        
        TmpCotizacionCorreo::Registrar_Tmp_Cotizacion_Correos($codigo_generado,$valores,Config('mail.from.address'), Config('mail.from.name'),Auth::user()->email,Auth::user()->Nombres,Auth::user()->Apellidos);


        Mail::send('emails.cotizacion', $valores, function ($message) {
             $message->from(Config('mail.from.address'), Config('mail.from.name'));        
             $message->to(Auth::user()->email, Auth::user()->Nombres);
        
             $message->subject('Registro de Cotizacion');
        
             $message->priority(3);
         });

        // Registrar en Tabla Temporal para Enviar Correos por Demonio a Proveedores

        $valores=null;
        $file = null;
        $image = null;
        $extension = null;
        $fileName = null;
        $ruta_imagen = null;
        $ruta_imagen2 = null;

        return redirect()->back()->with('status','La Cotizacion ha sido registrada correctamente. El Codigo de Cotización es el número : ' . strval($codigo_generado));
    }

    public function RegistrarComentariosCotizacion()
    {

        //$data = $request->all();
        //echo var_dump($data);

        if (!(isset($_POST['costo']))) 
        {       
            $_POST['costo'] = 0;
        }

        if (!(isset($_POST['fecha_vigencia_maxima']))) 
        {       
            $_POST['fecha_vigencia_maxima'] = '31/12/9999';
        }

        $valores=array('descripcion_comentario'=>$_POST['descripcion_comentario'],
                    'cotizaciones_id' =>$_POST['cotizaciones_id'], 
                    'users_tipos_id'=> Auth::user()->users_tipos_id,
                    'users_id'=> Auth::user()->id,
                    'costo'=> $_POST['costo'],
                    'fecha_vigencia_maxima'=> $_POST['fecha_vigencia_maxima']);

         try
         {
            DB::beginTransaction();
            
            CotizacionesComentarios::RegistrarComentariosCotizacion($valores);
       
        } catch(ValidationException $e)
        {
            DB::rollback();
            
             return redirect()->back()->with('errors','No se pudo realizar el registro del comentario.');
                
        
        } catch(Exception $e)
        {
            DB::rollback();

            return redirect()->back()->with('errors','No se pudo realizar el registro del comentario.');
        }
            DB::commit();
         return redirect()->back()->with('status','Se registro el comentario.');
    }

    public function ListarComentariosCotizacion()
    {
        $Id = $_POST['id'];
        //echo $Id;

        $comentarios = CotizacionesComentarios::ListarComentariosCotizacion($Id);
                
        return $comentarios;
    }

    public function ListarProvincias()
    {

        $Id = $_POST['id'];
        //echo $Id;

        $zonas_provincias =  Zona::Listar_zonas_provincias_x_departamento($Id);
                
        return $zonas_provincias;   
    }

    public function ListarDistritos()
    {
        $Id = $_POST['id'];
        //echo $Id;

        $zonas_distritos =  Zona::Listar_zonas_distritos_x_provincia($Id);
                
        return $zonas_distritos;   
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
