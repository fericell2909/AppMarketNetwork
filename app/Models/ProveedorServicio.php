<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB as DB; 
Use App\User as User;

class ProveedorServicio extends Model
{
     protected $table = 'proveedores_servicios';
    public $primarykey = 'id';


    static public function listar_servicios_proveedores($codigo_proveedor)
    {
        // $servicios = ProveedorServicio::select('proveedores_servicios.id','servicios.nombre_servicio')
        //                                 ->join("servicios","servicios.id","=","proveedores_servicios.servicios_id")
        //                                 ->where('proveedores_servicios.users_id',$codigo_proveedor)
        //                                 ->get();                                
      

      $servicios = DB::select("call usp_listar_servicios_proveedores(?)",array($codigo_proveedor));
      
      return $servicios;
    }

    static public function listar_proveedores_x_servicios($codigo_servicio)
    {

        //$proveedores = DB::select("call usp_listar_proveedores_servicios(?)",array($codigo_servicio));


        return   User::select('users.prov_ruc',
                              'users.prov_razon_social',
                               'users.prov_direccion',
                                'users.prov_telefono',
                                'users.prov_celular',
                                'users.prov_descripcion',
                                'users.prov_pagina_web',
                                'users.id',
                                'users.ratio',
                                'users.prov_calificacion',
                                'servicios.nombre_servicio',
                                'servicios.id as codigo_servicio')
                        ->join('proveedores_servicios','proveedores_servicios.users_id','=','users.id')
                        ->join('servicios','servicios.id','=','proveedores_servicios.servicios_id') 
                        ->where('proveedores_servicios.servicios_id',$codigo_servicio)
                        ->where('users.users_tipos_id',2)
                        ->orderby('users.ratio','DESC')
                        ->paginate(2);
    }
}
