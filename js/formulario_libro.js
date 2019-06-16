 $(function() {

         $("#titulo_error_message").hide();
         $("#edicion_error_message").hide();
         $("#formato_error_message").hide();
         $("#sipnosis_error_message").hide();
         
        
        

         var error_titulo = false;
         var error_edicion = false;
         var error_formato = false;
         var error_sipnosis = false;
         

         $("#form_titulo").focusout(function(){
            check_titulo();
         });

         $("#form_edicion").focusout(function() {
            check_edicion();
         });

         $("#form_formato").focusout(function() {
            check_formato();
         });

          $("#form_sipnosis").focusout(function() {
            check_sipnosis();
         });
           
       
      
        

         function check_titulo() {
            var pattern = /^[a-zA-Z0-9_ ]*$/;
            var titulo = $("#form_titulo").val();
            if (pattern.test(titulo) && titulo !== '') {
               $("#titulo_error_message").hide();
               $("#form_titulo").css("border-bottom","2px solid #34F458");
            } else {
               $("#titulo_error_message").html("Titulo incorrecto");
               $("#titulo_error_message").show();
               $("#form_titulo").css("border-bottom","2px solid #F90A0A");
               error_titulo = true;
            }
         }

         function check_edicion() {
            var pattern = /^\d{1,100}$/;
            var edicion = $("#form_edicion").val();
            if (pattern.test(edicion) && edicion !== '') {
               $("#edicion_error_message").hide();
               $("#form_edicion").css("border-bottom","2px solid #34F458");

            } else {
               $("#edicion_error_message").html("Solo debe contener numeros ");
               $("#edicion_error_message").show();
               $("#form_edicion").css("border-bottom","2px solid #F90A0A");
               error_nick = true;
            }
         }

         function check_formato() {
            var pattern = /^[a-zA-Z_ ]*$/;
            var formato = $("#form_formato").val()
            if (pattern.test(formato) && formato !== '') {
               $("#formato_error_message").hide();
               $("#form_formato").css("border-bottom","2px solid #34F458");
            } else {
               $("#formato_error_message").html("solo debe contener letras");
               $("#formato_error_message").show();
               $("#form_formato").css("border-bottom","2px solid #F90A0A");
               error_formato = true;
            }
         }

         function check_sipnosis() {
            var pattern = /^[a-zA-Z0-9_ ]*$/;
            var sipnosis = $("#form_sipnosis").val()
            if (pattern.test(sipnosis) && sipnosis !== '') {
               $("#sipnosis_error_message").hide();
               $("#form_sipnosis").css("border-bottom","2px solid #34F458");
            } else {
               $("#sipnosis_error_message").html("no debe estar vacio");
               $("#sipnosis_error_message").show();
               $("#form_sipnosis").css("border-bottom","2px solid #F90A0A");
               error_formato = true;
            }
         }

          

        

        
        


        
        

         $("#registration_form").submit(function() {
            error_titulo = false;
            error_edicion = false;
            error_formato = false;
            error_sipnosis = false;
            
           
        

            check_titulo();
            check_edicion();
            check_formato();
            check_sipnosis();
            
          

            if (error_titulo === false &&  error_edicion == false && error_formato === false  && error_sipnosis === false ) {
               return true;
            } else {
               alert("Hay errores en el formulario");
               return false;
            }


         });
      });