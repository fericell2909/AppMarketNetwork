<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
Use App\Models\Oferta as Oferta;
Use App\Models\OfertaDetalle as OfertaDetalle;
use App\Models\Restriccion as Restriccion;
use App\Models\OfertaComentarioEncuesta as OfertaComentarioEncuesta; 
use Illuminate\Support\Facades\Auth as Auth;

class OfertaClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function VerOfertaCliente($id)
    {
            //$id : Codigo de la Oferta.

           $ofertas = Oferta::Listar_Ofertas_Vigentes_x_ID($id);
 
           $ofertasdetalles = OfertaDetalle::Listar_Ofertas_Detalles_x_ID($id);

           $ofertasrestricciones = Restriccion::ListarRestricciones();

           $ofertas_comentarios =OfertaComentarioEncuesta::Listar_Comentarios_Oferta($id);

           return view('ofertacliente.verofertacliente',compact('ofertas','ofertasdetalles','ofertasrestricciones','ofertas_comentarios'));
        
    }

    public function MisComentarios(Request $request)
    {

        if ($request->ajax()) {
            
            $mis_comentarios = OfertaComentarioEncuesta::Listar_Comentarios_Usuario(Auth::user()->id);
            return view('ofertacliente.miscomentarios-table',compact('mis_comentarios'));                        
        
        }

        $mis_comentarios = OfertaComentarioEncuesta::Listar_Comentarios_Usuario(Auth::user()->id);
    

        return view('ofertacliente.miscomentarios',compact('mis_comentarios'));

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
