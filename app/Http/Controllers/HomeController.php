<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Oferta as Oferta;
use App\Models\OfertaPrivada as OfertaPrivada;
use App\Models\Servicio as Servicio;

class HomeController extends Controller
{
    // public function __construct() {
    //     $this->middleware('auth');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return \View::make('home');
    }

    public function getInicio()
    {
        if (Auth::guest()) {
            
            $ofertaspublicas = Oferta::Listar_Ofertas_Publicas();
            
            $ofertasprivadas = OfertaPrivada::Listar_Ofertas_Privadas(0);

            //$servicios= Servicio::listar_servicios_menu();
        }
        else
        {   
            $ofertaspublicas = Oferta::Listar_Ofertas_Publicas();  

            // 
            if (Auth::user()->users_tipos_id  == 1) {
                $ofertasprivadas = OfertaPrivada::Listar_Ofertas_Privadas(Auth::user()->id);

            }
            else
            {
                $ofertasprivadas = OfertaPrivada::Listar_Ofertas_Privadas(0);                
            }
            //$servicios= Servicio::listar_servicios_menu();
            
        }
        
        return View('welcome',compact('ofertaspublicas','ofertasprivadas'));

    }

}
