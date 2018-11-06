<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ['as' => '/', 'uses' => 'HomeController@getInicio']);

// Route::get('/', function () {

// 	echo "amennnnnnnnnn";
//     return view('welcome');
// });

// Authentication routes...

Route::get('home', 'HomeController@index');


//Route::post('Auth/validar_login', 'Auth\AuthController@validar_login');
Route::post('Auth/validar_login',['as' => 'Auth/validar_login', 'uses' => 'Auth\AuthController@validar_login']);
Route::post('Auth/validar_email',['as' => 'Auth/validar_email', 'uses' => 'Auth\AuthController@validar_email']);

Route::post('Distrito/listar_ajax/{id}',['as' => 'Distrito/listar_ajax', 'uses' => 'DistritoController@listar_ajax']);
Route::post('Servicio/listar_ajax/{id}',['as' => 'Servicio/listar_ajax', 'uses' => 'ServicioController@listar_ajax']);


Route::post('auth/planes',['as' => 'auth/planes', 'uses' => 'Auth\AuthController@getPlanesSuscripcion']);

// Authentication routes...
// Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::get('auth/login', ['as' =>'auth/login', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('auth/login', ['as' =>'auth/login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('auth/logout', ['as' => 'auth/logout', 'uses' => 'Auth\AuthController@getLogout']);

Route::get('proveedor/login', ['as' =>'proveedor/login', 'uses' => 'Auth\AuthController@getProveedor']);


// Registration routes...
//Route::get('autorizacion/register', 'Auth\AuthController@getRegister');
Route::get('auth/register', ['as' => 'auth/register', 'uses' => 'Auth\AuthController@getRegister']);
Route::post('auth/register', ['as' => 'auth/register', 'uses' => 'Auth\AuthController@postRegister']);


// Password reset link request routes...
Route::get('password/email', ['as' => 'password/email', 'uses' => 'Auth\PasswordController@getEmail']);
//Route::post('password/email', ['as' => 'password/postEmail', 'uses' => 'Auth\PasswordController@postEmail']);

Route::post('password/email', ['as' => 'password/postEmail', 'uses' => 'Auth\PasswordController@postEmailAlternativo']);

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', ['as' => 'password/postReset', 'uses' =>  'Auth\PasswordController@postReset']);



//actualizar datos iniciales de usuario
Route::get('usuarios/cuenta',['middleware' => 'auth','as' => 'usuarios/cuenta', 'uses' => 'MiembrosController@getIndex']);
Route::post('usuarios/cuenta/editar',['middleware' => 'auth','as' => 'usuarios/cuenta/editar', 'uses' => 'MiembrosController@ActualizarUsuario']);
Route::post('usuarios/cuenta/notificar',['middleware' => 'auth','as' => 'usuarios/cuenta/notificar', 'uses' => 'MiembrosController@ActualizarNotificaciones']);
Route::post('usuarios/cuenta/reset',['middleware' => 'auth','as' => 'usuarios/cuenta/reset', 'uses' => 'MiembrosController@ActualizarPassWord']);

Route::get('proveedores/cuenta',['middleware' => 'auth','as' => 'proveedores/cuenta', 'uses' => 'MiembrosController@CuentaProveedores']);


//Cotizaciones

Route::get('cotizacion/registrar',['middleware' => 'auth','as' => 'cotizacion/registrar', 'uses' => 'CotizacionController@index']);
Route::post('cotizacion/registrar',['middleware' => 'auth','as' => 'cotizacion/registrar', 'uses' => 'CotizacionController@RegistrarCotizacion']);

Route::get('cotizacion/VerCotizacion/{id}',['middleware' => 'auth','as' => 'cotizacion/VerCotizacion', 'uses' => 'CotizacionController@VerCotizacion']);

Route::post('cotizacion/AgregarComentario',['middleware' => 'auth','as' => 'cotizacion/AgregarComentario', 'uses' => 'CotizacionController@RegistrarComentariosCotizacion']);

Route::post('cotizacion/ListarComentarios/{id}',['middleware' => 'auth','as' => 'cotizacion/ListarComentarios', 'uses' => 'CotizacionController@ListarComentariosCotizacion']);

Route::post('cotizacion/ListarProvincias/{id}',['middleware' => 'auth','as' => 'cotizacion/ListarProvincias', 'uses' => 'CotizacionController@ListarProvincias']);
Route::post('cotizacion/ListarDistritos/{id}',['middleware' => 'auth','as' => 'cotizacion/ListarDistritos', 'uses' => 'CotizacionController@ListarDistritos']);

Route::get('cotizacion/proveedor',['middleware' => 'auth','as' => 'cotizacion/proveedor', 'uses' => 'CotizacionController@getproveedor']);

//Fin Cotizaciones

Route::get('Oficios/Contactanos',['as' => 'Oficios/Contactanos', 'uses' => 'Auth\AuthController@getContactanos']);
Route::post('Oficios/Contactanos',['as' => 'Oficios/Contactanos', 'uses' => 'Auth\AuthController@getRegisterContactanos']);
//Oficios Contactos

//Trabajos Realizados

Route::get('proveedores/trabajos',['middleware' => 'auth','as' => 'proveedores/trabajos', 'uses' => 'ProveedorController@GestionarTrabajos']);
Route::post('proveedores/trabajos',['middleware' => 'auth','as' => 'proveedores/trabajos', 'uses' => 'ProveedorController@RegistrarTrabajos']);

Route::get('proveedores/vertrabajos/{id}',['middleware' => 'auth','as' => 'proveedores/vertrabajos', 'uses' => 'ProveedorController@VerTrabajos']);
Route::get('proveedores/vertrabajoscliente/{id}',['middleware' => 'auth','as' => 'proveedores/vertrabajoscliente', 'uses' => 'ProveedorController@vertrabajoscliente']);

Route::get('proveedores/editartrabajos/{id}',['middleware' => 'auth','as' => 'proveedores/editartrabajos', 'uses' => 'ProveedorController@EditarTrabajos']);
Route::post('proveedores/Actualizartrabajos',['middleware' => 'auth','as' => 'proveedores/Actualizartrabajos', 'uses' => 'ProveedorController@ActualizarTrabajos']);

Route::get('proveedores/ConfirmarTrabajo/{id}',['middleware' => 'auth','as' => 'proveedores/ConfirmarTrabajo', 'uses' => 'ProveedorController@ConfirmarTrabajo']);

Route::get('Proveedores/Servicios/{id}',['middleware' => 'auth','as' => 'Proveedores/Servicios', 'uses' => 'ProveedorController@Servicios']);

Route::post('proveedores/RegistrarConfirmarTrabajo',['middleware' => 'auth','as' => 'proveedores/RegistrarConfirmarTrabajo', 'uses' => 'ProveedorController@RegistrarConfirmarTrabajo']);

// Fin de Trabajos Realizados


// Fin de Oficios Contactos.

//Ofertas
Route::get('Ofertas/RegistrarOfertas/{id}',['middleware' => 'auth','as' => 'Ofertas/RegistrarOfertas', 'uses' => 'OfertaController@GestionarOfertas']);
Route::post('Ofertas/Registrar',['middleware' => 'auth','as' => 'Ofertas/Registrar', 'uses' => 'OfertaController@RegistrarOfertas']);


Route::get('Ofertas/ListarOfertasVigentes',['middleware' => 'auth','as' => 'Ofertas/ListarOfertasVigentes', 'uses' => 'OfertaController@ListarOfertasVigentes']);

Route::get('Ofertas/EditarOfertasVigentes/{id}',['middleware' => 'auth','as' => 'Ofertas/EditarOfertasVigentes', 'uses' => 'OfertaController@EditarOfertasVigentes']);

Route::post('Ofertas/EditarOfertas',['middleware' => 'auth','as' => 'Ofertas/EditarOfertas', 'uses' => 'OfertaController@PostEditarOfertasVigentes']);


Route::get('Ofertas/VerOfertasVigentes/{id}',['middleware' => 'auth','as' => 'Ofertas/VerOfertasVigentes', 'uses' => 'OfertaController@VerOfertasVigentes']);

Route::get('Ofertas/ListarOfertasAnuladas',['middleware' => 'auth','as' => 'Ofertas/ListarOfertasAnuladas', 'uses' => 'OfertaController@ListarOfertasAnuladas']);

Route::get('Ofertas/VerOfertasAnuladas/{id}',['middleware' => 'auth','as' => 'Ofertas/VerOfertasAnuladas', 'uses' => 'OfertaController@VerOfertasAnuladas']);


Route::get('Ofertas/ListarOfertasCerradas',['middleware' => 'auth','as' => 'Ofertas/ListarOfertasCerradas', 'uses' => 'OfertaController@ListarOfertasCerradas']);
Route::get('Ofertas/VerOfertasCerradas/{id}',['middleware' => 'auth','as' => 'Ofertas/VerOfertasCerradas', 'uses' => 'OfertaController@VerOfertasCerradas']);

// Fin Ofertas

// Ruta de la Oferta que visualize el cliente a comprar.

Route::get('Ofertas/OfertaCliente/{id}',['middleware' => 'auth','as' => 'Ofertas/OfertaCliente', 'uses' => 'OfertaClienteController@VerOfertaCliente']);

//
// ruta de perfil publico del proveedor
Route::get('Public/Proveedor/{id}',['as' => 'Public/Proveedor', 'uses' => 'ProveedorController@VerProveedor']);
//

// Ruta de Carrrito de Compra.
Route::get('CarroCompra/Revisar',['middleware' => 'auth','as' => 'CarroCompra/Revisar', 'uses' => 'CarroCompraController@ListarItems']);
Route::get('CarroCompra/Agregar/{id}',['middleware' => 'auth','as' => 'CarroCompra/Agregar', 'uses' => 'CarroCompraController@AgregarItems']);
Route::get('CarroCompra/Eliminar/{id}',['middleware' => 'auth','as' => 'CarroCompra/Eliminar', 'uses' => 'CarroCompraController@EliminarItems']);

Route::post('CarroCompra/Revisar',['middleware' => 'auth','as' => 'CarroCompra/Revisar', 'uses' => 'CarroCompraController@PagarItems']);





// Interfaz con paypal
Route::post('payment', array(
	'as' => 'payment',
	'uses' => 'PaypalController@postPayment',
));

// Después de realizar el pago Paypal redirecciona a esta ruta

Route::get('payment/status', array(
	'as' => 'payment.status',
	'uses' => 'PaypalController@getPaymentStatus',
));

// Fin Interfaz con Paypal.

//Encuesta Satisfaccion Cliente 

Route::get('Ofertas/EncuestaCliente/{id}',['middleware' => 'auth','as' => 'Ofertas/EncuestaCliente', 'uses' => 'EncuestaController@RegistrarEncuesta']);

Route::get('Encuesta/VerEncuestaCliente/{id}',['middleware' => 'auth','as' => 'Encuesta/VerEncuestaCliente', 'uses' => 'EncuestaController@VerEncuestaCliente']);


Route::get('Encuesta/VerEncuestaClienteProveedor/{id}',['middleware' => 'auth','as' => 'Encuesta/VerEncuestaClienteProveedor', 'uses' => 'EncuestaController@VerEncuestaClienteProveedor']);
Route::get('Encuesta/VerEncuestaClienteDefault/{id}',['middleware' => 'auth','as' => 'Encuesta/VerEncuestaClienteDefault', 'uses' => 'EncuestaController@VerEncuestaClienteDefault']);


Route::get('Encuestas/MisPendientes',['middleware' => 'auth','as' => 'Encuestas/MisPendientes', 'uses' => 'EncuestaController@MisEncuestasPendientes']);
Route::get('Encuestas/MisCalificaciones',['middleware' => 'auth','as' => 'Encuestas/MisCalificaciones', 'uses' => 'EncuestaController@MisCalificaciones']);

Route::post('Encuestas/EnviarEncuesta',['middleware' => 'auth','as' => 'Encuestas/EnviarEncuesta', 'uses' => 'EncuestaController@EnviarEncuesta']);

// Falta el Post 

//Mis Compras - Cliente Miembro

Route::get('MisCompras',['middleware' => 'auth','as' => 'MisCompras', 'uses' => 'OrdenController@MisCompras']);

//Mis Comentarios
Route::get('Cliente/MisComentarios',['middleware' => 'auth','as' => 'Cliente/MisComentarios', 'uses' => 'OfertaClienteController@MisComentarios']);


Route::get('Servicios/Buscar/{id}',['as' => 'Servicios/Buscar', 'uses' => 'ServicioController@Buscar']);

