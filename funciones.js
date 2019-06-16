// JavaScript Carrusel inicio
$(document).ready(function () {
    $('#myCarousel').carousel({
        interval: 10000
    })
    $('.fdi-Carousel .item').each(function () {
        var next = $(this).next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }
        next.children(':first-child').clone().appendTo($(this));

        if (next.next().length > 0) {
            next.next().children(':first-child').clone().appendTo($(this));
        }
        else {
            $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
        }
    });
});
// JavaScript Carrusel fin


// JavaScript ajax- busqueda
$(document).ready(function() {
    $("#resultadoBusqueda").html('');
	});

	function buscar() {
    var textoBusqueda = $("input#busqueda").val();
 
     if (textoBusqueda != "") {
        $.post("buscar.php", {valorBusqueda: textoBusqueda}, function(mensaje) {
            $("#resultadoBusqueda").html(mensaje);
         }); 
     } else { 
        $("#resultadoBusqueda").html('');
        };
	};
	// JavaScript ajax- busqueda fin
	
	//busqueda usuarios
		function buscar2() {
    var textoBusqueda = $("input#busqueda").val();
 
     if (textoBusqueda != "") {
        $.post("buscar2.php", {valorBusqueda: textoBusqueda}, function(mensaje) {
            $("#resultadoBusqueda").html(mensaje);
         }); 
     } else { 
        $("#resultadoBusqueda").html('');
        };
	};
	//busqueda usuarios fin
	
	//JavaScript ampliacion imagen on mouse over
	function bigImg(x) {
		x.style.height = "450px";
		x.style.width = "375px";
	}

    function normalImg(x) {
		x.style.height = "300px";
		x.style.width = "250px";
	}
	//JavaScript ampliacion imagen on mouse over fin
	
	//  validacion nombre
	function validarNombre(){
	valor2 = document.getElementById("nombre").value;
	if( valor2 == null || valor2.length == 0 || /^\s+$/.test(valor2) ) {
	return false;
	}
	}
	//  validation apellidos
	function validarApellido1(){
	valor3 = document.getElementById("apellido1").value;
	if( valor3 == null || valor3.length == 0 || /^\s+$/.test(valor3) ) {
  	return false;
	}
	}
	function validarApellido2(){
	valor3 = document.getElementById("apellido2").value;
	if( valor3 == null || valor3.length == 0 || /^\s+$/.test(valor3) ) {
  	return false;
	}
	}
	
	/// javascript paypal
	
	
    paypal.Button.render({
      env: 'production', // Or 'sandbox',

      commit: true, // Show a 'Pay Now' button

      style: {
        color: 'gold',
        size: 'small'
      },

      payment: function(data, actions) {
        /* 
         * Set up the payment here 
         */
      },

      onAuthorize: function(data, actions) {
        /* 
         * Execute the payment here 
         */
      },

      onCancel: function(data, actions) {
        /* 
         * Buyer cancelled the payment 
         */
      },

      onError: function(err) {
        /* 
         * An error occurred during the transaction 
         */
      }
    }, '#paypal-button');
  