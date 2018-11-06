<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Departamento as Departamento;
use App\Models\Distrito as Distrito;
use App\Models\Plan as Plan;
use App\Models\Servicio as Servicio;
use App\Models\ProveedorServicio as ProveedorServicio;
use Illuminate\Support\Facades\Auth as Auth;
use App\User as User;


class MiembrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getindex()
    {



        $departamentos = Departamento::listar_departamento_id(Auth::user()->departamento_id);
        $distritos = Distrito::listar_distrito_id(Auth::user()->distrito_id);

        $departamentos_editar = Departamento::listar_departamentos();

        $planes = Plan::ListarPlanesUsuario(Auth::user()->id);
        //echo $planes;

        $promociones =User::ListarNotificaciones(Auth::user()->id);
        //var_dump($promociones);
        return view('usuario.cuenta',compact('departamentos','distritos','departamentos_editar','planes','promociones'));



       // return view::make('usuario.cuenta')->with('nombre_departamento', $nombre_departamento);
    }

    public function CuentaProveedores()
    {
        $departamentos = Departamento::listar_departamento_id(Auth::user()->departamento_id);
        $distritos = Distrito::listar_distrito_id(Auth::user()->distrito_id);

        $departamentos_editar = Departamento::listar_departamentos();

        $servicios =  ProveedorServicio::listar_servicios_proveedores(Auth::user()->id);

        $lista_servicios = Servicio::listar_servicios_sin_todos();

        return view('usuario.cuentaproveedor',compact('departamentos','distritos','departamentos_editar','planes','servicios','lista_servicios'));

    }


    public function ActualizarUsuario(Request $request)
    {

        $data = $request->all();
        //var_dump($data);
        //Validaciones se realizan en el lado del cliente.
        $valores=array('Nombres'=>$_POST['Nombres'],
                    'Apellidos' =>$_POST['Apellidos'], 
                    'celular'=>$_POST['celular'],
                    'departamento_id'=>$_POST['editardepartamento'],
                    'distrito_id'=>$_POST['editardistrito'],
                    'direccion'=>$_POST['direccion'],
                    'dni'=>$_POST['dni'],
                    'prov_ruc'=>$_POST['prov_ruc'],
                    'prov_razon_social'=>$_POST['prov_razon_social'],
                    'prov_direccion'=>$_POST['prov_direccion'],
                    'prov_telefono'=>$_POST['prov_telefono'],
                    'prov_celular'=>$_POST['prov_celular'],
                    'prov_descripcion'=>$_POST['prov_descripcion'],
                    'prov_pagina_web'=>$_POST['prov_pagina_web'],
                    'prov_servicios_id'=>$data['prov_servicios_id'][0]
                    );

        User::ActualizaUsuario(Auth::user()->id,$valores,$data);

         $valores = null;
         $data = null;

         return redirect()->back()->with('status','Datos de Usuario. Actualizados Correctamente.');
    }

    public function ActualizarPassWord()
    {
        //validaciones se realizan en el cliente => los datos llegan limpios
        $valores = array('password'=>bcrypt($_POST['newPassword']),
                         'encrypt_pass' =>$_POST['newPassword']);

        User::ActualizarPassWord(Auth::user()->id,$valores);

        $valores = null;

        return redirect()->back()->with('status','La Constraseña se ha actualizado correctamente.');    
    } 

    public function ActualizarNotificaciones()
    {
        if (isset($_POST['Membresia'])) {
            $_POST['Membresia'] = 1;
        } else
        {
            $_POST['Membresia'] = 0;
        }

        if (isset($_POST['Ofertas'])) {
            $_POST['Ofertas'] = 1;
        } else
        {
            $_POST['Ofertas'] = 0;
        }
        

        $valores=array('bMembresia'=>$_POST['Membresia'],
                       'bOfertas' =>$_POST['Ofertas']);


        User::ActualizarNotificaciones(Auth::user()->id,$valores);

        $valores = null;

        return redirect()->back()->with('status','Se actualizaron los datos de las notificaciones correctamente.'); 
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
