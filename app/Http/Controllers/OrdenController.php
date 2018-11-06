<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Orden as Orden;
use Illuminate\Support\Facades\Auth as Auth;

class OrdenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function MisCompras(Request $request)
    {

        //var_dump($request);
        // 1 REGISTRO
        // 2 EN ATENCION
        // 3 CERRADO
        // 4 ANULADO
        // 5 REGISTRO ENCUESTA
    
        if ($request->ajax()) {

            //$variable = $_GET['page'];
            $tipo = $_GET['tipo'];
            
            if ($tipo == 2) {
                    
                    $compras_atenciones=Orden::Listar_Ordenes_En_Atencion(Auth::user()->id);
                     return view('miscompras.compras-atencion-table',compact('compras_atenciones'));

            } else {
                if ($tipo == 3) {
                    
                    $compras_cerradas=Orden::Listar_Ordenes_Cerradas(Auth::user()->id);
                    return view('miscompras.compras-cerradas-table',compact('compras_cerradas'));

                } else {
                    if ($tipo == 4) {
                        $compras_anuladas=Orden::Listar_Ordenes_Anuladas(Auth::user()->id);
                        return view('miscompras.compras-anuladas-table',compact('compras_anuladas'));
                    } else {
                        $compras_encuestas=Orden::Listar_En_Encuesta(Auth::user()->id);
                        return view('miscompras.compras-encuesta-table',compact('compras_encuestas'));
                    }
                    
                }
                
            }
                      
        }

        $compras_atenciones=Orden::Listar_Ordenes_En_Atencion(Auth::user()->id);
        $compras_encuestas=Orden::Listar_En_Encuesta(Auth::user()->id);
        $compras_cerradas=Orden::Listar_Ordenes_Cerradas(Auth::user()->id);
        $compras_anuladas=Orden::Listar_Ordenes_Anuladas(Auth::user()->id);


        //var_dump($compras_atenciones);
        //var_dump($request->ajax());
 
        
        

        return view('miscompras.listarcompras',compact('compras_atenciones','compras_encuestas','compras_cerradas','compras_anuladas'));

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
