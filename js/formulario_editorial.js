 $(function() {

         $("#nombre_error_message").hide();
         $("#pais_error_message").hide();
         $("#cif_error_message").hide();
       

         var error_nombre = false;
         var error_ciudad = false;
         var error_cif = false;
        

         $("#form_nombre").focusout(function(){
            check_nombre();
         });
        
         $("#form_pais").focusout(function() {
            check_pais();
         });

         $("#form_cif").focusout(function() {
            check_cif();
         });
      
        

         function check_nombre() {
            var pattern = /^[a-zA-Z]*$/;
            var nombre = $("#form_nombre").val();
            if (pattern.test(nombre) && nombre !== '') {
               $("#nombre_error_message").hide();
               $("#form_nombre").css("border-bottom","2px solid #34F458");
            } else {
               $("#nombre_error_message").html("Ssolo debe contener letras");
               $("#nombre_error_message").show();
               $("#form_nombre").css("border-bottom","2px solid #F90A0A");
               error_nombre = true;
            }
         }

    

         function check_pais() {
            var pattern = /^[a-zA-Z0-9_ ]*$/;
            var pais = $("#form_pais").val()
            if (pattern.test(pais) && pais !== '') {
               $("#pais_error_message").hide();
               $("#form_pais").css("border-bottom","2px solid #34F458");
            } else {
               $("#pais_error_message").html("debe contener solo numeros y letras");
               $("#pais_error_message").show();
               $("#form_pais").css("border-bottom","2px solid #F90A0A");
               error_pais = true;
            }
         }

         

           function check_cif() {
            var pattern = /^\d{9,}$/;
            var cif = $("#form_cif").val();
            if (pattern.test(cif) && cif !== '') {
               $("#cif_error_message").hide();
               $("#form_cif").css("border-bottom","2px solid #34F458");

            } else {
               $("#cif_error_message").html("numero incorrecto ");
               $("#cif_error_message").show();
               $("#form_cif").css("border-bottom","2px solid #F90A0A");
               error_pais = true;
            }
         }


      
        

         $("#registration_form").submit(function() {
            error_nombre = false;
            error_pais = false;
            error_cif = false;
  

            check_nombre();
            check_pais();
            check_cif();


            if (error_nombre === false &&  error_pais == false &&  error_cif == false ) {
               return true;
            } else {
               alert("Hay errores en el formulario");
               return false;
            }


         });
      });