<?php

namespace App\Http\Controllers\Auth;
use Crypt;
use Mail;
use App\User;
use App\Models\Departamento;
use App\Models\Servicio;
use App\Models\DetallePlan;
use App\Models\Plan;
use App\Models\ProveedorServicio;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as DB;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

     protected $redirectTo = '/';
     protected $redirectAfterLogout = '/';

    use AuthenticatesAndRegistersUsers;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        return Validator::make($data, [
            //'Nombres' => 'required|max:255',
            // ,
             'email' => 'required|email|max:255|unique:users'
            // 'password' => 'required|confirmed|min:6'
        ]);
    }

    public function getContactanos()
    {
        return view('auth.contactanos');
    }

    public function getRegisterContactanos(Request $request)
    {
        $data = $request->all();

        $valores=array('titulo_contacto'=>$data['titulo_contacto'],
                    'descripcion_mensaje_solicitud' =>$data['descripcion_mensaje_solicitud'], 
                    'correo'=>$data['correo'],
                    'Nombres'=>$data['Nombres']
                    );

        //var_dump($valores);
        // Enviar Correo ....

        Mail::send('emails.oficios', ['valores' => $valores], function ($message) use ($valores) {
             $message->from($valores['correo'], $valores['Nombres']);       
             $message->to(Config('mail.from.address'), Config('mail.from.name'));
        
             $message->subject('Registro de Oficio Nuevo');
        
             $message->priority(3);
         });

        $data = null;

        return redirect()->back()->with('status','La Solicitud de Registro de Nuevo Oficio ha sido enviada correctamente.');


        // Fin de Envio de Correo....
            
    }

    public function getProveedor()
    {
        if (view()->exists('auth.authenticate')) {
            return view('auth.authenticate');
        }

        $departamentos =  Departamento::where('nEstado', 1)->get();

        $servicios = Servicio::listar_servicios_sin_todos();

        // $planes = new array(); 
        return view('auth.registerproveedor',compact('departamentos','servicios'));
    }

     public function   getRegister()
    {
        
        $departamentos =  Departamento::where('nEstado', 1)->get();
        $planes = Plan::MostrarPlanes();

        $detalleplanes = DetallePlan::MostrarDetallePlanes();
        //var_dump ($detalleplanes);
        return view('auth.register',compact('departamentos','planes' ,'detalleplanes'));
    }

    public function validar_login()
    {
        $users =  User::where('nEstado',1)
                        ->where('email', $_POST['email'])
                        //->where('password',bcrypt($_POST['password']))
                        ->where('encrypt_pass', $_POST['password'])
                        ->select('id','email')
                        ->get();
        //echo bcrypt($_POST['password']);
        return json_encode($users);
    }

    public function validar_email()
    {
        $users =  User::where('email', $_POST['email'])
                        ->select('id','email')
                        ->get();
        //echo bcrypt($_POST['password']);
        return json_encode($users);

    }


    public function getPlanesSuscripcion()
    {
        $users = new User();
        $users->id =0;
        $users->Nombres = $_POST['Nombres'];
        $users->Apellidos = $_POST['Apellidos']; 
        $users->email = $_POST['email'];
        $users->password = $_POST['password'];
        $users->celular = $_POST['celular'];
        $users->departamento_id = $_POST['departamento_id'];
        $users->distrito_id = $_POST['distrito_id'];
        
        //echo $users;
        $planes = Plan::MostrarPlanes();
        //echo $planes;
        return view('auth.planes',compact('users'),compact('planes'));
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */

//      public function postRegister(Request $request)
//     {
//         // $validator = $this->validator($request->all());

//         // if ($validator->fails()) {
//         //     $this->throwValidationException(
//         //         $request, $validator
//         //     );
//         // }
//         // echo "aquii";
//         // Auth::login($this->create($request->all()));

//         // return redirect($this->redirectPath());

//            $user = new User;
//             $user->Nombres = $request->Nombres;
//             $user->Apellidos = $request->Apellidos;
//             $user->email = $request->email;
//             $user->nEstado = 1;
//             $user->celular = $request->celular;
//             $user->password = bcrypt($request->password);
//             $user->remember_token = str_random(100);
//             $user->departamento_id = $request->departamento_id;
//             $user->distrito_id = $request->distrito_id;
//             $user->save();
            
//              if(Auth::attempt($user)){
//          return redirect("usuarios/miembros");
     

            
//     }
// }

    protected function create(array $data)
    {
        //echo $data;
        //Proveedores
        if ($data['users_tipos_id'] == 2) {

           $codigo_generado = DB::table('users')->insertGetId([
                                'Nombres' => $data['Nombres'],
                                'Apellidos' => $data['Apellidos'],
                                'email' => $data['email'],  
                                'password' => bcrypt($data['password']),
                                'departamento_id' => $data['departamento_id'],
                                'distrito_id' => $data['distrito_id'],
                                'celular' => $data['celular'],
                                'nEstado' => 1,
                                'encrypt_pass' =>$data['password'],
                                'planes_id' => $data['planes_id'],
                                'bMembresia' => 1,
                                'bOfertas' => 1,
                                'users_tipos_id' => $data['users_tipos_id'],
                                'direccion' =>  $data['direccion'],
                                'dni' =>  $data['dni'],
                                'prov_ruc' =>  $data['prov_ruc'],
                                'prov_razon_social' =>  $data['prov_razon_social'],
                                'prov_direccion' =>  $data['prov_direccion'],
                                'prov_telefono' =>  $data['prov_telefono'],
                                'prov_celular'=>  $data['prov_celular'],
                                'prov_descripcion' =>  $data['prov_descripcion'],
                                'prov_pagina_web' =>  $data['prov_pagina_web'],
                                'prov_servicios_id' => $data['prov_servicios_id'][0],
                                'created_at' =>  date_create()->format('Y-m-d H:i:s'),
                                'updated_at' =>  date_create()->format('Y-m-d H:i:s'),
                                'latitud' =>  $data['latitud'],
                                'longitud' =>  $data['longitud'],
            ]);            
            
            // Insercion en la Tabla de Todos los Servicios que Brinda un PRoveedor

            for ($i=0; $i <count($data['prov_servicios_id']) ; $i++) { 

                $prov_servicios = new ProveedorServicio();

                $prov_servicios->servicios_id = $data['prov_servicios_id'][$i];
                $prov_servicios->users_id = $codigo_generado;

                $prov_servicios->save();

                $prov_servicios = null;

            }

            // Enviar Email de usuario Registrado ; definir.


            return User::find($codigo_generado);


        } else {
            return User::create([
            'Nombres' => $data['Nombres'],
            'Apellidos' => $data['Apellidos'],
            'email' => $data['email'],  
            'password' => bcrypt($data['password']),
            'departamento_id' => $data['departamento_id'],
            'distrito_id' => $data['distrito_id'],
            'celular' => $data['celular'],
            'nEstado' => 1,
            'encrypt_pass' =>$data['password'],
            'planes_id' => $data['planes_id'],
            'bMembresia' => 1,
            'bOfertas' => 1,
            'users_tipos_id' => $data['users_tipos_id'],
            'direccion' =>  $data['direccion'],
            'dni' =>  $data['dni'],
            'prov_ruc' =>  $data['prov_ruc'],
            'prov_razon_social' =>  $data['prov_razon_social'],
            'prov_direccion' =>  $data['prov_direccion'],
            'prov_telefono' =>  $data['prov_telefono'],
            'prov_celular'=>  $data['prov_celular'],
            'prov_descripcion' =>  $data['prov_descripcion'],
            'prov_pagina_web' =>  $data['prov_pagina_web'],
            'prov_servicios_id' => $data['prov_servicios_id']
        ]);



        }
        


        


    }


}
