<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Servicio as Servicio;
use App\Models\Mes as Mes;
use App\Models\Anio as Anio;
use App\Models\Zona as Zona;
use App\Models\Orden as Orden;
use App\Models\Moneda as Moneda;
use App\Models\Proyecto as Proyecto;
use App\Models\Oferta as Oferta;
use App\Models\Departamento as Departamento;
use App\Models\Distrito as Distrito;
use App\Models\ProveedorServicio as ProveedorServicio;
use App\Models\OfertaComentarioEncuesta as OfertaComentarioEncuesta;
use App\Models\EstadoProyecto as EstadoProyecto;
use App\Models\TmpEncuestaPendienteCorreo as TmpEncuestaPendienteCorreo;
use Illuminate\Support\Facades\DB as DB;
use Input;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Facades\Auth as Auth;
use App\User as User;
use Mail;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function VerProveedor($id,request $request)
    {
        // $id : es el Codigo del Proveedor de la tabla : users ; campo: id.

        if ($request->ajax()) {

            $tipo = $_GET['tipo'];

            if ($tipo == 1) {
                
                $comentarios= OfertaComentarioEncuesta::Listar_Comentarios_x_Proveedor($id);
                return view('proveedor.comentarios-table',compact('comentarios'));    
            
            }

            if ($tipo == 2) {
                
                $ofertas= Oferta::Listar_Ofertas_Vigentes_Publicas($id);
                return view('proveedor.ofertas-table',compact('ofertas'));    
            
            }

            if ($tipo == 3) {
                
                $trabajos =Proyecto::Listar_Proyectos_x_Usuario_Cliente($id);
                return view('proveedor.trabajos-table',compact('trabajos'));    
            
            }

            
    
        }
        
        $proveedores  = User::Listar_Datos_Usuario($id);
        
        $departamentos = Departamento::listar_departamento_id($proveedores[0]->departamento_id);
        $distritos = Distrito::listar_distrito_id($proveedores[0]->distrito_id);
        $servicios =  ProveedorServicio::listar_servicios_proveedores($id);

        $comentarios= OfertaComentarioEncuesta::Listar_Comentarios_x_Proveedor($id);
        $ofertas = Oferta::Listar_Ofertas_Vigentes_Publicas($id);

        $trabajos =Proyecto::Listar_Proyectos_x_Usuario_Cliente($id);

        return view('proveedor.verproveedor',compact('comentarios','ofertas','trabajos','departamentos','distritos','servicios','proveedores'));




    }
    public function Servicios($id,Request $request)
    {
        //$id : Codigo de Servicio.

        if ($request->ajax()) {
            $proveedores = ProveedorServicio::listar_proveedores_x_servicios($id);
            return view('proveedor.verservicios-table',compact('proveedores'));
        }

        $proveedores = ProveedorServicio::listar_proveedores_x_servicios($id);


        $servicios =   Servicio::listar_codigo_servicio_nombre($id);
        return view('proveedor.verservicios',compact('proveedores','servicios'));

    }
    public function GestionarTrabajos(request $request)
    {

        if ($request->ajax()) {
            
            $proyectos = Proyecto::Listar_Proyectos_x_Usuario( Auth::user()->id);

            return view('trabajos.proyectostable',compact('proyectos'));
        }

        $servicios = Servicio::listar_servicios_sin_todos();
        $meses = Mes::Listar_Meses();
        $anios = Anio::Listar_Anios();

        $zonas_departamentos =  Zona::Listar_zonas_departamentos();
        $zonas_provincias =  Zona::Listar_zonas_provincias_x_departamento(1);
        $zonas_distritos =  Zona::Listar_zonas_distritos_x_provincia(2);

        $monedas = Moneda::Listar_Monedas();

        $proyectos = Proyecto::Listar_Proyectos_x_Usuario( Auth::user()->id);
        
        return view('trabajos.trabajos',compact('meses','anios','zonas_departamentos','zonas_provincias','zonas_distritos','monedas','proyectos'));

    }

    public function RegistrarTrabajos(Request $request)
    {

        $valores=array('titulo_proyecto' => $_POST['titulo_proyecto'], 
            'mes_id' => $_POST['mes_id'],
            'anio_id' => $_POST['anio_id'],
            'costo_proyecto' => $_POST['costo_proyecto'],
            'moneda_id' => $_POST['moneda_id'],
            'descripcion_proyecto' => $_POST['descripcion_proyecto'],
            'proyecto_id_departamento' => $_POST['proyecto_id_departamento'],
            'proyecto_id_provincia' => $_POST['proyecto_id_provincia'],
            'proyecto_id_distrito' => $_POST['proyecto_id_distrito'],
            'direccion_proyecto' => $_POST['direccion_proyecto'],
            'latitud' => $_POST['latitud'],
            'longitud' => $_POST['longitud'],
            'user_id' => Auth::user()->id
            );

        Proyecto::RegistrarProyecto($valores, $codigo_generado);

        // Subir Imagenes e Insertar en tabla

            $file = Input::file('imagen_principal');
            $image = Image::make(Input::file('imagen_principal'));
            $extension = strtolower($file->getClientOriginalExtension());
            $fileName = 'Proyecto-P-' . strval($codigo_generado) . '.' .$extension;
            $ruta_imagen= '/proyectos/' .$fileName;
            $ruta_imagen2= public_path('proyectos') . '/' .$fileName;
            $image->resize(400,250);
            $image->save($ruta_imagen2);

            // Insertar Registro.
            Proyecto::Registrar_Imagen_Proyecto($codigo_generado,$ruta_imagen,1);

            $file = Input::file('imagen_uno');
            $image = Image::make(Input::file('imagen_uno'));
            $extension = strtolower($file->getClientOriginalExtension());
            $fileName = 'Proyecto-S1-' . strval($codigo_generado) . '.' .$extension;
            $ruta_imagen= '/proyectos/' .$fileName;
            $ruta_imagen2= public_path('proyectos') . '/' .$fileName;
            $image->resize(400,250);
            $image->save($ruta_imagen2);

            Proyecto::Registrar_Imagen_Proyecto($codigo_generado,$ruta_imagen,0);


            $file = Input::file('imagen_dos');
            $image = Image::make(Input::file('imagen_dos'));
            $extension = strtolower($file->getClientOriginalExtension());
            $fileName = 'Proyecto-S2-' . strval($codigo_generado) . '.' .$extension;
            $ruta_imagen= '/proyectos/' .$fileName;
            $ruta_imagen2= public_path('proyectos') . '/' .$fileName;
            $image->resize(400,250);
            $image->save($ruta_imagen2);

            Proyecto::Registrar_Imagen_Proyecto($codigo_generado,$ruta_imagen,0);

            $valores = null;
            $file = null;
            $file = null;
            $image = null;
            $extension = null;
            $fileName = null;
            $ruta_imagen = null;
            $ruta_imagen2 = null;

            return redirect()->back()->with('status','El Proyecto ha sido registrado correctamente. El Codigo de Proyecto es el número : ' . strval($codigo_generado));

    }

    public function VerTrabajos($id)
    {   

        $proyectos = Proyecto::Listar_Proyecto_Ver_x_ID($id);
        $imagenes = Proyecto::Listar_Proyecto_Imagenes_x_ID($id);

        return view('trabajos.vertrabajos',compact('proyectos','imagenes'));

    }

    public function vertrabajoscliente($id)
    {   

        $proyectos = Proyecto::Listar_Proyecto_Ver_x_ID($id);
        $imagenes = Proyecto::Listar_Proyecto_Imagenes_x_ID($id);

        return view('proveedor.vertrabajoscliente',compact('proyectos','imagenes'));

    }

    public function EditarTrabajos($id)
    {

        $servicios = Servicio::listar_servicios_sin_todos();
        $meses = Mes::Listar_Meses();
        $anios = Anio::Listar_Anios();
        $proyectos = Proyecto::Listar_Proyecto_Ver_x_ID($id);
        $zonas_departamentos =  Zona::Listar_zonas_departamentos();
        $zonas_provincias =  Zona::Listar_zonas_provincias_x_departamento($proyectos[0]->proyecto_id_departamento);
        $zonas_distritos =  Zona::Listar_zonas_distritos_x_provincia($proyectos[0]->proyecto_id_provincia);

        $monedas = Moneda::Listar_Monedas();
        $imagenes = Proyecto::Listar_Proyecto_Imagenes_x_ID($id);
        

        $estados = EstadoProyecto::Listar_Estados_Proyectos();

        return view('trabajos.editartrabajos',compact('meses','anios','zonas_departamentos','zonas_provincias','zonas_distritos','monedas','proyectos','imagenes','estados'));

    }
    public function ActualizarTrabajos()
    {
        $codigo_proyecto = $_POST['codigo_proyecto'];

        $valores=array('titulo_proyecto' => $_POST['titulo_proyecto'], 
            'mes_id' => $_POST['mes_id'],
            'anio_id' => $_POST['anio_id'],
            'costo_proyecto' => $_POST['costo_proyecto'],
            'moneda_id' => $_POST['moneda_id'],
            'descripcion_proyecto' => $_POST['descripcion_proyecto'],
            'proyecto_id_departamento' => $_POST['proyecto_id_departamento'],
            'proyecto_id_provincia' => $_POST['proyecto_id_provincia'],
            'proyecto_id_distrito' => $_POST['proyecto_id_distrito'],
            'direccion_proyecto' => $_POST['direccion_proyecto'],
            'latitud' => $_POST['latitud'],
            'longitud' => $_POST['longitud'],
            'user_id' => Auth::user()->id,
            'estado_proyecto_id' => $_POST['estado_proyecto_id']
            );

        Proyecto::ActualizarProyecto($valores,$codigo_proyecto);
        
        $valores = null;
                
        return redirect()->action('ProveedorController@GestionarTrabajos')->with('status','El Proyecto ha sido registrado correctamente. El Codigo de Proyecto es el número : ' . strval($codigo_proyecto));

        $codigo_proyecto = null;

    }

    public function ConfirmarTrabajo($id)
    {
        //ID es el Codigo de Detalle.

        $datos = Orden::Listar_Datos_confirmar_Trabajo($id);

        return view('cotizacion.confirmartrabajo',compact('datos'));
    
    }

    public function RegistrarConfirmarTrabajo(Request $request)
    {

        //$data = $request->all();
        //var_dump($data);
        //return false;

        $valores=array('nConfirmarTrabajo' => 1); 
        
        $codigo_detalle_orden = $_POST['codigo_detalle_orden'];
        
        $codigo_orden = $_POST['codigo_orden'];

        $codigo_usuario_registro = $_POST['user_id']; 
        $codigo_oferta = $_POST['codigo_oferta'];
        $comprador_nombre = $_POST['comprador_nombre'];
        $comprador_email =  $_POST['email_comprador'];
        $comprador_apellidos = $_POST['apellidos_comprador'];
        $prov_razon_social = $_POST['prov_razon_social'];

        Orden::RegistrarTrabajoConfirmado($valores,$codigo_detalle_orden,$codigo_orden);

        $valores_envio_correo = array('Nombre' => $comprador_nombre,
                                      'Apellidos' => $comprador_apellidos,
                                      'email' => $comprador_email,
                                      'LinkEncuesta' => url('Ofertas/EncuestaCliente/'. strval($codigo_detalle_orden)),
                                      'prov_razon_social' => $prov_razon_social);

        Mail::send('emails.encuestaemail', $valores_envio_correo, function ($message) {
             $message->from(Config('mail.from.address'), Config('mail.from.name'));        
             $message->to($_POST['email_comprador'], $_POST['comprador_nombre']);
        
             $message->subject('Encuesta de Satisfacción al Cliente');
        
             $message->priority(3);
         });

        // TMP de Encuestas Pendientes para Alertas de Correos.

        $link_encuesta = url('Ofertas/EncuestaCliente/'. strval($codigo_detalle_orden));
        TmpEncuestaPendienteCorreo::Registrar_Tmp_Encuesta_Pendiente_Correo($codigo_detalle_orden,Config('mail.from.address'),Config('mail.from.name'),$comprador_email,$comprador_nombre,$comprador_apellidos,$prov_razon_social,$codigo_oferta,$codigo_usuario_registro,$link_encuesta);

        // Fin TMP de Encuestas.

        $codigo_oferta = null;
        $comprador_email = null;
        $comprador_apellidos = null;
        $comprador_email = null;
        $prov_razon_social =  null;
        $valores = null; 
        $codigo_detalle_orden  = null;
        $codigo_orden = null;
        $valores_envio_correo = null;


        return redirect()->route('cotizacion/proveedor')->with('status','La Confirmación del trabajo se ha registrado correctamente.');

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
