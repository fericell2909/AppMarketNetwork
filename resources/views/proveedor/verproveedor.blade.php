
@extends('app')
@section('javascript')
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBC-ueG56d4pm8xrNLlPssupxlCCuwWIOo&libraries=adsense&language=es"></script>
@endsection
@section('content-miembros')
<br>
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-2">
			<center>
				<img src="/images/edificio.jpg" class="img-responsive" alt="Imagen Generica" style="background: #f5f5f5;
    			border: 5px solid #e4e4e4;
    			box-sizing: border-box;
    			box-shadow: 0 20px 8px -15px #e4e4e4;">
			</center>
		</div>
		<div class="col-xs-12 col-sm-10">
			<h2 class="color-azul" style="margin-top: 0;margin-bottom:0;">{{$proveedores[0]->prov_razon_social}}</h2>
			<div>
				 @if($proveedores[0]->ratio == 0)
                  <i class="fa fa-star fa-2x" style = "color: #ddd"></i>
                  <i class="fa fa-star fa-2x" style = "color: #ddd"></i>
                  <i class="fa fa-star fa-2x" style = "color: #ddd;"></i>
                  <i class="fa fa-star fa-2x" style = "color: #ddd"></i>
                  <i class="fa fa-star fa-2x" style = "color: #ddd;"></i>
                  <h3  style="margin-top: 0;margin-bottom:0;">No Posee <strong class="color-azul">Calificación</strong> actualmente</h3>
                @endif

                @if(Auth::user()->ratio == 1)
                  <i class="fa fa-star fa-2x" style = "color: green"></i>
                  <i class="fa fa-star fa-2x" style = "color: #ddd"></i>
                  <i class="fa fa-star fa-2x" style = "color: #ddd"></i>
                  <i class="fa fa-star fa-2x" style = "color: #ddd"></i>
                  <i class="fa fa-star fa-2x" style = "color: #ddd;"></i>
                  <h3  style="margin-top: 0;margin-bottom:0;">Su <strong class="color-azul">Calificación</strong> es de <strong><span style="color:green">Una Estrella</span></strong> actualmente</h3>
                @endif

                @if($proveedores[0]->ratio == 2)
                  <i class="fa fa-star fa-2x" style = "color: green"></i>
                  <i class="fa fa-star fa-2x" style = "color: green"></i>
                  <i class="fa fa-star fa-2x" style = "color: #ddd"></i>
                  <i class="fa fa-star fa-2x" style = "color: #ddd"></i>
                  <i class="fa fa-star" style = "color: #ddd;"></i>
                  <h3  style="margin-top: 0;margin-bottom:0;">Su <strong class="color-azul">Calificación</strong> es de <strong><span style="color:green">2 Estrellas</span></strong> actualmente</h3>
                @endif


                @if($proveedores[0]->ratio == 3)
                  <i class="fa fa-star fa-2x" style = "color: green"></i>
                  <i class="fa fa-star fa-2x" style = "color: green"></i>
                  <i class="fa fa-star fa-2x" style = "color: green"></i>
                  <i class="fa fa-star fa-2x" style = "color: #ddd"></i>
                  <i class="fa fa-star fa-2x" style = "color: #ddd;"></i>
                  <h3 style="margin-top: 0;margin-bottom:0;">Su <strong class="color-azul">Calificación</strong> es de <strong><span style="color:green">3 Estrellas</span></strong> actualmente</h3>
                @endif

                @if($proveedores[0]->ratio == 4)
                  <i class="fa fa-star fa-2x" style = "color: green"></i>
                  <i class="fa fa-star fa-2x" style = "color: green"></i>
                  <i class="fa fa-star fa-2x" style = "color: green"></i>
                  <i class="fa fa-star fa-2x" style = "color: green"></i>
                  <i class="fa fa-star fa-2x" style = "color: #ddd;"></i>
                  <h3 style="margin-top: 0;margin-bottom:0;">Su <strong class="color-azul">Calificación</strong> es de <strong><span style="color:green">4 Estrellas</span></strong> actualmente</h3>
                @endif

                @if($proveedores[0]->ratio == 5)
                  <i class="fa fa-star fa-2x" style = "color: green"></i>
                  <i class="fa fa-star fa-2x" style = "color: green"></i>
                  <i class="fa fa-star fa-2x" style = "color: green"></i>
                  <i class="fa fa-star fa-2x" style = "color: green"></i>
                  <i class="fa fa-star fa-2x" style = "color: green;"></i>
                  <h3 style="margin-top: 0;margin-bottom:0;">Su <strong class="color-azul">Calificación</strong> es de <strong><span style="color:green">5 Estrellas</span></strong> actualmente</h3>
                @endif
			</div>
		</div>
	</div>
	<div class="form-group">
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12">
            <ul class="nav nav-pills">
                <li class="active"><a data-toggle="pill" href="#home"><i class="fa fa-pencil-square-o"  style="color:green;" aria-hidden="true"></i>&nbsp;Datos del Proveedor</a></li>
                <li><a data-toggle="pill" href="#comentarios"><i class="fa fa-commenting-o"  style="color:green;" aria-hidden="true"></i>&nbsp;Comentarios</a></li>
                <li><a data-toggle="pill" href="#ofertas"><i class="fa fa-file-powerpoint-o" style="color:green;" aria-hidden="true"></i>&nbsp;Ofertas</a></li>
                <li><a data-toggle="pill" href="#trabajos"><i class="fa fa-building" style="color:green;" aria-hidden="true"></i>&nbsp;Trabajos Realizados</a></li>
            </ul>
            <div class="tab-content">
           
	            <div id="home" class="tab-pane fade in active">
	                    <div class="panel panel-default">
	                      <div class="panel-heading fondo-naranja-oscuro color-blanco">
	                          <h2 class="panel-title text-center" style="font-weight:bold;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp; Detalles</h2>
	                      </div>
	                    <div class="panel-body"> 
	                            <div class="row">
	                            	<div class="col-xs-12 col-sm-12">
		                            	<div class="form-group">
		                           	 		<label class="color-azul">Descripción:</label>	
		                           	 		<p class="color-negro" style="font-weight:300">
		                           	 		{{$proveedores[0]->prov_descripcion}}</p>
		                           	 	</div>
	                            		<div class="row">
	                            			<div class="col-sm-3">
	                            				<div class="form-group">
			                           	 			<label class="color-azul">Dirección:</label>	
			                           	 			<p class="color-negro" style="font-weight:300">{{$proveedores[0]->prov_direccion}}</p>
			                           	 		</div>		
	                            			</div>
	                            			<div class="col-sm-3">
	                            				<div class="form-group">
				                       	 			<label class="color-azul">Teléfono:</label>	
				                       	 			<p class="color-negro" style="font-weight:300">{{$proveedores[0]->prov_telefono}}</p>
				                       	 		</div>		
	                            			</div>
	                            			<div class="col-sm-3">
			                           	 		<div class="form-group">
			                           	 			<label class="color-azul">Celular:</label>	
			                           	 			<p class="color-negro" style="font-weight:300">{{$proveedores[0]->prov_celular}}</p>
			                           	 		</div>
	                            			</div>
	                            			<div class="col-sm-3">
			                           	 		<div class="form-group">
			                           	 			<label class="color-azul">Pagina Web:</label>	
			                           	 			<p class="color-negro" style="font-weight:300">{{$proveedores[0]->prov_pagina_web}}</p>
			                           	 		</div>
	                            			</div>
	                            		</div>
										<label class="color-azul">Lugar donde se realizan los servicios:</label>
										<div class="row">
											<div class="col-sm-3">
												<div class="form-group">
			                           	 			<label class="color-azul">Departamento:</label>	
			                           	 			<p class="color-negro" style="font-weight:300">{{$departamentos[0]->nombre_departamento}}.</p>
			                           	 		</div>
		                           	 		</div>
		                           	 		<div class="col-sm-3">
			                           	 		<div class="form-group">
			                           	 			<label class="color-azul">Distrito:</label>	
			                           	 			<p class="color-negro" style="font-weight:300">{{$distritos[0]->nombre_distrito}}</p>
			                           	 		</div>
			                           	 	</div>
			                           	 	<div class="col-sm-3">
			                           	 		<div class="form-group">
			                           	 			<label class="color-azul">Servicios que brinda:</label>
													<ul>
														@foreach($servicios as $servicio)
															<li class="color-negro" style="font-weight:300">{{$servicio->nombre_servicio}}</li>
														@endforeach
													</ul>
			                           	 		</div>
			                           	 	</div>
		                           	 	</div>
	                                </div>
	                                <div class="col-xs-12 col-sm-12">
	                                	
	                                    <label class="color-azul">Ubicación del Negocio</label>
	                                	<div class="form-group" style="display:none;">
		                                	<label class="color-azul">Latitud:</label>	
		                           	 		<p class="color-negro" style="font-weight:300" id="latitud">{{$proveedores[0]->latitud}}</p>
		                            	</div>
		                            	<div class="form-group" style="display:none;">
		                                	<label class="color-azul">Longitud:</label>	
		                           	 		<p class = "color-negro" style="font-weight:300" id="longitud">{{$proveedores[0]->longitud}}</p>
		                            	</div> 
		                            	<div class="row">  
			                                <div class="col-xs-12">
			                                    <center><div id='map_canvas' style="background:#f7f7f7;"></div></center>
			                                </div>
			                            </div> 
	                                </div>
	                            </div>
	                    </div>
	                    </div>
	            </div>

	            <div id="comentarios" class="tab-pane fade">
	                <div class="panel panel-default">
	                  	<div class="panel-heading fondo-naranja-oscuro color-blanco">
	                    	<h2 class="panel-title text-center" style="font-weight:bold;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp; Los Usuarios Proporcionan sus Comentarios</h2>
	                  	</div>
	                  	<div class="panel-body">
		                    @if(COUNT($comentarios) > 0)
		                    	<div class="row" id="lista-comentarios">
		                    	  @include('proveedor.comentarios-table')
		                      	</div>
		                    @else
		                        <div class="row">
		                              <ul class="list-group">
		                                  <li class="list-group-item active"><i class="fa fa-lock" aria-hidden="true"></i>&nbsp;Total de Comentarios&nbsp;<span class="badge">0</span></li>
		                                  <li class="list-group-item">
		                                      <center>
		                                          <img src="/images/cero.png" title="Cero Comentarios"  class="img img-responsive">
		                                          <p class="color-azul cuenta-usuario-row"><b>No tiene Comentarios</b></p>
		                                          <p class="color-azul cuenta-usuario-row">Cuando los Usuarios Registren su Encuesta de Satisfacción al cliente; los comentarios aparecerán aquí.</p>
		                                      </center>
		                                  </li>
		                              </ul>
								</div>
		                  	@endif
	                  	</div>
	                      

	                 </div>
	            </div>
	          	
	          	<div id="ofertas" class="tab-pane fade">
	                <div class="panel panel-default">
	                  	<div class="panel-heading fondo-naranja-oscuro color-blanco">
	                    	<h2 class="panel-title text-center" style="font-weight:bold;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;  Ofertas que brinda el Proveedor</h2>
	                  	</div>
	                  	<div class="panel-body">
		                    @if(COUNT($ofertas)> 0)
		                    	<div class="row" id="lista-ofertas">
		                    	  @include('proveedor.ofertas-table')
		                      	</div>
		                    @else
		                        <div class="row">
		                              <ul class="list-group">
		                                  <li class="list-group-item active"><i class="fa fa-lock" aria-hidden="true"></i>&nbsp;Total de Ofertas&nbsp;<span class="badge">0</span></li>
		                                  <li class="list-group-item">
		                                      <center>
		                                          <img src="/images/cero.png" title="Cero Ofertas"  class="img img-responsive">
		                                          <p class="color-azul cuenta-usuario-row"><b>No tiene Ofertas</b></p>
		                                          <p class="color-azul cuenta-usuario-row">Cuando el Proveedor registre sus ofertas; éstas aparecerán aquí.</p>
		                                      </center>
		                                  </li>
		                              </ul>
								</div>
		                  	@endif
	                  	</div>
	                      

	                 </div>
	            </div>
	            <div id="trabajos" class="tab-pane fade">
	                <div class="panel panel-default">
	                  	<div class="panel-heading fondo-naranja-oscuro color-blanco">
	                    	<h2 class="panel-title text-center" style="font-weight:bold;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;  Trabajaos Realizados por el Proveedor</h2>
	                  	</div>
	                  	<div class="panel-body">
		                    @if(COUNT($trabajos)> 0)
		                    	<div class="row" id="lista-trabajos">
		                    	  @include('proveedor.trabajos-table')
		                      	</div>
		                    @else
		                        <div class="row">
		                              <ul class="list-group">
		                                  <li class="list-group-item active"><i class="fa fa-lock" aria-hidden="true"></i>&nbsp;Total de Trabajos Realizados&nbsp;<span class="badge">0</span></li>
		                                  <li class="list-group-item">
		                                      <center>
		                                          <img src="/images/cero.png" title="Cero Trabajos Realizados"  class="img img-responsive">
		                                          <p class="color-azul cuenta-usuario-row"><b>No tiene Trabajos Realizados</b></p>
		                                          <p class="color-azul cuenta-usuario-row">Cuando el Proveedor registre Trabajos Realizados; éstos aparecerán aquí.</p>
		                                      </center>
		                                  </li>
		                              </ul>
								</div>
		                  	@endif
	                  	</div>
	                      

	                 </div>
	            </div>      

    		</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')

<script>

$(document).ready(function()
{
	initialize();

	 $(document).on('click','#lista-comentarios .pagination a',function(event)
      { 

        //alert('hizo click Lista de Atencion');

         $('#lista-comentarios li').removeClass('active');
         $(this).parent('li').addClass('active');
         event.preventDefault();
         var myurl = $(this).attr('href');
        var page=$(this).attr('href').split('page=')[1];
       //alert(page);
       getDataComentarios(page);
    });

	 $(document).on('click','#lista-ofertas .pagination a',function(event)
      { 

        //alert('hizo click Lista de Atencion');

         $('#lista-ofertas li').removeClass('active');
         $(this).parent('li').addClass('active');
         event.preventDefault();
         var myurl = $(this).attr('href');
        var page=$(this).attr('href').split('page=')[1];
       //alert(page);
       getDataOfertas(page);
    });

	 $(document).on('click','#lista-trabajos .pagination a',function(event)
      { 

        //alert('hizo click Lista de Atencion');

         $('#lista-trabajos li').removeClass('active');
         $(this).parent('li').addClass('active');
         event.preventDefault();
         var myurl = $(this).attr('href');
        var page=$(this).attr('href').split('page=')[1];
       //alert(page);
       getDataTrabajos(page);
    });



});

var map = null;
var infoWindow = null;

function getDataTrabajos(page)
{

		$.ajax(
        {
            url: '?page=' + page,
            type: "get",
            data : "tipo=3",
            datatype: "html",
            // beforeSend: function()
            // {
            //     you can show your loader 
            // }
        })
        .done(function(data)
        {
           // console.log(data);
            
            $("#lista-trabajos").empty().html(data);

            //location.hash = page;
        })
        .fail(function(jqXHR, ajaxOptions, thrownError)
        {
              alert('No response from server');
        });

} 

function getDataComentarios(page)
{
		$.ajax(
        {
            url: '?page=' + page,
            type: "get",
            data : "tipo=1",
            datatype: "html",
            // beforeSend: function()
            // {
            //     you can show your loader 
            // }
        })
        .done(function(data)
        {
           // console.log(data);
            
            $("#lista-comentarios").empty().html(data);

            //location.hash = page;
        })
        .fail(function(jqXHR, ajaxOptions, thrownError)
        {
              alert('No response from server');
        });


}

function getDataOfertas(page)
{
	$.ajax(
        {
            url: '?page=' + page,
            type: "get",
            data : "tipo=2",
            datatype: "html",
            // beforeSend: function()
            // {
            //     you can show your loader 
            // }
        })
        .done(function(data)
        {
           // console.log(data);
            
            $("#lista-ofertas").empty().html(data);

            //location.hash = page;
        })
        .fail(function(jqXHR, ajaxOptions, thrownError)
        {
              alert('No response from server');
        });

} 

function openInfoWindow(marker) {
    var markerLatLng = marker.getPosition();
    /*infoWindow.setContent([
        '<strong>La posicion del marcador es:</strong><br/>',
        markerLatLng.lat(),
        ', ',
        markerLatLng.lng(),
        '<br/>Arrástrame para actualizar la posición.'
    ].join(''));*/

    //infoWindow.open(map, marker);

    //$('#latitud').val(markerLatLng.lat());
    //$('#longitud').val(markerLatLng.lng());
}
 
function initialize() {
    //alert();
    //alert();
    var myLatlng = new google.maps.LatLng($('#latitud').text(),$('#longitud').text());
    var myOptions = {
      zoom: 12,
      center: myLatlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }
 
    map = new google.maps.Map($('#map_canvas').get(0), myOptions);
    

    infoWindow = new google.maps.InfoWindow({});
 
    var marker = new google.maps.Marker({
        position: myLatlng,
        draggable: false,
        map: map,
        title:'Aqué es la ubicación de su negocio'
    });
 
    google.maps.event.addListener(marker, 'dragend', function(){ openInfoWindow(marker); });
    google.maps.event.addListener(marker, 'click', function(){ openInfoWindow(marker); });

}

</script>
@endsection



