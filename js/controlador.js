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


    //Ajax con el que se mandaria a llamar la información del usuario que inserto la publicación

    $.ajax({
      type: "GET",
      url: "ajax/api.php?accion=ver-informacion-usuario-publicacion",
      dataType: "json",
      success: function (response) {
        for(var i=0;i<response.length;i++){
                $('#div-usuario-publicacion').append('<div class="card border-primary">'+
                    '<div class="card-header text-center">'+
                      '<h5 class="card-subtitle">'+response[i].nombre+' '+response[i].apellido+'</h5>'+ 
                    '</div>'+
                    '<div class="card-body text-center">'+
                      '<img src="img/profile-examples/goku.jpg" class="img-fluid rounded-circle" alt="">'+
                    '</div>'+
                    '<div class="card-footer">'+
                      '<table class="table table-borderless">'+
                        '<tbody>'+
                          '<tr>'+
                            '<td>País:</td>'+
                            '<td>'+response[i].pais+'</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td>Correo:</td>'+
                            '<td>'+response[i].correo+'</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td>Teléfono:</td>'+
                            '<td>'+response[i].telefono+'</td>'+
                          '</tr>'+
                        '</tbody>'+
                      '</table>'+
                    '</div>'+
                '</div>');
            }
      },
      error:function(e){
        console.log(e);
      }
    });


    //Ajax con el que se generaria la información de la publicación

    $.ajax({
      type: "GET",
      url: "ajax/api.php?accion=ver-informacion-publicacion",
      dataType: "json",
      success: function (response) {
        for(var i=0;i<response.length;i++){
            $('#div-card-title').append('<h5 class="card-title">'+response[i].nombre_proyecto+'</h5>');
            $('#div-card-info').append('<p>'+response[i].descripcion+'</p>');
        }          
      },
      error:function(e){
        console.log(e);
      }
    });

    //Ajax con el que se mandaria a llamar la información de los comentarios y se imprimiria en la pagina
    $.ajax({
        url: "ajax/api.php?accion=ver-comentario-publicacion",
        type: "GET",
        dataType: 'json',
        success:function(response){
            for(var i=0;i<response.length;i++){
                $('#div-comentarios').append('<div class="row mb-1 mt-1">'+
                '<div class="col-1">'+
                  '<img src="img/profile-examples/goku.jpg" class="img-fluid rounded-circle" alt="">'+
                '</div>'+
                '<div class="col-11">'+
                  '<span class="card-subtitle fw-bold" style="color: #681e99;">'+response[i].nombre+' '+response[i].apellido+' </span>'+
                  '<span class="card-subtitle text-primary text-muted">'+response[i].fecha_comentario+'</span>'+
                  '<p class="card-text">'+response[i].comentario+'</p>'+
                '</div>'+
              '</div>'+
              '<hr>');
            }   
        },
        error:function(e){
            console.log(e);
        }
    });

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
