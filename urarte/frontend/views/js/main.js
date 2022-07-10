/*=============================================
ENLACES PAGINACIÓN
=============================================*/

var url = window.location.href;

var index = url.split("/");

//pasar el 6 a 4 cuando este en un servidor para que funcione el color en la paginacion
var pagCurrent = index[4];

if(isNaN(pagCurrent)){

    $("#item1").addClass("pagination__item--active");

}else{
    
    $("#item"+pagCurrent).addClass("pagination__item--active");    

}


(function($) {

	/*=============================================
    Función Preload
    =============================================*/

    function preload(){

        var preloadFalse = $(".preloadFalse");
        var preloadTrue = $(".preloadTrue");

        if(preloadFalse.length > 0){

            preloadFalse.each(function(i){

                var el = $(this);

                $(el).ready(function(){

                    $(preloadTrue[i]).remove();
                    $(el).css({"opacity":1,"height":"auto"})

                })

            })

        }
    }

    /*=============================================
    Validación Bootstrap 4
    =============================================*/

    function validateBS4(){

        (function() {
          'use strict';
          window.addEventListener('load', function() {
            // Get the forms we want to add validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
              form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                  event.preventDefault();
                  event.stopPropagation();
                }
                form.classList.add('was-validated');
              }, false);
            });
          }, false);
        })();
   
    }

    /*=============================================
    Capturar email login 
    =============================================*/
    function rememberLogin(){

        if(localStorage.getItem("emailRem") != null){

            $('[name="loginEmail"]').val(localStorage.getItem("emailRem"));

        }

        if(localStorage.getItem("checkRem") != null && localStorage.getItem("checkRem")){

            $('#remember-me').attr("checked", true);
            
        }

    }

    /*=============================================
    Ejecutar funciones globales
    =============================================*/

    $(function() {

    	preload();
        validateBS4();
        rememberLogin();

    });

})(jQuery);


/*=============================================
Validar correo repetido
=============================================*/

function validateEmailRepeat(event){

    var settings = {
      "url": $("#urlApi").val()+"users?equalTo="+event.target.value+"&linkTo=email_user&equalTo_=1&linkTo_=status_user&select=email_user,method_user",
      "method": "GET",
      "timeout": 0,
    };

    $.ajax(settings).done(function (response) {
        console.log("response", response);
      
        if(response.status == 200){

            $(event.target).parent().addClass("was-validated");

            $(event.target).parent().children(".invalid-feedback").html("El correo electrónico ya existe en la base de datos.");

            event.target.value = "";

            return;

        }

    });

    validateJS(event, "email");
}


/*=============================================
Función para validar formulario
=============================================*/
function validateJS(event, type){

    /*=============================================
    Validamos texto
    =============================================*/

    if(type == "text"){

        var pattern = /^[A-Za-zñÑáéíóúÁÉÍÓÚ ]{1,}$/;

        if(!pattern.test(event.target.value)){

            $(event.target).parent().addClass("was-validated");

            $(event.target).parent().children(".invalid-feedback").html("No se pueden usar caracteres especiales.");

            event.target.value = "";

            return;

        }

    }

    /*=============================================
    Validamos email
    =============================================*/

    if(type == "email"){

        var pattern = /^[^0-9][.a-zA-Z0-9_]+([.][.a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/;

        if(!pattern.test(event.target.value)){

            $(event.target).parent().addClass("was-validated");

            $(event.target).parent().children(".invalid-feedback").html("El correo electrónico es inválido.");

            event.target.value = "";

            return;

        }

    }

    /*=============================================
    Validamos contraseña
    =============================================*/

    if(type == "password"){

        var pattern = /^[#\\=\\$\\;\\*\\_\\?\\¿\\!\\¡\\:\\.\\,\\0-9a-zA-Z]{1,}$/;

        if(!pattern.test(event.target.value)){

            $(event.target).parent().addClass("was-validated");

            $(event.target).parent().children(".invalid-feedback").html("La contraseña es inválida.");

            event.target.value = "";

            return;

        }

    }

    /*=============================================
    Validamos imagen
    =============================================*/

    if(type == "image"){

        var image = event.target.files[0];

        /*=============================================
        Validamos el formato
        =============================================*/

        if(image["type"] !== "image/jpeg" && image["type"] !== "image/png"){

            fncSweetAlert("error", "The image must be in JPG or PNG format", null)

            return;
            
        }

        /*=============================================
        Validamos el tamaño
        =============================================*/

        else if(image["size"] > 2000000){

            fncSweetAlert("error", "Image must not weigh more than 2MB", null)

            return;

        }

        /*=============================================
        Mostramos la imagen temporal
        =============================================*/

        else{

            var data = new FileReader();
            data.readAsDataURL(image);

            $(data).on("load", function(event){

                var path = event.target.result; 

                $(".changePicture").attr("src", path);    

            })

        }

    }

}

/*=============================================
Función para recordar email en el login
=============================================*/

function remember(event){

    if(event.target.checked){

        localStorage.setItem("emailRem", $('[name="loginEmail"]').val());
        localStorage.setItem("checkRem", true);

    }else{

        localStorage.removeItem("emailRem");
        localStorage.removeItem("checkRem");

    }

}


