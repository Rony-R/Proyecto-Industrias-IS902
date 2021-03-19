$(document).ready(function () {
    $('#btn-comentarios').click(function () { 

        var parametros = "Comentario=" + $('#txta-comentario').val();

        if($("#txta-comentario").val() == ""){
            alert('No es posible agregar un comentario vacio, por favor añadir algun valor');
        }
        else{
            /*$.ajax({
                url: "ajax/api.php?accion=agregar-comentario-publicacion",
                method: "POST",
                data: parametros,
                dataType: "json",
                success:function(respuesta){
                    alert("Comentario añadido correctamente");
                    location.reload();
                },
                error:function(e){
                    console.log(e);
                }
            });*/

            alert(parametros);
        }
    });


    //Ajax con el que se mandaria a llamar la información de los comentarios y se imprimiria en la pagina
    /*$.ajax({
        url: "ajax/api.php?accion=obtener-comentario-publicacion",
        type: "GET",
        dataType: 'json',
        success:function(response){
            for(var i=0;i<response.length;i++){
                $('#div-comentarios').append('<div class="row mb-1">'+
                '<div class="col-1">'+
                  '<img src="img/profile-examples/goku.jpg" class="img-fluid rounded-circle" alt="">'+
                '</div>'+
                '<div class="col-11">'+
                  '<span class="card-subtitle text-primary fw-bold">Goku</span>'+
                  '<p class="card-text">Aqui ira un comentario X con distintas lineas, distintos parrafos, con mucha información que comentar acerca de la publicación realizada</p>'+
                '</div>'+
              '</div>'+
              '<hr>');
            }   
        },
        error:function(e){
            console.log(e);
        }
    });*/ 

    $('#btn-login').click(function () {  
        var parametros = "Correo=" + $('#txt-correo').val() +"&"+"Password="+$("#txt-password").val();

        if($("txt-correo").val() == "" || $("#txt-password").val() == ""){
            alert("Correo o Contraseña Incorrecta");
        }
        else{
            alert(parametros);
        }
    });
});

$(".toggle").click(function () {
  if ($(".item").hasClass("active")) {
    $(".item").removeClass("active");
  } else {
    $(".item").addClass("active");
  }
});

function validarEmail(id) {
  var patron = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  if (patron.test($("#" + id).val())) {
    $("#" + id).addClass("is-valid");
    $("#" + id).removeClass("is-invalid");
    return true;
  } else {
    $("#" + id).addClass("is-invalid");
    $("#" + id).removeClass("is-valid");
    return false;
  }
};

function validarPass(id) {
  var patron = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&#.$($)$-$_])[A-Za-z\d$@$!%*?&#.$($)$-$_]{8,15}$/;;
  console.log(patron.test($("#" + id).val()))
  console.log(($("#" + id).val()))
  if (patron.test($("#" + id).val())) {
    $("#" + id).addClass("is-valid");
    $("#" + id).removeClass("is-invalid");
    return true;
  } else {
    $("#" + id).addClass("is-invalid");
    $("#" + id).removeClass("is-valid");
    return false;
  }
};

var validarCampoVacio = function (id) {
  
    if ($("#" + id).val() == "") {
      $("#" + id).removeClass("is-valid");
      $("#" + id).addClass("is-invalid");
      return false;
    } else {
      $("#" + id).removeClass("is-invalid");
      $("#" + id).addClass("is-valid");
      return true;
    
  }
};





function validarPersona() {

  var v1 = validarCampoVacio("nombreCuentaPersonal");
  var v2 = validarCampoVacio("apellidoCuentaPersonal");
  var v3 = validarCampoVacio("correoPersonal");
  var v4 = validarCampoVacio("telefonoPersonal");
  var v5 = validarCampoVacio("passwordCuentaPersonal");

  var v7 = validarEmail("correoPersonal");
  var v8 = validarPass("passwordCuentaPersonal");

  if (!v7) {
    $("#validacion-correoPersonal").html("Ingresa un Correo Valido: ejemplo@gmail.com");
    console.log(1)
  } else{
    if(!v8){
      $("#validacion-passwordPersonal").html(`Requisitos:
                                            <ul class="list-group">
                                                <li>Minimo 8 caracteres</li>
                                                <li>Maximo 15</li>
                                                <li>Al menos una letra mayúscula</li>
                                                <li>Al menos una letra minucula</li>
                                                <li>Al menos un dígito</li>
                                                <li>No espacios en blanco</li>
                                                <li>Al menos 1 caracter especial</li>
                                            </ul>`);
                                            console.log(2)
    }else{
      
        if (v1 && v2 && v3 && v4 && v5) {
          console.log(3)
          var data = `nombre=${$("#nombreCuentaPersonal").val()}&apellido=${$(
            "#apellidoCuentaPersonal"
          ).val()}&correo=${$("#correoPersonal").val()}&telefono=${$(
            "#telefonoPersonal"
          ).val()}&password=${$("#passwordCuentaPersonal").val()}`;
          console.log("La data es: " + data);
        } else {
          console.log(4)
          alert("Todos los campos son obligatorios");
        }
      
    }

  }

  
};


function validarEmpresa() {

  var v1 = validarCampoVacio("nombreEmpresa");
  var v2 = validarCampoVacio("direccionEmpresa");
  var v3 = validarCampoVacio("correoEmpresa");
  var v4 = validarCampoVacio("telefonoEmpresa");
  var v5 = validarCampoVacio("passwordCuentaEmpresa");

  var v7 = validarEmail("correoEmpresa");
  var v8 = validarPass("passwordCuentaEmpresa");

  if (!v7) {
    $("#validacion-correoEmpresa").html("Ingresa un Correo Valido: ejemplo@gmail.com");
  } 
  if(!v8){
    $("#validacion-passwordEmpresa").html(`Requisitos:
                                          <ul class="list-group">
                                              <li>Minimo 8 caracteres</li>
                                              <li>Maximo 15</li>
                                              <li>Al menos una letra mayúscula</li>
                                              <li>Al menos una letra minucula</li>
                                              <li>Al menos un dígito</li>
                                              <li>No espacios en blanco</li>
                                              <li>Al menos 1 caracter especial</li>
                                          </ul>`);
  }else{
    
      if (v1 && v2 && v3 && v4 && v5) {
        var data = `nombre=${$("#nombreEmpresa").val()}&direccion=${$(
          "#direccionEmpresa"
        ).val()}&correo=${$("#correoEmpresa").val()}&telefono=${$(
          "#telefonoEmpresa"
        ).val()}&password=${$("#passwordCuentaEmpresa").val()}`;
        console.log("La data es: " + data);
      } else {
        alert("Todos los campos son obligatorios");
      }
    
  }
  
};
