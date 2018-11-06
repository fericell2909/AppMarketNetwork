jQuery(document).ready(function($) {
	 var tmp=0;
	var valor_departamento = $('select[name=departamento_id]').val();

	if (!(typeof valor_departamento === 'undefined')) { 
		jQuery.ajax({
				  url: '../Distrito/listar_ajax/' + $('select[name=departamento_id]').val(),
				  type: 'POST',
				  data: {id: $('select[name=departamento_id]').val()},
				  success: function(respuesta){
				   		var lista = JSON.parse(respuesta);
				   		//console.log(lista);
				  		$.each(lista, function(index, val) {
				  			//alert(lista[index].nombre_distrito);
		                            $('#registrodistrito').append($('<option>', { 
		                                value:lista[index].id,
		                                text : lista[index].nombre_distrito
		                            }));

		                        });
				  		lista = null;
				  		$('#registrodistrito').fadeIn("slow");
				  }
				})
				.fail(function() {
		          //console.log("error");
		    })

	}

var valor_distrito = $('select[name=editardepartamento]').val();

if (!(typeof valor_distrito === 'undefined')) 
	{
		//alert('estamos cargando');

		var codigo_distrito = $('#prov_distrito_id').val();  

		//alert(codigo_distrito);
	jQuery.ajax({
				  url: '../../Distrito/listar_ajax/' + $('select[name=editardepartamento]').val(),
				  type: 'POST',
				  data: {id: $('select[name=editardepartamento]').val()},
				  success: function(respuesta){
				   		var lista = JSON.parse(respuesta);
				   		//console.log(lista);
				  		$.each(lista, function(index, val) {
				  			//alert(lista[index].nombre_distrito);
				  			if (lista[index].id  == codigo_distrito) 
				  			{
				  					//alert("selected");
				  					var cadena = "<option selected value= '" + lista[index].id + "'>"+lista[index].nombre_distrito+ "</option>";
				  			}
				  			else
				  			{
				  					var cadena = "<option value= '" + lista[index].id + "'>"+lista[index].nombre_distrito+ "</option>";
				  			}

		                        // $('#editardistrito').append($('<option>', { 
		                        //     value:lista[index].id,
		                        //     text : lista[index].nombre_distrito,
		                        //     selected="selected"
		                        // }));
									
									$('#editardistrito').append(cadena);

		                        });
				  		lista = null;
				  		$('#editardistrito').fadeIn("slow");
				  }
				})
				.fail(function() {
		          //console.log("error");
		    })


	}

// var valor_categoria =   $('select[name=categoria_id]').val();

// if (!(typeof valor_categoria === 'undefined')) 
// 	{
// 		jQuery.ajax({
// 				  url: '../../Servicio/listar_ajax/' + $('select[name=categoria_id]').val(),
// 				  type: 'POST',
// 				  data: {id: $('select[name=categoria_id]').val()},
// 				  success: function(respuesta){
// 				   		var lista = JSON.parse(respuesta);
// 				   		//console.log(lista);
// 				  		$.each(lista, function(index, val) {
// 				  			//alert(lista[index].nombre_distrito);
// 		                            $('#servicio_id').append($('<option>', { 
// 		                                value:lista[index].id,
// 		                                text : lista[index].nombre_servicio	
// 		                            }));

// 		                        });
// 				  		lista = null;
// 				  		$('#servicio_id').fadeIn("slow");
// 				  }
// 				})
// 				.fail(function() {
// 		          //console.log("error");
// 		    })

// 	}

	function ValidarEmail(email){
		var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
		 if (!regex.test(email)) {
		 	return false; //email incorrecto
		 }
		 else
		 {
		 	return true; // email correcto
		 }
	}
//
// https://temporal.com
//
	//Validaciones en la Landing Page
	$("#button-cta").on( "click", function() {
		
		var InputDataProyecto = $("#input-cta").val().trim();

		if( InputDataProyecto == null || InputDataProyecto.length == 0 || /^\s+$/.test(InputDataProyecto) ) {
			InputDataProyecto = null;
			$("#Error-Mensaje-input-cta").text('El Proyecto a Buscar no debe ser vacío.');
  			$("#Error-Mensaje-input-cta").show();
  			$("#input-cta").focus();
  			return false;
			}

			//llamar a backend....
	})
	
	$('#input-cta').on("keypress",function (){
		$("#Error-Mensaje-input-cta").hide();
	})
	//Fin de Validaciones en la Landing Page


	//Validaciones en el Login
	$('#btnIngresar').on('click', function(event) {
		
		
		var email = $('#username').val().trim();
		if( email == null || email.length == 0  ) {
			email=null;
			$("#Error-Mensaje-username").text('El email no puede ser vacio.');
  			$("#Error-Mensaje-username").show();
  			$("#username").focus();
  			return false;
			}

		    // Se utiliza la funcion test() nativa de JavaScript
		    if (!ValidarEmail(email)) {
		    	email=null;
		       $("#Error-Mensaje-username").text('Debe Ingresar un Email valido. Ejm: alguien@example.com');
  				$("#Error-Mensaje-username").show();
  				$("#username").focus();
  				return false;
		    }


		var password = $('#password').val().trim();
		if( password == null || password.length == 0  ) {
			password = null;
			$("#Error-Mensaje-password").text('La contraseña no puede ser vacio.');
  			$("#Error-Mensaje-password").show();
  			$("#password").focus();
  			return false;
			}
		 var resultado = 0;
		jQuery.ajax({
				  url: '../Auth/validar_login',
				  type: 'POST',
				  data:  $("#AccesoForm").serialize(),
				  success: function(respuesta){
				  	//alert('Correcto');
				   		var lista = JSON.parse(respuesta);
				   		
				   		//alert(lista.length);

				  		if (lista.length == 0)
				  		{

				  			$('#Error-Mensaje-Login').text("Datos de Ingreso Incorrectos");
				  			$('#Error-Mensaje-Login').show();
				  			//event.preventDefault();
				  		}
				  		else
				  		{
				  			$("#AccesoForm").submit();
				  		}

				  }
				})

		return false;
	});


	$('#btnRecuperar').on('click', function(e) {
		
		var email = $('#usernamerecuperar').val().trim();
		if( email == null || email.length == 0  ) {
			email = null;
			$("#Error-Mensaje-usernamerecuperar").text('El email no puede ser vacio.');
  			$("#Error-Mensaje-usernamerecuperar").show();
  			$("#usernamerecuperar").focus();
  			return false;
			}

		    // Se utiliza la funcion test() nativa de JavaScripts
		    if (!ValidarEmail(email)) {
		    	email = null;
		       $("#Error-Mensaje-usernamerecuperar").text('Debe Ingresar un Email valido. Ejm: alguien@example.com');
  				$("#Error-Mensaje-usernamerecuperar").show();
  				$("#usernamerecuperar").focus();
  				return false;
		    }
		 //llamar a back end 
		//alert('Paso Validaciones.... Enviar Correo...');
		$('#RecuperarPassForm').submit();

	});

	$('#password').on("keypress",function (){
		$("#Error-Mensaje-password").hide();
		//$("#Error-Mensaje-Login").hide();
	})

	$('#username').on("keypress",function (){
		$("#Error-Mensaje-username").hide();
		//$("#Error-Mensaje-Login").hide();


	})

	$('#usernamerecuperar').on("keypress",function (){
		$("#Error-Mensaje-usernamerecuperar").hide();
	})	

	//Fin de Validaciones en el Login


	
	

	//Validaciones Registro Paso Uno
	$("#btnContinuarPasoUno").on( "click", function(evt) {
		
		var NombreUsuario = $("#NombreUsuario").val().trim();

		if( NombreUsuario == null || NombreUsuario.length == 0 || /^\s+$/.test(NombreUsuario) ) {
			NombreUsuario = null;
			$("#ErrorMensaje-NombreUsuario").text('El Nombre de Usuario No puede ser Vacio.');
  			$("#ErrorMensaje-NombreUsuario").show();
  			$("#NombreUsuario").focus();
  			return false;
			}

		var ApellidosUsuario = $("#ApellidosUsuario").val().trim();

		if( ApellidosUsuario == null || ApellidosUsuario.length == 0 || /^\s+$/.test(ApellidosUsuario) ) {
			ApellidosUsuario = null;
			$("#ErrorMensaje-ApellidosUsuario").text('Los Apellidos no puede ser vacio.');
  			$("#ErrorMensaje-ApellidosUsuario").show();
  			$("#ApellidosUsuario").focus();
  			return false;
			}

		var email = $('#usernameregistro').val().trim();

		if( email == null || email.length == 0  ) {
			email = null;
			$("#ErrorMensaje-usernameregistro").text('El email no puede ser vacio.');
  			$("#ErrorMensaje-usernameregistro").show();
  			$("#usernameregistro").focus();
  			return false;
			}

		    // Se utiliza la funcion test() nativa de JavaScript
		if (!ValidarEmail(email)) {
		    	email = null;
		       $("#ErrorMensaje-usernameregistro").text('Debe Ingresar un Email valido. Ejm: alguien@example.com');
  				$("#ErrorMensaje-usernameregistro").show();
  				$("#usernameregistro").focus();
  				return false;
		}

		// Pasa validaciones de Email

		var password = $('#passwordregistro').val().trim();
		if( password == null || password.length == 0  ) {
			password = null;
			$("#ErrorMensaje-passwordregistro").text('La contraseña no puede ser vacio.');
  			$("#ErrorMensaje-passwordregistro").show();
  			$("#passwordregistro").focus();
  			return false;
			}



		var cbodepartamento = $('#registrodepartamento').val().trim();

		if( cbodepartamento == null || cbodepartamento.length == 0  ) {
			cbodepartamento = null;
			$("#ErrorMensaje-registrodepartamento").text('Debe Seleccionar un Departamento.');
  			$("#ErrorMensaje-registrodepartamento").show();
  			$("#registrodepartamento").focus();
  			return false;
			}

		
		
		var cbodistrito = $('#registrodistrito').val();

		if( cbodistrito == null || cbodistrito.length == 0  ) {
			cbodistrito = null;
			$("#ErrorMensaje-registrodistrito").text('Debe Seleccionar un Distrito.');
  			$("#ErrorMensaje-registrodistrito").show();
  			$("#registrodistrito").focus();
  			return false;
			}

		var direccion = $('#direccion').val();

		if( direccion == null || direccion.length == 0  ) {
			direccion = null;
			$("#ErrorMensaje-direccion").text('Debe Ingresar la dirección');
  			$("#ErrorMensaje-direccion").show();
  			$("#direccion").focus();
  			return false;
			}

		var dni = $('#dni').val();

		if( dni == null || dni.length == 0  ) {
			dni = null;
			$("#ErrorMensaje-dni").text('Debe Ingresar el dni');
  			$("#ErrorMensaje-dni").show();
  			$("#dni").focus();
  			return false;
			}

		if( dni.length <= 7 ) {
			$("#ErrorMensaje-dni").text('El dni debe contener 8 digitos.');
  			$("#ErrorMensaje-dni").show();
  			$("#dni").focus();
			return false;
			}
		

		var celularregistro = $('#celularregistro').val();

		if( celularregistro == null || celularregistro.length == 0  ) {
			celularregistro = null;
			$("#ErrorMensaje-celularregistro").text('Debe Ingresar el numero de celular');
  			$("#ErrorMensaje-celularregistro").show();
  			$("#celularregistro").focus();
  			return false;
			}

		if( celularregistro.length <= 8 ) {
			$("#ErrorMensaje-celularregistro").text('El celular debe contener 9 digitos.');
  			$("#ErrorMensaje-celularregistro").show();
  			$("#celularregistro").focus();
			return false;
			}

		var descripcion_plan_id = $('#descripcion_plan_id').val();

		if( descripcion_plan_id == null || descripcion_plan_id.length == 0  ) {
			descripcion_plan_id = null;
			$("#ErrorMensaje-descripcion_plan_id").text('Debe escoger un plan de suscripcion');
  			$("#ErrorMensaje-descripcion_plan_id").show();
  			return false;
			}
		

		// 	var lista = '';
 	jQuery.ajax({
				  url: '../Auth/validar_email',
				  type: 'POST',
				  data:  $("#RegistroForm").serialize(),
				  success: function(respuesta){
				  	//alert('Correcto');
				   		lista = JSON.parse(respuesta);

				   			if (lista.length > 0)
				  		{
				  			$('#ErrorMensaje-usernameregistro').text("El email ya se encuentra registrado.");
				  			$('#ErrorMensaje-usernameregistro').show();
				  		}
				  		else
				  		{
				  			$('#RegistroForm').submit();
				  		}
				  }
				});
	return false;
	})

$('#dni').on("keypress",function (){
		$("#ErrorMensaje-dni").hide();
	})

$('#celularregistro').on("keypress",function (){
		$("#ErrorMensaje-celularregistro").hide();
	})


$('#email').on("keypress",function (){
		$("#ErrorMensaje-email").hide();
	})

$('#direccion').on("keypress",function (){
		$("#ErrorMensaje-direccion").hide();
	})


	$('#NombreUsuario').on("keypress",function (){
		$("#ErrorMensaje-NombreUsuario").hide();
	})

	$('#ApellidosUsuario').on("keypress",function (){
		$("#ErrorMensaje-ApellidosUsuario").hide();
	})

	$('#usernameregistro').on("keypress",function (){
		$("#ErrorMensaje-usernameregistro").hide();
	})

	$('#passwordregistro').on("keypress",function (){
		$("#ErrorMensaje-passwordregistro").hide();
	})

	$('#registrodepartamento').on("focusin",function (){
		$("#ErrorMensaje-registrodepartamento").hide();
	})

	//Fin Validaciones Registro Paso Uno

	//comentarios leerr mas y cerrar comentarios

	//comentarios leerr mas y cerrar comentarios

	//Funcionalidad en el Registro Paso Dos
	$(".btn-green" ).on( "click", function() {

		$('.fa-thumbs-up').toggleClass('verde');
		$('.fa-thumbs-up').removeClass('gris');
		$('.fa-thumbs-up').removeClass('naranja');

		var bClassGreenBorde = document.querySelectorAll(".green-borde");
		bClassGreenBorde = [].slice.call(bClassGreenBorde);

		if (bClassGreenBorde.length > 0) 
			{
				event.preventDefault();
			} 
		else
			{
				var coincidencias = document.querySelectorAll(".green-plan");
		    	coincidencias = [].slice.call(coincidencias);
		    	$.each(coincidencias, function( index, value ) {
		    		$(value).toggleClass('green-borde');
				});

		    	var silverborde = document.querySelectorAll(".silver-borde")
		    	silverborde = [].slice.call(silverborde);
		    	
		    	if (silverborde.length > 0) 
					{
						$.each(silverborde, function( index, value ) {
		    				$(value).removeClass('silver-borde');
						});
					} 

		    	var goldborde = document.querySelectorAll(".gold-borde")
		    	goldborde = [].slice.call(goldborde);
		    	
		    	if (goldborde.length > 0) 
					{
				    	$.each(goldborde, function( index, value ) {
				    		$(value).removeClass('gold-borde');
						});
					} 

			};

		event.preventDefault();
	})

	$(".btn-silver" ).on( "click", function() {

		$('.fa-thumbs-up').toggleClass('gris');
		$('.fa-thumbs-up').removeClass('verde');
		$('.fa-thumbs-up').removeClass('naranja');
		
		var bClassSilverBorde = document.querySelectorAll(".silver-borde");
		bClassSilverBorde = [].slice.call(bClassSilverBorde);

		if (bClassSilverBorde.length > 0) 
			{
				event.preventDefault();
			} 
		else
			{

		    	var coincidencias = document.querySelectorAll(".silver-plan");
		    	coincidencias = [].slice.call(coincidencias);
		    	$.each(coincidencias, function( index, value ) {
		    		$(value).toggleClass('silver-borde');
				});

				var greenborde = document.querySelectorAll(".green-borde")
				greenborde = [].slice.call(greenborde);
				    	
				if (greenborde.length > 0) 
					{

					$.each(greenborde, function( index, value ) {
					    $(value).removeClass('green-borde');
					});

					}

				var goldborde = document.querySelectorAll(".gold-borde")
				goldborde = [].slice.call(goldborde);
				
				if (goldborde.length > 0) 
					{
					$.each(goldborde, function( index, value ) {
					    $(value).removeClass('gold-borde');
					});
				}
			}
		
		event.preventDefault();
	
	})

	$(".btn-gold" ).on( "click", function() {

		$('.fa-thumbs-up').toggleClass('naranja');
		$('.fa-thumbs-up').removeClass('gris');
		$('.fa-thumbs-up').removeClass('verde');

		var bClassGoldBorde = document.querySelectorAll(".gold-borde");
		bClassGoldBorde = [].slice.call(bClassGoldBorde);

		if (bClassGoldBorde.length > 0) 
			{
				event.preventDefault();
			} 
		else
			{

		    	var coincidencias = document.querySelectorAll(".gold-plan");
		    	coincidencias = [].slice.call(coincidencias);
		    	$.each(coincidencias, function( index, value ) {
		  			$(value).toggleClass('gold-borde');
				});

		    	var greenborde = document.querySelectorAll(".green-borde")
				greenborde = [].slice.call(greenborde);


				if (greenborde.length > 0) 
					{
						$.each(greenborde, function( index, value ) {
							$(value).removeClass('green-borde');
						});
					}

				var silverborde = document.querySelectorAll(".silver-borde")
				silverborde = [].slice.call(silverborde);
				    	
				 if (silverborde.length > 0) 
					{		
						$.each(silverborde, function( index, value ) {
						    $(value).removeClass('silver-borde');
						});
					}
			}
		event.preventDefault();
	})
	
	//Validaciones solo numeros y tecla izquierda y tecla derecha 
	$("#numerotarjeta , #codigoseguridad, #celularregistro, #CelularCuentaUsuario, .cantidadfilacarrito, #dni, #EditarDniUsuario,#prov_ruc,#prov_telefono,#prov_celular,#celular_contacto_cotizacion").on("keydown", function (e) {
		//console.log(e.keyCode);

		if ( e.keyCode == 8 ||  e.keyCode == 37 ||  e.keyCode == 39 )
		{
			return true;
		}

		if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 || (e.keyCode == 65 && e.ctrlKey === true) || (e.keyCode >= 35 && e.keyCode <= 39)) 
		{
            return false;
        }
 
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105 )) {
            e.preventDefault();
        }
    })

	// solo letras

	$(".letras").keypress(function (key) {
            //window.console.log(key.charCode)
            if ((key.charCode < 97 || key.charCode > 122)//letras mayusculas
                && (key.charCode < 65 || key.charCode > 90) //letras minusculas
                && (key.charCode != 45) //retroceso
                && (key.charCode != 241) //ñ
                 && (key.charCode != 209) //Ñ
                 && (key.charCode != 32) //espacio
                 && (key.charCode != 225) //á
                 && (key.charCode != 233) //é
                 && (key.charCode != 237) //í
                 && (key.charCode != 243) //ó
                 && (key.charCode != 250) //ú
                 && (key.charCode != 193) //Á
                 && (key.charCode != 201) //É
                 && (key.charCode != 205) //Í
                 && (key.charCode != 211) //Ó
                 && (key.charCode != 218) //Ú
 
                )
                return false;
        });

    // Logica de Carrito de Compra ; Validacion Cliente

     
    $(".cantidadfilacarrito").on("keyup", function (e) 
     {

     	if (e.value !== 'undefined')
     	{	
		//console.log(e.keyCode);
			var totalfila= 0;
			var suma = 0;
			var cantidad = 0;
			var cantidades = document.querySelectorAll(".cantidadfilacarrito");
			cantidades = [].slice.call(cantidades);

			var precios= document.querySelectorAll(".preciofilacarrito")
			precios = [].slice.call(precios);

			 $.each(cantidades, function( index, value ) {
					if (cantidades[index].value.trim()=="")
			 		{		
			 			//return false;
			 			cantidad = "0.00";
			 		}
			 		else
			 		{
			 			cantidad = cantidades[index].value;
			 		}
					// totalfila = parseFloat(precios[index].textContent)*parseFloat(cantidades[index].value);
					 totalfila = parseFloat(precios[index].textContent)*parseFloat(cantidad);
			   		suma = suma + totalfila; 				  		
			   		//$(".totalfilacarrito").text(totalfila);
			 		
				 		$("#table-carrito tbody tr").each(function (index2) {
			  		             $(this).children("td").each(function (index3) {
			  		             		
			  		             		if(index == index2)
			  		             		{
			  		             			switch (index3) {
			                        		case 3:
			                        			//alert(totalfila);

			                            		$(this).text(String(totalfila.toFixed(2))); 
			                            		break;
			                    			}
			  		             		}

			  		             		
			                    	})
				 		})

			 		});
			 	//alert(totalfila);
	    	
	    	$("#CantidadTotalCarrito").text(suma.toFixed(2));

	    	totalfila = null;
			suma = null;
			cantidad = null;
			cantidades = null;
			 precios = null;

    	}
    });

	

	
	$("select[name=departamento_id]").change(function(){

		$('#registrodistrito option').remove();
		jQuery.ajax({
				  url: '../Distrito/listar_ajax/' + $('select[name=departamento_id]').val(),
				  type: 'POST',
				  data: {id: $('select[name=departamento_id]').val()},
				  success: function(respuesta){
				   		var lista = JSON.parse(respuesta);
				   		//console.log(lista);
				  		$.each(lista, function(index, val) {
				  			//alert(lista[index].nombre_distrito);
		                            $('#registrodistrito').append($('<option>', { 
		                                value:lista[index].id,
		                                text : lista[index].nombre_distrito
		                            }));

		                        });
				  		lista = null;
				  		$('#registrodistrito').fadeIn("slow");
				  }
				})
				.fail(function() {
		          console.log("error");
		    })

		      event.preventDefault();
	});

	$("select[name=editardepartamento]").change(function(){

		$('#editardistrito option').remove();
		jQuery.ajax({
				  url: '../../Distrito/listar_ajax/' + $('select[name=editardepartamento]').val(),
				  type: 'POST',
				  data: {id: $('select[name=editardepartamento]').val()},
				  success: function(respuesta){
				   		var lista = JSON.parse(respuesta);
				   		//console.log(lista);
				  		$.each(lista, function(index, val) {
				  			//alert(lista[index].nombre_distrito);
		                            $('#editardistrito').append($('<option>', { 
		                                value:lista[index].id,
		                                text : lista[index].nombre_distrito
		                            }));

		                        });
				  		lista = null;
				  		$('#editardistrito').fadeIn("slow");
				  }
				})
				.fail(function() {
		          //console.log("error");
		    })

		      event.preventDefault();
	});

	// $("select[name=categoria_id]").change(function(){

	// 	$('#servicio_id option').remove();
	// 	jQuery.ajax({
	// 			  url: '../../Servicio/listar_ajax/' + $('select[name=categoria_id]').val(),
	// 			  type: 'POST',
	// 			  data: {id: $('select[name=vategoria_id]').val()},
	// 			  success: function(respuesta){
	// 			   		var lista = JSON.parse(respuesta);
	// 			   		//console.log(lista);
	// 			  		$.each(lista, function(index, val) {
	// 			  			//alert(lista[index].nombre_distrito);
	// 	                            $('#servicio_id').append($('<option>', { 
	// 	                                value:lista[index].id,
	// 	                                text : lista[index].nombre_servicio
	// 	                            }));

	// 	                        });
	// 			  		lista = null;
	// 			  		$('#servicio_id').fadeIn("slow");
	// 			  }
	// 			})
	// 			.fail(function() {
	// 	          //console.log("error");
	// 	    })

	// 	      event.preventDefault();


	// });



	//Validaciones Cliente Cambiar de Contraseña

$(".btnCambiarClave").on('click', function(event) {

	var oldPassword = $("#oldPassword").val().trim();

		if( oldPassword == null || oldPassword.length == 0 ) {
			oldPassword = null;
			$("#ErrorMensaje-oldPassword").text('Su contraseña no puede ser vacia');
  			$("#ErrorMensaje-oldPassword").show();
  			$("#oldPassword").focus();
  			return false;
			}

 	var newPassword = $("#newPassword").val().trim();

		if( newPassword == null || newPassword.length == 0 ) {
			newPassword = null;
			$("#ErrorMensaje-newPassword").text('La nueva contraseña no puede ser vacia');
  			$("#ErrorMensaje-newPassword").show();
  			$("#newPassword").focus();
  			return false;
			}

	var newPasswordConfirmation = $("#newPasswordConfirmation").val().trim();

 		if( newPasswordConfirmation == null || newPasswordConfirmation.length == 0 ) {
			newPasswordConfirmation = null;
			$("#ErrorMensaje-newPasswordConfirmation").text('La confirmacion de la contraseña no puede ser vacia');
  			$("#ErrorMensaje-newPasswordConfirmation").show();
  			$("#newPasswordConfirmation").focus();
  			return false;
			}

		if ((newPasswordConfirmation !== newPassword) )
		{
			$("#ErrorMensaje-newPassword").text('La constraseñas no coinciden');
  			$("#ErrorMensaje-newPassword").show();
  			$("#newPassword").focus();
  			return false;
			
		}

});

$('#oldPassword').on("keypress",function (){
		$("#ErrorMensaje-oldPassword").hide();
	})

$('#newPassword').on("keypress",function (){
		$("#ErrorMensaje-newPassword").hide();
	})

$('#newPasswordConfirmation').on("keypress",function (){
		$("##ErrorMensaje-newPasswordConfirmation").hide();
	})

$(".btnReiniciarPass").on('click', function(event) {


	var email = $('#email').val().trim();
		if( email == null || email.length == 0  ) {
			email=null;
			$("#ErrorMensaje-email").text('El email no puede ser vacio.');
  			$("#ErrorMensaje-email").show();
  			$("#email").focus();
  			return false;
			}

	 if (!ValidarEmail(email)) {
		    	email=null;
		       $("#ErrorMensaje-email").text('Debe Ingresar un Email valido. Ejm: alguien@example.com');
  				$("#ErrorMensaje-email").show();
  				$("#email").focus();
  				return false;
		    }

 	var password = $("#password").val().trim();

		if( password == null || password.length == 0 ) {
			password = null;
			$("#ErrorMensaje-password").text('La nueva contraseña no puede ser vacia');
  			$("#ErrorMensaje-password").show();
  			$("#password").focus();
  			return false;
			}

	var password_confirmation = $("#password_confirmation").val().trim();

 		if( password_confirmation == null || password_confirmation.length == 0 ) {
			password_confirmation = null;
			$("#ErrorMensaje-password_confirmation").text('La confirmacion de la contraseña no puede ser vacia');
  			$("#ErrorMensaje-password_confirmation").show();
  			$("#password_confirmation").focus();
  			return false;
			}

		if ((password !== password_confirmation) )
		{
			$("#ErrorMensaje-password").text('La constraseñas no coinciden');
  			$("#ErrorMensaje-password").show();
  			$("#password").focus();
  			return false;
			
		}

	});
	// Validaciones de Edicion de Cuenta de Usuario


$("#btnEscogerPlan").on('click', function(event) {

	$("#ErrorMensaje-descripcion_plan_id").hide();

	var bClassGreenBorde = document.querySelectorAll(".green-borde");
		bClassGreenBorde = [].slice.call(bClassGreenBorde);

		if (bClassGreenBorde.length > 0) 
			{
				bClassGreenBorde = null;				
				$("#descripcion_plan_id").val($(".titulo-green").text() + " / " + $(".precio-green").text() + " / " + $(".debitacion-green").text());
				$("#planes_id").val($(".titulo-green").data('codigo'));
			} 

		var silverborde = document.querySelectorAll(".silver-borde")
		    silverborde = [].slice.call(silverborde);
		    	
		 if (silverborde.length > 0) 
					{
						silverborde = null;	
						$("#descripcion_plan_id").val($(".titulo-silver").text() + " / " + $(".precio-silver").text() + " / " + $(".debitacion-silver").text() );
						$("#planes_id").val($(".titulo-silver").data('codigo'));
					} 

		    	var goldborde = document.querySelectorAll(".gold-borde")
		    	goldborde = [].slice.call(goldborde);
		    	
		    	if (goldborde.length > 0) 
					{
						goldborde = null;	
				    	$("#descripcion_plan_id").val($(".titulo-gold").text() + " / " + $(".precio-gold").text() + " / " + $(".debitacion-gold").text());
						$("#planes_id").val($(".titulo-gold").data('codigo'));
					} 


	});

$(".btnEditarUsuario").on('click', function(event) {
		
		//alert('llego');
		var NombreUsuario = $("#EditarNombreUsuario").val().trim();

		if( NombreUsuario == null || NombreUsuario.length == 0 || /^\s+$/.test(NombreUsuario) ) {
			NombreUsuario = null;
			$("#ErrorMensaje-EditarNombreUsuario").text('El Nombre de Usuario No puede ser Vacio.');
  			$("#ErrorMensaje-EditarNombreUsuario").show();
  			$("#EditarNombreUsuario").focus();
  			return false;
			}

		var EditarApellidosUsuario = $("#EditarApellidosUsuario").val().trim();

		if( EditarApellidosUsuario == null || EditarApellidosUsuario.length == 0 || /^\s+$/.test(EditarApellidosUsuario) ) {
			EditarApellidosUsuario = null;
			$("#ErrorMensaje-EditarApellidosUsuario").text('Los Apellidos no pueden ser vacio.');
  			$("#ErrorMensaje-EditarApellidosUsuario").show();
  			$("#EditarApellidosUsuario").focus();
  			return false;
			}

		var CelularCuentaUsuario = $("#CelularCuentaUsuario").val().trim();

		if( CelularCuentaUsuario == null || CelularCuentaUsuario.length == 0 ) {
			CelularCuentaUsuario = null;
			$("#ErrorMensaje-editarCelularCuentaUsuario").text('El celular no puede ser vacio');
  			$("#ErrorMensaje-editarCelularCuentaUsuario").show();
  			$("#CelularCuentaUsuario").focus();
  			return false;
			}


		if (CelularCuentaUsuario.length < 9 && CelularCuentaUsuario.length > 0  )
			{
				CelularCuentaUsuario = null;
				$("#ErrorMensaje-editarCelularCuentaUsuario").text('El celular debe tener nueve(9) digitos');
	  			$("#ErrorMensaje-editarCelularCuentaUsuario").show();
	  			$("#CelularCuentaUsuario").focus();
	  			return false;

			}

		var cboeditardepartamento = $('#editardepartamento').val().trim();

		if( cboeditardepartamento == null || cboeditardepartamento.length == 0  ) {
			cboeditardepartamento = null;
			$("#ErrorMensaje-editardepartamento").text('Debe Seleccionar un Departamento.');
  			$("#ErrorMensaje-editardepartamento").show();
  			$("#editardepartamento").focus();
  			return false;
			}

		
		
		var cbodistrito = $('#editardistrito').val();

		if( cbodistrito == null || cbodistrito.length == 0  ) {
			cbodistrito = null;
			$("#ErrorMensaje-editardistrito").text('Debe Seleccionar un Distrito.');
  			$("#ErrorMensaje-editardistrito").show();
  			$("#editardistrito").focus();
  			return false;
			}


		var EditarDniUsuario = $("#EditarDniUsuario").val().trim();

		if( EditarDniUsuario == null || EditarDniUsuario.length == 0 ) {
			EditarDniUsuario = null;
			$("#ErrorMensaje-EditarDniUsuario").text('El Dni no puede ser vacio');
  			$("#ErrorMensaje-EditarDniUsuario").show();
  			$("#EditarDniUsuario").focus();
  			return false;
			}

		if (EditarDniUsuario.length < 8 && EditarDniUsuario.length > 0  )
			{
				EditarDniUsuario = null;
				$("#ErrorMensaje-EditarDniUsuario").text('El Dni debe tener ocho(8) digitos');
	  			$("#ErrorMensaje-EditarDniUsuario").show();
	  			$("#EditarDniUsuario").focus();
	  			return false;

			}



		var EditarDireccionUsuario = $("#EditarDireccionUsuario").val().trim();

		if( EditarDireccionUsuario == null || EditarDireccionUsuario.length == 0 ) {
			EditarDireccionUsuario = null;
			$("#ErrorMensaje-EditarDireccionUsuario").text('La direccion no puede ser vacia');
  			$("#ErrorMensaje-EditarDireccionUsuario").show();
  			$("#EditarDireccionUsuario").focus();
  			return false;
			}


	});


$(".btnAgregarComentario").on("click", function(evt) {
	$('#TituloCotizacion').text($(this).data('titulo-cotizacion'));
	$('#cotizaciones_id').text($(this).data('codigo-cotizacion'));
	//$("#cotizaciones_id").attr("value",$(this).data('codigo-cotizacion'));
});


$('#prov_descripcion').on("keypress",function (){
		$("#ErrorMensaje-prov_descripcion").hide();
	})


$('#prov_telefono').on("keypress",function (){
		$("#ErrorMensaje-prov_telefono").hide();
	})

$('#prov_celular').on("keypress",function (){
		$("#ErrorMensaje-prov_celular").hide();
	})


$('#prov_direccion').on("keypress",function (){
		$("#ErrorMensaje-prov_direccion").hide();
	})

$('#prov_razon_social').on("keypress",function (){
		$("#ErrorMensaje-prov_razon_social").hide();
	})

$('#prov_ruc').on("keypress",function (){
		$("#ErrorMensaje-prov_ruc").hide();
	})

$('#EditarDniUsuario').on("keypress",function (){
		$("#ErrorMensaje-EditarDniUsuario").hide();
	})

$('#EditarDireccionUsuario').on("keypress",function (){
		$("#ErrorMensaje-EditarDireccionUsuario").hide();
	})


$('#EditarNombreUsuario').on("keypress",function (){
		$("#ErrorMensaje-EditarNombreUsuario").hide();
	})

$('#EditarApellidosUsuario').on("keypress",function (){
		$("#ErrorMensaje-EditarApellidosUsuario").hide();
	})

$('#CelularCuentaUsuario').on("keypress",function (){
		$("#ErrorMensaje-editarCelularCuentaUsuario").hide();
	})



// Fin de Validaciones de Cuentas de Usuario.

});
