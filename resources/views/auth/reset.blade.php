@extends('app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h2 class="text-center color-azul"> Restablecer Contraseña</h2>
            <div class="panel panel-default">
                <div class="panel-heading fondo-naranja-oscuro color-blanco"><i class="fa fa-lock" aria-hidden="true"></i>&nbsp; {{ trans('Cambio de Contraseña') }}</div>
                 <div class="panel-body">
                    {!! Form::open(['route' => 'password/postReset', 'class' => 'form']) !!}
                        {!! Form::hidden('token',  $token ) !!}
                        <div class="form-group">
                            <label>{{ trans('Correo Electronico') }}</label>
                            {!! Form::email('email', old('email'), ['class'=> 'form-control','id' =>'email']) !!}
                            <span  id ="ErrorMensaje-email" class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('Nueva Contraseña') }}</label>
                            {!! Form::password('password', ['class'=> 'form-control','id' =>'password']) !!}
                            <span  id ="ErrorMensaje-password" class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('Nueva Contraseña (Confirmar)') }}</label>
                            {!! Form::password('password_confirmation', ['class'=> 'form-control','id' =>'password_confirmation']) !!}
                            <span  id ="ErrorMensaje-password_confirmation" class="help-block"></span>
                        </div>
                        {!! Form::submit(trans('Cambiar Contraseña'), ['class' => 'btn btn-principal btnReiniciarPass']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

