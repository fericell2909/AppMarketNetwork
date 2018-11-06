@extends('app')
@section('content')
<div class="container"> 
<div class="row">
  <div class="col-xs-12 col-sm-6 formulario-acceso">
      <h3 class="text-center"><strong>Acceso</strong> a Miembros / Proveedores <i class="fa fa-address-book" aria-hidden="true"></i></h3>  
      <div class="formulario-contenedor">
         {!! Form::open(['class' => 'form','method'=>'post','id'=> 'AccesoForm']) !!}
        <center><img src="/images/acceso.png" class="img-acceso"></center>
                                  <div class="form-group">
                                      <input type="email" class="form-control" id="username" name="email" value="" required placeholder="example@gmail.com">
                                      <span  id="Error-Mensaje-username"class="help-block"></span>
                                  </div>
                                  <div class="form-group">
                                      <input type="password" class="form-control" id="password" name="password" value="" required  placeholder="contraseña">
                                      <span  id="Error-Mensaje-password" class="help-block"></span>
                                  </div>
                                  <div class="form-group">
                                      <span  id="Error-Mensaje-Login" class="help-block"></span>
                                  </div>
                                  <div class="form-group">
                                  <div class="checkbox" style ="display:none;">
                                        <label><input name="remember" type="checkbox" >{{ trans('Recordarme') }}</label>
                                    </div>
                                </div>
                                  <div class="row"> 
                                    <div class="col-xs-12 col-sm-6">
                                      <button  id="btnIngresar" class="btn btn-block pull-left btn-principal btn-ingresar"> Ingresar
                                      </button>
                                    </div>
                                    <div class="col-xs-12 col-sm-6" >
                                      <a href="{{route('auth/register')}}" class="btn btn-block btn-registrarse"> Registrarse</a>
                                    </div>
                                    <div class="col-xs-12 col-sm-6" >
                                      <a data-toggle="modal" data-target="#myModal" class="btn btn-block btn-olvidar"> Olvidaste tu Contraseña ?</a>
                                    </div>

                                  </div>

        </form>
      </div>
  <br>
  <br>
  </div>
  <div class="col-xs-12 col-sm-6 formulario-acceso">
     <h3 class="text-center"><strong>Pioneros</strong> en el mercado Peruano <i class="fa fa-level-up" aria-hidden="true"></i></h3>  
      <br>      
      <ul class="list-group">
        <li class="list-group-item "><i class="fa fa-check" aria-hidden="true"></i> </li>
        <li class="list-group-item"><i class="fa fa-check" aria-hidden="true"></i> </li>
        <li class="list-group-item "><i class="fa fa-check" aria-hidden="true"></i> </li>
        <li class="list-group-item"><i class="fa fa-check" aria-hidden="true"></i> </li>
        <li class="list-group-item "><i class="fa fa-check" aria-hidden="true"></i> </li>
        <li class="list-group-item"><i class="fa fa-check" aria-hidden="true"></i> </li>
        <li class="list-group-item "><i class="fa fa-check" aria-hidden="true"></i> </li>
        <li class="list-group-item"><i class="fa fa-check" aria-hidden="true"></i> </li>
        <li class="list-group-item "><i class="fa fa-check" aria-hidden="true"></i> </li>
        <li class="list-group-item"><i class="fa fa-check" aria-hidden="true"></i> </li>
      </ul>
  </div>
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="myModalLabel">Recuperar Clave de Acceso</h4>
      </div>
      {!! Form::open(['route' => 'password/email', 'class' => 'form','id' => 'RecuperarPassForm']) !!}
      <div class="modal-body">
        <p>Brindanos la dirección de correo electrónico con la cual Usted se registró.</p> 
        <p>Te enviaremos un correo electrónico con los pasos a seguir para el restablecimiento de tu cuenta.</p>
        <label for="usernamerecuperar" class="control-label pull-left">Correo Electronico</label>
         <input type="email" class="form-control" id="usernamerecuperar" name="email"  required placeholder="example@gmail.com">
         <span  id="Error-Mensaje-usernamerecuperar" class="help-block"></span>
      </div>
      <div class="modal-footer">
      
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
        <input type="submit" id="btnRecuperar" class="btn btn-principal btn-recuperar pull-right" value="Recuperar"></input>

        {!! Form::close() !!}

      </div>
                
    </div>
  </div>
</div>
<br>


@endsection

