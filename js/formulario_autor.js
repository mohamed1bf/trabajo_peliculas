 $(function() {

         $("#nombre_error_message").hide();
        

         var error_nombre = false;
       

         $("#form_nombre").focusout(function(){
            check_nombre();
         });
         

         function check_nombre() {
            var pattern = /^[a-zA-Z_ ]*$/;
            var nombre = $("#form_nombre").val();
            if (pattern.test(nombre) && nombre !== '') {
               $("#nombre_error_message").hide();
               $("#form_nombre").css("border-bottom","2px solid #34F458");
            } else {
               $("#nombre_error_message").html("Solo debe contener letras");
               $("#nombre_error_message").show();
               $("#form_nombre").css("border-bottom","2px solid #F90A0A");
               error_nombre = true;
            }
         }

       
        

         $("#registration_form").submit(function() {
            error_nombre = false;
          

            check_nombre();
            

            if (error_nombre === false ) {
               return true;
            } else {
               alert("Hay errores en el formulario");
               return false;
            }


         });
      });