<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\DB as DB;
use App\Models\ProveedorServicio as ProveedorServicio; 
class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
     protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['Nombres','Apellidos', 'email', 'password','departamento_id',
                            'distrito_id','celular','nEstado','encrypt_pass','planes_id',
                            'bMembresia','bOfertas','users_tipos_id','direccion','dni',
                            'prov_ruc','prov_razon_social','prov_direccion','prov_telefono',
                            'prov_celular','prov_descripcion','prov_pagina_web','prov_servicios_id'
                            ];

    /**.
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    //protected $hidden = ['remember_token'];

    static public function ListarEmailsOrden($codigo_orden)
    {

        return  DB::select("call usp_listar_emails_users($codigo_orden)"); 
    }

    static public function ActualizaUsuario($id,array $valores,array $data)
    {
        User::where('id',$id)
            ->update($valores);
        
        $valores = null;

        $tipo_usuario = User::find($id); 

        //proveeedor

        if ( $tipo_usuario->users_tipos_id == 2) {
            
            $detalles = ProveedorServicio::where('users_id','=',$id)->delete();

            $detalles = null;

            for ($i=0; $i < count($data['prov_servicios_id']); $i++) { 
                
                $prov_servicios = new ProveedorServicio();

                $prov_servicios->servicios_id = $data['prov_servicios_id'][$i];
                $prov_servicios->users_id = $id;

                $prov_servicios->save();

                $prov_servicios = null;
            }

        }

        return true; 
        

    }
    static public function ActualizarPassWord($id,array $valores)
    {
        User::where('id',$id)
            ->update($valores);
        
        $valores = null;
    }
    static public  function ListarNotificaciones($id)
    {
        return  DB::select("call usp_listar_promociones_users($id)"); 

    } 
    static public function ActualizarNotificaciones($id,array $valores)
    {
        User::where('id',$id)
            ->update($valores);

        $valores = null;        

    }

    static public function Listar_Datos_Usuario($codigo_usuario)
    {

        return User::select('users.departamento_id','users.distrito_id',
                            'users.prov_ruc',
                            'users.prov_razon_social',
                            'users.prov_direccion',
                            'users.prov_telefono',
                            'users.prov_celular',
                            'users.prov_descripcion',
                            'users.prov_pagina_web',
                            'users.latitud',
                            'users.longitud',
                            'users.ratio'
                            )
                    ->where('users.id',$codigo_usuario)
                    ->get();
    }

    static public function AumentaCantidadTotalCompra($id,$cantidad)
    {
        $valores=array('nTotalItemCarritoCompra'=>$cantidad + 1 );

        User::where('id',$id)
            ->update($valores);

        $valores = null;        

    }

    static public function DisminuyeCantidadTotalCompra($id,$cantidad)
    {

        if ($cantidad > 0) {
            $valores=array('nTotalItemCarritoCompra'=>$cantidad - 1 );

            User::where('id',$id)
                ->update($valores);

            $valores = null;        

        }
        
    }
    static public function RetornaCantidadTotalCarritoCompra($id)
    {

        return User::select("users.nTotalItemCarritoCompra")
                    ->where("users.id",$id)
                    ->get();

    }
}
