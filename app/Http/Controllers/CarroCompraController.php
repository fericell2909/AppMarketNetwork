<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth as Auth;
use App\Models\Orden as Orden;
use App\Models\OrdenDetalle as OrdenDetalle;
use App\Models\Oferta as Oferta;
use App\User as User;

class CarroCompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function PagarItems(Request $request)
    {

        $data = $request->all();
        var_dump($data);

        $resultado = Orden::PagarItems($data,Auth::user()->id,Auth::user()->email);

        if ($resultado) {
            

            return redirect()->route('/')->with('status','Se realizo el pago de la orden correctamente.');

        } else {
            return redirect()->route('/')->with('errors','Ha ocurrido un Error. Comuniquese con Soporte.');
        }
        

    }

    public function ListarItems()
    {

        if (Auth::user()->nTotalItemCarritoCompra > 0 ) {
               
                $ofertaspublicas = "";
                $OrdenesItems = Orden::Listar_Ofertas_Orden(Auth::user()->id);

            }
            else
            {
                 $ofertaspublicas = Oferta::Listar_Ofertas_Publicas();
                 $OrdenesItems = "";
            }            

        return view('carrocompra.listarItems',compact('ofertaspublicas','OrdenesItems'));


    }

    public function AgregarItems($id)
    {
        // $id es el codigo de la oferta.

        $bResultado = Orden::RegistraOrden($id,Auth::user()->id,Auth::user()->nTotalItemCarritoCompra);

        
        if ($bResultado) {
            
            // $cantidadItems = User::RetornaCantidadTotalCarritoCompra(Auth::user()->id);

            // if ($cantidadItems[0]->nTotalItemCarritoCompra > 0 ) {
            //     $ofertaspublicas = "";
            //     $OrdenesItems = Orden::Listar_Ofertas_Orden(Auth::user()->id);
            // }
            // else
            // {
            //     $ofertaspublicas = Oferta::Listar_Ofertas_Publicas();
            //     $OrdenesItems = "";
            // }            

            // $cantidadItems =   null;    
            // // $ofertaspublicas = Oferta::Listar_Ofertas_Publicas();
            // // $OrdenesItems = Orden::Listar_Ofertas_Orden(Auth::user()->id);


            // return view('carrocompra.listarItems',compact('ofertaspublicas','OrdenesItems'));

            return redirect()->route('CarroCompra/Revisar');
        
        }
        else
        {
            return redirect()->back()->with('errors','No se ha podido Registrar la Orden, del Codigo de la Oferta : ' . strval($id) . " .Comuniquese con Soporte.");
        }

    }

    public function EliminarItems($id)
    {
        //$id es el codigo de detalle de la tabla : ordenes_detalles

        $bresultado = OrdenDetalle::EliminarItems($id,Auth::user()->id,Auth::user()->nTotalItemCarritoCompra);

        if ( $bresultado) {
            //  $cantidadItems = User::RetornaCantidadTotalCarritoCompra(Auth::user()->id);
            // if ($cantidadItems[0]->nTotalItemCarritoCompra > 0  ) {
            //     $ofertaspublicas = "";
            //     $OrdenesItems = Orden::Listar_Ofertas_Orden(Auth::user()->id);
            // }
            // else
            // {
            //     $ofertaspublicas = Oferta::Listar_Ofertas_Publicas();
            //     $OrdenesItems = "";
            // }            
            // $ofertaspublicas = Oferta::Listar_Ofertas_Publicas();
            // $OrdenesItems = Orden::Listar_Ofertas_Orden(Auth::user()->id);
           // return view('carrocompra.listarItems',compact('ofertaspublicas','OrdenesItems'));
            return redirect()->route('CarroCompra/Revisar');
        
        }
        else
        {
            return redirect()->back()->with('errors','No se ha podido Eliminar la Oferta del Carrito de Compra, del Codigo de ordenes_detalles : ' . strval($id) . " .Comuniquese con Soporte.");
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
