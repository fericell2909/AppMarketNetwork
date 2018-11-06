<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\MOdels\Categoria as Categoria;
use App\MOdels\Servicio as Servicio;
use App\Models\TiposOfertas as TiposOfertas;
use App\Models\Oferta as Oferta;
use App\Models\Moneda as Moneda;
use App\Models\Cotizacion as Cotizacion;
Use App\Models\OfertaDetalle as OfertaDetalle;
use App\Models\OfertaPrivada as OfertaPrivada;
use App\Models\EstadosOfertas as EstadosOfertas;

use Illuminate\Support\Facades\Auth as Auth;
use App\User as User;
use Input;
use Intervention\Image\Facades\Image as Image;

class OfertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function VerOfertasCerradas($id)
    {
        $servicios =  Servicio::listar_servicios_sin_todos();
       
       $monedas = Moneda::Listar_Monedas();

       $ofertas = Oferta::Listar_Ofertas_Cerradas_x_ID($id);
 
       $ofertasdetalles = OfertaDetalle::Listar_Ofertas_Detalles_x_ID($id);
        
       
       $estadosOfertas = EstadosOfertas::Listar_Estados_Ofertas_Cerradas();

        $codigo_cotizacion = OfertaPrivada::Devuelve_Codigo_Cotizacion_X_Oferta_X_Usuario($id,Auth::user()->id);
        //var_dump($codigo_cotizacion);
       
        $tipoofertas = TiposOfertas::Listar_Tipos_Ofertas_x_ID($ofertas[0]->nTipo_Oferta);

       // Es Oferta Privada : 2 

        if ( $ofertas[0]->nTipo_Oferta == 2 ) {
               
            $cotizacionusuarios = Cotizacion::ListarDatosUsuario_x_Cotizacion($codigo_cotizacion[0]->cotizaciones_id);

       }
       else
       {
            $cotizacionusuarios = "";        
       }

       return view('ofertas.verofertascerradas',compact('servicios','tipoofertas','monedas','ofertas','ofertasdetalles','estadosOfertas','cotizacionusuarios'));


    }

    public function VerOfertasAnuladas($id)
    {


       $servicios =  Servicio::listar_servicios_sin_todos();
       
       $monedas = Moneda::Listar_Monedas();

       $ofertas = Oferta::Listar_Ofertas_Anuladas_x_ID($id);
 
       $ofertasdetalles = OfertaDetalle::Listar_Ofertas_Detalles_x_ID($id);
        
       
       $estadosOfertas = EstadosOfertas::Listar_Estados_Ofertas_sin_Cerradas();

        $codigo_cotizacion = OfertaPrivada::Devuelve_Codigo_Cotizacion_X_Oferta_X_Usuario($id,Auth::user()->id);
        //var_dump($codigo_cotizacion);
       
        $tipoofertas = TiposOfertas::Listar_Tipos_Ofertas_x_ID($ofertas[0]->nTipo_Oferta);

       // Es Oferta Privada : 2 

        if ( $ofertas[0]->nTipo_Oferta == 2 ) {
               
            $cotizacionusuarios = Cotizacion::ListarDatosUsuario_x_Cotizacion($codigo_cotizacion[0]->cotizaciones_id);

       }
       else
       {
            $cotizacionusuarios = "";        
       }

       return view('ofertas.verofertasanuladas',compact('servicios','tipoofertas','monedas','ofertas','ofertasdetalles','estadosOfertas','cotizacionusuarios'));
    }
    public function VerOfertasVigentes($id)
     {

        // $id :  codigo de la oferta; 

       $servicios =  Servicio::listar_servicios_sin_todos();
       
       $monedas = Moneda::Listar_Monedas();

       $ofertas = Oferta::Listar_Ofertas_Vigentes_x_ID($id);
 
       $ofertasdetalles = OfertaDetalle::Listar_Ofertas_Detalles_x_ID($id);
        
       

       $estadosOfertas = EstadosOfertas::Listar_Estados_Ofertas_sin_Cerradas();

        $codigo_cotizacion = OfertaPrivada::Devuelve_Codigo_Cotizacion_X_Oferta_X_Usuario($id,Auth::user()->id);
        //var_dump($codigo_cotizacion);
       
        $tipoofertas = TiposOfertas::Listar_Tipos_Ofertas_x_ID($ofertas[0]->nTipo_Oferta);

       // Es Oferta Privada : 2 

        if ( $ofertas[0]->nTipo_Oferta == 2 ) {
               
            $cotizacionusuarios = Cotizacion::ListarDatosUsuario_x_Cotizacion($codigo_cotizacion[0]->cotizaciones_id);

       }
       else
       {
            $cotizacionusuarios = "";        
       }

       return view('ofertas.verofertasvigentes',compact('servicios','tipoofertas','monedas','ofertas','ofertasdetalles','estadosOfertas','cotizacionusuarios'));
    
    }

    public function EditarOfertasVigentes($id)
    {

        // $id :  codigo de la oferta; 

       $servicios =  Servicio::listar_servicios_sin_todos();
       
       $monedas = Moneda::Listar_Monedas();

       $ofertas = Oferta::Listar_Ofertas_Vigentes_x_ID($id);
 
       $ofertasdetalles = OfertaDetalle::Listar_Ofertas_Detalles_x_ID($id);

       $estadosOfertas = EstadosOfertas::Listar_Estados_Ofertas_sin_Cerradas();

        $codigo_cotizacion = OfertaPrivada::Devuelve_Codigo_Cotizacion_X_Oferta_X_Usuario($id,Auth::user()->id);
        //var_dump($codigo_cotizacion);
       
        $tipoofertas = TiposOfertas::Listar_Tipos_Ofertas_x_ID($ofertas[0]->nTipo_Oferta);

       // Es Oferta Privada : 2 

        if ( $ofertas[0]->nTipo_Oferta == 2 ) {
               
            $cotizacionusuarios = Cotizacion::ListarDatosUsuario_x_Cotizacion($codigo_cotizacion[0]->cotizaciones_id);

       }
       else
       {
            $cotizacionusuarios = "";        
       }

       return view('ofertas.editarofertas',compact('servicios','tipoofertas','monedas','ofertas','ofertasdetalles','estadosOfertas','cotizacionusuarios'));
    
    }


    public function GestionarOfertas($id = 0)
    {

       $servicios =  Servicio::listar_servicios_sin_todos();

       $tipoofertas = TiposOfertas::Listar_Tipos_Ofertas();
       $monedas = Moneda::Listar_Monedas();
        
        // Oferta Privada
       // Este Id es el codigo de la cotización.
       
       if ($id > 0) {
               
            $cotizacionusuarios = Cotizacion::ListarDatosUsuario_x_Cotizacion($id);

       }
       else
       {
            $cotizacionusuarios = "";        
       }

       return view('ofertas.gestionofertas',compact('servicios','tipoofertas','monedas','id','cotizacionusuarios'));

    }

    public function ListarOfertasVigentes(Request $request)
    {
        $ofertasvigentes = Oferta::Listar_Ofertas_Vigentes(Auth::user()->id);


         if ($request->ajax())
        {
               
            return view('ofertas.vigente-table',compact('ofertasvigentes'));

        } 

        return view('ofertas.listarofertasvigentes',compact('ofertasvigentes'));

    }

    public function ListarOfertasAnuladas(Request $request)
    {
        $ofertasanuladas = Oferta::Listar_Ofertas_Anuladas(Auth::user()->id);

        if ($request->ajax())
        {
               
            return view('ofertas.anuladas-table',compact('ofertasanuladas'));

        } 

        return view('ofertas.listarofertasanuladas',compact('ofertasanuladas'));

    }
    
    public function ListarOfertasCerradas(Request $request)
    {

        $ofertascerradas = Oferta::Listar_Ofertas_Cerradas(Auth::user()->id);

        if ($request->ajax())
        {
               
            return view('ofertas.cerradas-table',compact('ofertascerradas'));

        } 

        return view('ofertas.listarofertascerradas',compact('ofertascerradas'));

    }


    public function PostEditarOfertasVigentes(Request $request)
    {
        
        $data = $request->all();   

        //var_dump($data);

        $bresultadoOferta = Oferta::EditarOferta($data,Auth::user()->prov_razon_social,Auth::user()->id);

        if ($bresultadoOferta) {
             
            //return redirect()->back()->with('status','La Oferta se ha actualizado correctamente');

            return redirect()->route('Ofertas/ListarOfertasVigentes')->with('status','La Oferta se ha actualizado correctamente');

         } 
         else
         {
             return redirect()->route('Ofertas/ListarOfertasVigentes')->with('status','La Oferta NO se ha actualizado correctamente');

         }

    }

    public function RegistrarOfertas(Request $request)
    {
        // $data = $request->all(); 

        // $bresultadoOferta = Oferta::RegistrarOferta($data,Auth::user()->prov_razon_social,Auth::user()->id,$codigo_generado);

        // $file = Input::file('files');



        // $extension = strtolower($file->getClientOriginalExtension());
        // $fileName = 'Ofertas-' . strval($codigo_generado) . '.' .$extension;

        // $file->move('ofertas',$fileName);

        // $ruta_imagen= '/ofertas/' .$fileName;

        // $bresultadoactualizacion =  Oferta::ActualizarRutaImagenOferta($ruta_imagen,$codigo_generado);
        
        // $tipo_oferta = $data['nTipo_Oferta'];// publica o privada  ; 1:PUBLICA; 2:PRIVADA

        // if ($tipo_oferta == 2) {

        //     $users_id = $data['usersid'];
        //     $cotizaciones_id = $data['cotizacionid'];

        //     $bresultadoactualizacion = OfertaPrivada::RegistarOfertaPrivada($codigo_generado,$users_id,$cotizaciones_id);

        // }


        // $bresultadoOferta =  null;
        // $file =  null;
        // $extension =  null;
        // $ruta_imagen =  null; 
        // $tipo_oferta =  null;
        // $users_id = null;
        // $cotizaciones_id = null;

        // if ($bresultadoactualizacion) {
             
        //     return redirect()->back()->with('status','La Oferta con codigo : ' .strval($codigo_generado) . ' se ha registrado correctamente.');
        //  } 
        //  else
        //  {
        //     return redirect()->back()->with('errors','La Oferta no ha sido registrada correctamente.');
        //  }

      $data = $request->all(); 

        $bresultadoOferta = Oferta::RegistrarOferta($data,Auth::user()->prov_razon_social,Auth::user()->id,$codigo_generado);

        $file = Input::file('files');

        $image = Image::make(Input::file('files'));

        $extension = strtolower($file->getClientOriginalExtension());
        $fileName = 'Ofertas-' . strval($codigo_generado) . '.' .$extension;

        //$file->move('ofertas',$fileName);

        $ruta_imagen= '/ofertas/' .$fileName;

        $ruta_imagen2= public_path('ofertas') . '/' .$fileName;

        $image->resize(400,250);
        // Guardar
        $image->save($ruta_imagen2);

        $bresultadoactualizacion =  Oferta::ActualizarRutaImagenOferta($ruta_imagen,$codigo_generado);
        
        $tipo_oferta = $data['nTipo_Oferta'];// publica o privada  ; 1:PUBLICA; 2:PRIVADA

        if ($tipo_oferta == 2) {

            $users_id = $data['usersid'];
            $cotizaciones_id = $data['cotizacionid'];

            $bresultadoactualizacion = OfertaPrivada::RegistarOfertaPrivada($codigo_generado,$users_id,$cotizaciones_id);

        }


        $bresultadoOferta =  null;
        $file =  null;
        $extension =  null;
        $ruta_imagen =  null; 
        $tipo_oferta =  null;
        $users_id = null;
        $cotizaciones_id = null;

        if ($bresultadoactualizacion) {
             
            return redirect()->back()->with('status','La Oferta con codigo : ' .strval($codigo_generado) . ' se ha registrado correctamente.');
         } 
         else
         {
            return redirect()->back()->with('errors','La Oferta no ha sido registrada correctamente.');
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
