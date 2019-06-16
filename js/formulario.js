 $(function() {

         $("#nombre_error_message").hide();
         $("#apellido1_error_message").hide();
         $("#apellido_error_message").hide();
         $("#apellido_error_message").hide();
         $("#nick_error_message").hide();
         $("#telefono_error_message").hide();
         $("#retype_password_error_message").hide();

         var error_nombre = false;
         var error_apellido1 = false;
         var error_apellido = false;
         var error_nick = false;
         var error_telefono = false;
         var error_password = false;
         var error_retype_password = false;

         $("#form_nombre").focusout(function(){
            check_nombre();
         });
         $("#form_apellido1").focusout(function() {
            check_apellido1();
         });
           $("#form_apellido").focusout(function() {
            check_apellido();
         });
         $("#form_nick").focusout(function() {
            check_nick();
         });

         $("#form_ciudad").focusout(function() {
            check_ciudad();
         });

         $("#form_telefono").focusout(function() {
            check_telefono();
         });
      
         $("#form_password").focusout(function() {
            check_password();
         });
         $("#form_retype_password").focusout(function() {
            check_retype_password();
         });

         function check_nombre() {
            var pattern = /^[a-zA-Z]*$/;
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

         function check_apellido1() {
            var pattern = /^[a-zA-Z]*$/;
            var apellido1 = $("#form_apellido1").val()
            if (pattern.test(apellido1) && apellido1 !== '') {
               $("#apellido1_error_message").hide();
               $("#form_apellido1").css("border-bottom","2px solid #34F458");
            } else {
               $("#apellido1_error_message").html("solo debe contener letras");
               $("#apellido1_error_message").show();
               $("#form_apellido1").css("border-bottom","2px solid #F90A0A");
               error_nombre = true;
            }
         }

          function check_apellido() {
            var pattern = /^[a-zA-Z]*$/;
            var apellido = $("#form_apellido").val()
            if (pattern.test(apellido) && apellido !== '') {
               $("#apellido_error_message").hide();
               $("#form_apellido").css("border-bottom","2px solid #34F458");
            } else {
               $("#apellido_error_message").html("solo debe contener letras");
               $("#apellido_error_message").show();
               $("#form_apellido").css("border-bottom","2px solid #F90A0A");
               error_apellido = true;
            }
         }

         function check_nick() {
            var pattern = /^[a-zA-Z0-9]+$/;
            var nick = $("#form_nick").val()
            if (pattern.test(nick) && nick !== '') {
               $("#nick_error_message").hide();
               $("#form_nick").css("border-bottom","2px solid #34F458");
            } else {
               $("#nick_error_message").html("debe contener solo numeros y letras");
               $("#nick_error_message").show();
               $("#form_nick").css("border-bottom","2px solid #F90A0A");
               error_nick = true;
            }
         }

       

           function check_telefono() {
            var pattern = /^\d{9,}$/;
            var telefono = $("#form_telefono").val();
            if (pattern.test(telefono) && telefono !== '') {
               $("#telefono_error_message").hide();
               $("#form_telefono").css("border-bottom","2px solid #34F458");

            } else {
               $("#telefono_error_message").html("numero incorrecto ");
               $("#telefono_error_message").show();
               $("#form_telefono").css("border-bottom","2px solid #F90A0A");
               error_nick = true;
            }
         }


         function check_password() {
            var pattern = /^(?=.*?[A-Z])(?=(.*[a-z]){1,})(?=(.*[\d]){1,})(?=(.*[\W]){1,})(?!.*\s).{8,}$/;
            var password_length = $("#form_password").val();
            if  (pattern.test(password_length) && password_length !=='') {
                  $("#password_error_message").hide();
                  $("#form_password").css("border-bottom","2px solid #34F458");
            } else {
               $("#password_error_message").html("ocho caracteres con un numero, mayuscula, letra y simbolo");
               $("#password_error_message").show();
               $("#form_password").css("border-bottom","2px solid #F90A0A");
               error_password = true;
            }
         }

         function check_retype_password() {
            var password = $("#form_password").val();
            var retype_password = $("#form_retype_password").val();
            if (password !== retype_password) {
               $("#retype_password_error_message").html("No coincide");
               $("#retype_password_error_message").show();
               $("#form_retype_password").css("border-bottom","2px solid #F90A0A");
               error_retype_password = true;
            } else {
               $("#retype_password_error_message").hide();
               $("#form_retype_password").css("border-bottom","2px solid #34F458");
            }
         }

        

         $("#registration_form").submit(function() {
            error_nombre = false;
            error_apellido1 = false;
            error_apellido = false;
            error_nick = false;
            error_telefono = false;
            error_password = false;
            error_retype_password = false;

            check_nombre();
            check_apellido1();
            check_apellido();
            check_nick();
            check_telefono();
            check_password();
            check_retype_password();

            if (error_nombre === false && error_apellido1 === false && error_apellido == false && error_nick == false &&  error_telefono == false && error_password === false && error_retype_password === false) {
               return true;
            } else {
               alert("Hay errores en el formulario");
               return false;
            }


         });
      });