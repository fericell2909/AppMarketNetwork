@extends('app')
 
@section('content')
<div class="container">
<div class="row">
  <div class="col-xs-12 col-sm-9" style="">
      <h2 class="text-center"><i class="fa fa-thumbs-up" aria-hidden="true"></i> Los Servicios te estan esperando <i class="fa fa-thumbs-up" aria-hidden="true"></i></h2>  
         
         {!! Form::open(['route' => 'auth/register', 'class' => 'form','id'=> 'RegistroFormPlanes']) !!}

          <table class="table-planes pull-left">
            <tr>
              <td class="table-planes-columna-plan hidden-xs">
                <h3></h3>
                <p class="open-paywall-price">
                <span class="PrecioPlan"></span></p>
                <p class="per-year">&nbsp;</p>
                <p  class="lbl-plan">Escoge tu Plan</p>
              </td>
                <?php foreach ($planes as $plan): ?>
                  
                  @if ($plan->id === 2)
                      <td class="green-plan green-borde text-center ">
                        <h3 class="titulo-green" name="{{$plan->id}}">{{$plan->descripcion_plan}}</h3>
                        <p class="open-paywall-price">
                         <div class="row">
                          <div class="col-xs-12">
                          <span class="PrecioPlan">{{$plan->simbolo_moneda}}</span>
                          </div>
                          <div class="col-xs-12">
                            <span class="PrecioPlan">{{$plan->costo}}</span>
                          </div>
                         </div>
                        <p class="per-year">{{$plan->descripcion_debitacion}}</p>
                        <a href="" data-plan-type="green-plan green-borde" data-plan-id="green" class="btn btn-green">Obtener</a>
                      </td>
                  @elseif ($plan->id === 3)
                     <td class="silver-plan text-center">
                      <h3 class="titulo-silver"  name="{{$plan->id}}">{{$plan->descripcion_plan}}</h3>
                      <p class="open-paywall-price">
                      <div class="row">
                        <div class="col-xs-12">
                        <span class="PrecioPlan">{{$plan->simbolo_moneda}}</span>
                        </div>
                        <div class="col-xs-12">
                          <span class="PrecioPlan">{{$plan->costo}}</span>
                        </div>
                      <p class="per-year">{{$plan->descripcion_debitacion}}</p>
                      <a href="" data-plan-type="silver-plan" data-plan-id="silver" class="btn btn-silver">Obtener</a>
                    </td>
                  @else
                      <td class="gold-plan text-center">
                        <h3 class="titulo-gold"  name="{{$plan->id}}">{{$plan->descripcion_plan}}</h3>
                        <p class="open-paywall-price"> 
                          <div class="row">
                          <div class="col-xs-12">
                          <span class="PrecioPlan">{{$plan->simbolo_moneda}}</span>
                          </div>
                          <div class="col-xs-12">
                            <span class="PrecioPlan">{{$plan->costo}}</span>
                          </div>
                        </p>
                        <p class="per-year">{{$plan->descripcion_debitacion}}</p>
                        <a href="" data-plan-type="oro-plan" data-plan-id="oro" class="btn btn-gold">Obtener</a>
                      </td>
                  @endif


                <?php endforeach;?> 
            </tr>
          </table>
          <table class="tables-planes-caracteristicas">
            <tr class="tables-planes-caracteristicas-fila">
              <td class="tpc-desripcion">Clasificaciones y reseñas nacionales</td>
              <td class="plan-check green-plan green-borde"><i class="fa fa-check-square-o" aria-hidden="true"></i></td>
              <td class="plan-check silver-plan selected"><i class="fa fa-check-square-o" aria-hidden="true"></i></td>
              <td class="plan-check gold-plan"><i class="fa fa-check-square-o" aria-hidden="true"></i></td>
            </tr>

            <tr class="tables-planes-caracteristicas-fila">
              <td class="tpc-desripcion">Acceso a profesionales de mayor calidad</td>
              <td class="plan-check green-plan green-borde"><i class="fa fa-check-square-o" aria-hidden="true"></i></td>
              <td class="plan-check silver-plan selected"><i class="fa fa-check-square-o" aria-hidden="true"></i></td>
              <td class="plan-check gold-plan"><i class="fa fa-check-square-o" aria-hidden="true"></i></td>
            </tr>
            <tr class="tables-planes-caracteristicas-fila">
              <td class="tpc-desripcion">Revista Digital</td>
              <td class="plan-check green-plan green-borde"><i class="fa fa-check-square-o" aria-hidden="true"></i></td>
              <td class="plan-check silver-plan selected"><i class="fa fa-check-square-o" aria-hidden="true"></i></td>
              <td class="plan-check gold-plan"><i class="fa fa-check-square-o" aria-hidden="true"></i></td>
            </tr>
            <tr class="tables-planes-caracteristicas-fila">
              <td class="tpc-desripcion">Programación de Proyectos</td>
              <td class="plan-check green-plan green-borde"></td>
              <td class="plan-check silver-plan selected"><i class="fa fa-check-square-o" aria-hidden="true"></i></td>
              <td class="plan-check gold-plan"><i class="fa fa-check-square-o" aria-hidden="true"></i></td>
            </tr>
            <tr class="tables-planes-caracteristicas-fila">
              <td class="tpc-desripcion">Charla Práctica</td>
              <td class="plan-check green-plan green-borde"></td>
              <td class="plan-check silver-plan selected"></td>
              <td class="plan-check gold-plan"><i class="fa fa-check-square-o" aria-hidden="true"></i></td>
            </tr>
            <tr class="tables-planes-caracteristicas-fila">
              <td class="tpc-desripcion">Linea de Servicio de Emergencia</td>
              <td class="plan-check green-plan green-borde"></td>
              <td class="plan-check silver-plan selected"></td>
              <td class="plan-check gold-plan"><i class="fa fa-check-square-o" aria-hidden="true"></i></td>
            </tr>
            <tr class="tables-planes-caracteristicas-fila">
            <td class="tpc-desripcion">Garantia de Precio Justo</td>
              <td class="plan-check green-plan green-borde"><i class="fa fa-check-square-o" aria-hidden="true"></i></td>
              <td class="plan-check silver-plan selected"><i class="fa fa-check-square-o" aria-hidden="true"></i></td>
              <td class="plan-check gold-plan"><i class="fa fa-check-square-o" aria-hidden="true"></i></td>
            </tr>
            <tr class="tables-planes-caracteristicas-fila tpc-ultima-fila">
              <td class="tpc-desripcion">Precios con Descuentos</td>
              <td class="plan-check green-plan green-borde"></td>
              <td class="plan-check silver-plan selected"></td>
              <td class="plan-check gold-plan"><i class="fa fa-check-square-o" aria-hidden="true"></i></td>
            </tr>
          </table>
            <br>
          <br>
          <div class="row">
            <div class="col-xs-12 col-sm-8">
              <button type="submit" class="btn btn-block pull-right btn-principal"><i class="fa fa-play-circle-o fa-3x" aria-hidden="true"></i><span style="font-size:40px;">&nbsp;Continuar</span></button>
              <input class="btn btn-primary" type="submit" value="form.signup.submit">

            </div>
          </div>
            {{-- <input value ="{{$users->id}}" name="user_id" style="display:none">
            <input value ="{{$users->Nombres}}" name="Nombres" style="display:none">
            <input value ="{{$users->Apellidos}}" name="Apellidos" style="display:none">  
            <input value ="{{$users->email}}" name="email" style="display:none">
            <input value ="{{$users->password}}" name="password" style="display:none">
            <input value ="{{$users->celular}}" name="celular" style="display:none">
            <input value ="{{$users->departamento_id}}" name="departamento_id" style="display:none">
            <input value ="{{$users->distrito_id}}" name="distrito_id" style="display:none"> --}}

            {!! Form::submit(trans('form.signup.submit'),['class' => 'btn btn-primary']) !!}

            {!! Form::input('text', 'user_id', $users->id, ['class'=> 'form-control hidden-xs hidden-sm  hidden-md hidden-lg']) !!}
            {!! Form::input('text', 'Nombres', $users->Nombres, ['class'=> 'form-control hidden-xs hidden-sm  hidden-md hidden-lg']) !!}
            {!! Form::input('text', 'password', $users->password, ['class'=> 'form-control hidden-xs hidden-sm  hidden-md hidden-lg']) !!}
            {!! Form::input('text', 'Apellidos', $users->Apellidos, ['class'=> 'form-control hidden-xs hidden-sm  hidden-md hidden-lg']) !!}
            {!! Form::input('text', 'email', $users->email, ['class'=> 'form-control hidden-xs hidden-sm  hidden-md hidden-lg']) !!}
            {!! Form::input('text', 'celular', $users->celular, ['class'=> 'form-control hidden-xs hidden-sm  hidden-md hidden-lg']) !!}
            {!! Form::input('text', 'departamento_id', $users->departamento_id, ['class'=> 'form-control hidden-xs hidden-sm  hidden-md hidden-lg']) !!}
            {!! Form::input('text', 'distrito_id', $users->distrito_id, ['class'=> 'form-control hidden-xs hidden-sm  hidden-md hidden-lg']) !!}
          {!! Form::close() !!}

  <br>
  <br>

  </div>
  <div class="col-xs-12 col-sm-3" style="">
    <h2 class="text-center"><i class="fa fa-phone-square" aria-hidden="true"></i> 955453193</h2>
    <center><img src="/images/call.jpeg" class="call-center"></center>
    <h3 class="text-center"><strong>Con la Garantía</strong></h3>
    <center><img src="/images/imagen.png" style="width:100px;"></center>

  </div>  
</div>
</div>

@endsection

