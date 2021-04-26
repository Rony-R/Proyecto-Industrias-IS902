$(document).ready(function () {
  $("#btn-comentarios").click(function () {
    var parametros =
      "idUsuario=" +
      $("#txt-codigo-usuario").val() +
      "&idPublicacion=" +
      $("#id-publicacion").val() +
      "&Comentario=" +
      $("#txta-comentario").val();

    if ($("#txta-comentario").val() == "") {
      alert(
        "No es posible agregar un comentario vacio, por favor añadir algun valor"
      );
    } else {
      $.ajax({
        url: "ajax/api.php?accion=insertar-comentario",
        method: "POST",
        data: parametros,
        dataType: "json",
        success: function (respuesta) {
          alert("Comentario añadido correctamente");
          location.reload();
        },
        error: function (e) {
          console.log(e);
        },
      });
    }
  });

  //Ajax con el que se mandaria a llamar la información del usuario que inserto la publicación

  var params = new URLSearchParams(location.search);
  var publicacion = params.get("publicacion");
  var parametros = "publicacion=" + publicacion;

  $.ajax({
    type: "GET",
    url: "ajax/api.php?accion=ver-informacion-usuario-publicacion",
    dataType: "json",
    data: parametros,
    success: function (response) {
      for (var i = 0; i < response.length; i++) {
        $("#div-usuario-publicacion").append(
          '<div class="card border-primary">' +
            '<div class="card-header text-center">' +
            '<h5 class="card-subtitle">' +
            response[i].nombre +
            "</h5>" +
            "</div>" +
            '<div class="card-body text-center">' +
            '<img src="img/profile-examples/goku.jpg" class="img-fluid rounded-circle" alt="">' +
            "</div>" +
            '<div class="card-footer">' +
            '<table class="table table-borderless">' +
            "<tbody>" +
            "<tr>" +
            "<td>País:</td>" +
            "<td>" +
            response[i].pais +
            "</td>" +
            "</tr>" +
            "<tr>" +
            "<td>Correo:</td>" +
            "<td>" +
            response[i].correo +
            "</td>" +
            "</tr>" +
            "<tr>" +
            "<td>Teléfono:</td>" +
            "<td>" +
            response[i].telefono +
            "</td>" +
            "</tr>" +
            "<tr>" +
            "<td>Dirección:</td>" +
            "<td>" +
            response[i].direccion +
            "</td>" +
            "</tr>" +
            "</tbody>" +
            "</table>" +
            "</div>" +
            "</div>"
        );
      }
    },
    error: function (e) {
      console.log(e);
    },
  });

  //Ajax con el que se mandaria a llamar la información de la publicacion
  $.ajax({
    type: "GET",
    url: "ajax/api.php?accion=ver-informacion-publicacion",
    data: parametros,
    dataType: "json",
    success: function (response) {
      for (var i = 0; i < response.length; i++) {
        $("#div-card-title").append(
          '<h3 class="card-title fw-bold">' +
            response[i].nombre_proyecto +
            "</h3>"
        );
        $("#div-card-info").append(
          "<p>" +
            response[i].descripcion +
            "</p>" +
            '<span class="text-muted">Categoria: ' +
            response[i].categoria +
            "</span><br>" +
            '<span class="text-muted">Presupuesto: ' +
            response[i].presupuesto +
            "</span>"
        );
      }
    },
    error: function (e) {
      console.log(e);
    },
  });

  $.ajax({
    type: "GET",
    url: "ajax/api.php?accion=ver-tipos-usuarios",
    dataType: "json",
    success: function (response) {
      for (var i = 0; i < response.length; i++) {
        $("#slc-tipo-cuenta").append(
          "<option value='" +
            response[i].id_tipo_usuario +
            "'>" +
            response[i].tipo_usuario +
            "</option>"
        );
      }
    },
    error: function (e) {
      console.log(e);
    },
  });

  $.ajax({
    type: "GET",
    url: "ajax/api.php?accion=ver-paises",
    dataType: "json",
    success: function (response) {
      for (var i = 0; i < response.length; i++) {
        $("#slc-paises").append(
          "<option value='" +
            response[i].id_pais +
            "'>" +
            response[i].pais +
            "</option>"
        );
      }
    },
    error: function (e) {
      console.log(e);
    },
  });

  //Ajax con el que se mandaria a llamar las solicitudes de dicha publicacion
  $.ajax({
    type: "GET",
    url: "ajax/api.php?accion=ver-solicitudes",
    data: parametros,
    dataType: "json",
    success: function (response) {
      for (var i = 0; i < response.length; i++) {
        $("#div-nombre-apellido").append(
          '<h3 class="card-title fw-bold">' +
            response[i].nombre +
            " " +
            response[i].apellido +
            "</h3>"
        );
        $("#div-contacto").append(
          '<span class="text-muted">Correo: ' +
            response[i].correo +
            "</span><br>" +
            '<span class="text-muted">Telefono: ' +
            response[i].telefono +
            "</span><br>" +
            '<span class="text-muted">Pais: ' +
            response[i].pais +
            "</span><br>" +
            '<span class="text-muted">Fecha de la solicitud: ' +
            response[i].fecha_solicitud +
            "</span>"
        );
      }
    },
    error: function (e) {
      console.log(e);
    },
  });

  //Ajax con el que se mandaria a llamar la información de los comentarios y se imprimiria en la pagina

  $.ajax({
    url: "ajax/api.php?accion=ver-comentario-publicacion",
    type: "GET",
    data: parametros,
    dataType: "json",
    success: function (response) {
      for (var i = 0; i < response.length; i++) {
        $("#div-comentarios").append(
          '<div class="row mb-1 mt-1">' +
            '<div class="col-1">' +
            '<img src="img/profile-examples/goku.jpg" class="img-fluid rounded-circle" alt="">' +
            "</div>" +
            '<div class="col-11">' +
            '<span class="card-subtitle fw-bold" style="color: #681e99;">' +
            response[i].nombre +
            " " +
            response[i].apellido +
            " </span>" +
            '<span class="card-subtitle text-primary text-muted">' +
            response[i].fecha_comentario +
            "</span>" +
            '<p class="card-text">' +
            response[i].comentario +
            "</p>" +
            "</div>" +
            "</div>" +
            "<hr>"
        );
      }
    },
    error: function (e) {
      console.log(e);
    },
  });

  $("#btn-login").click(function () {
    var parametros =
      "Correo=" +
      $("#txt-correo").val() +
      "&" +
      "Password=" +
      $("#txt-password").val();

    if ($("txt-correo").val() == "" || $("#txt-password").val() == "") {
      alert("Correo o Contraseña Incorrecta");
    } else {
      $.ajax({
        url: "ajax/login.php",
        method: "POST",
        data: parametros,
        dataType: "json",
        success: function (respuesta) {
          function redireccionarPagina() {
            if (respuesta.codigoResultado == 0) {
              window.location.href = "publicaciones.php";
              $("#txt-correo").val("");
              $("#txt-contrasenia").val("");
            } else {
              alert("Correo o contraseña incorrecta");
              window.location.reload();
            }
          }
          window.setTimeout(redireccionarPagina, 2000);
        },
        error: function (e) {
          console.log(e);
        },
      });
    }
  });

  $("#btn-enviar-solicitud").click(function () {
    var parametros =
      "idUsuario=" +
      $("#txt-codigo-usuario").val() +
      "&idPublicacion=" +
      $("#id-publicacion").val();

    $.ajax({
      type: "POST",
      url: "ajax/api.php?accion=enviar-solicitud",
      data: parametros,
      dataType: "JSON",
      success: function (response) {
        alert("Solicitud enviada exitosamente");
        location.reload();
      },
      error: function (e) {
        console.log(e);
      },
    });
  });

  var parametrosValidacion =
    "idUsuario=" +
    $("#txt-codigo-usuario").val() +
    "&idPublicacion=" +
    $("#id-publicacion").val();
  $.ajax({
    type: "GET",
    url: "ajax/api.php?accion=limitar-solicitudes",
    data: parametrosValidacion,
    dataType: "JSON",
    success: function (response) {
      for (var i = 0; i < response.length; i++) {
        if (response[i].cantidadSolicitudes == 1) {
          $("#btn-solicitud").addClass("d-none");
        }
      }
    },
    error: function (e) {
      console.log(e);
    },
  });
});

$("#slc-tipo-cuenta").change(function () {
  if ($("#slc-tipo-cuenta").val() == 1) {
    $("#div-nombre").removeClass("d-none");
    $("#div-apellido").removeClass("d-none");
    $("#div-correo").removeClass("d-none");
    $("#div-contraseña").removeClass("d-none");
    $("#div-repetir-contraseña").removeClass("d-none");
    $("#div-telefono").removeClass("d-none");
    $("#div-direccion").addClass("d-none");
    $("#div-pais").removeClass("d-none");
    $("#txt-nombre").val("");
    $("#txt-apellido").val("");
    $("#txt-correo").val("");
    $("#txt-contraseña").val("");
    $("#txt-repetir-contraseña").val("");
    $("#txt-telefono").val("");
    $("#txt-direccion").val("");
    $("#slc-paises").val("0");
  } else if ($("#slc-tipo-cuenta").val() == 2) {
    $("#div-nombre").removeClass("d-none");
    $("#div-correo").removeClass("d-none");
    $("#div-apellido").addClass("d-none");
    $("#div-contraseña").removeClass("d-none");
    $("#div-repetir-contraseña").removeClass("d-none");
    $("#div-telefono").removeClass("d-none");
    $("#div-direccion").removeClass("d-none");
    $("#div-pais").removeClass("d-none");
    $("#txt-nombre").val("");
    $("#txt-apellido").val("");
    $("#txt-correo").val("");
    $("#txt-contraseña").val("");
    $("#txt-repetir-contraseña").val("");
    $("#txt-telefono").val("");
    $("#txt-direccion").val("");
    $("#slc-paises").val("0");
  } else {
    $("#div-nombre").addClass("d-none");
    $("#div-correo").addClass("d-none");
    $("#div-apellido").addClass("d-none");
    $("#div-contraseña").addClass("d-none");
    $("#div-repetir-contraseña").addClass("d-none");
    $("#div-telefono").addClass("d-none");
    $("#div-direccion").addClass("d-none");
    $("#div-pais").addClass("d-none");
  }
});

$("#btn-signup").click(function () {
  parametrosFreelancer =
    "nombre=" +
    $("#txt-nombre").val() +
    "&" +
    "apellido=" +
    $("#txt-apellido").val() +
    "&" +
    "correo=" +
    $("#txt-correo").val() +
    "&" +
    "contraseña=" +
    $("#txt-contraseña").val() +
    "&" +
    "telefono=" +
    $("#txt-telefono").val() +
    "&" +
    "tipocuenta=" +
    $("#slc-tipo-cuenta").val() +
    "&" +
    "pais=" +
    $("#slc-paises").val();

  parametrosEmpresa =
    "nombre=" +
    $("#txt-nombre").val() +
    "&" +
    "correo=" +
    $("#txt-correo").val() +
    "&" +
    "contraseña=" +
    $("#txt-contraseña").val() +
    "&" +
    "telefono=" +
    $("#txt-telefono").val() +
    "&" +
    "direccion=" +
    $("#txt-direccion").val() +
    "&" +
    "tipocuenta=" +
    $("#slc-tipo-cuenta").val() +
    "&" +
    "pais=" +
    $("#slc-paises").val();

  if ($("#slc-tipo-cuenta").val() == 0 || $("#slc-tipo-cuenta").val() == "") {
    alert("Seleccione un tipo de usuario");
  } else if ($("#slc-tipo-cuenta").val() == 1) {
    if (
      $("#txt-nombre").val() == "" ||
      $("#txt-apellido").val() == "" ||
      $("#txt-correo").val() == "" ||
      $("#txt-contraseña").val() == "" ||
      $("#txt-repetir-contraseña").val() == "" ||
      $("#txt-telefono").val() == "" ||
      $("#slc-paises").val() == " " ||
      $("#slc-paises").val() == 0
    ) {
      alert("Por favor, llenar todos los datos del formulario");
    } else if (
      $("#txt-contraseña").val() != $("#txt-repetir-contraseña").val()
    ) {
      alert("Verificar que las contraseñas sean las mismas");
    } else {
      /*else if(validarEmail($("#txt-correo").val()) == false){
      alert("Correo invalido");
    }*/
      // alert(parametrosFreelancer);
      $.ajax({
        type: "POST",
        url: "ajax/api.php?accion=crear-freelancer",
        data: parametrosFreelancer,
        dataType: "JSON",
        success: function (response) {
          alert("Cuenta creada exitosamente");
          window.location.href = "login.php";
        },
        error: function (e) {
          console.log(e);
        },
      });
    }
  } else if ($("#slc-tipo-cuenta").val() == 2) {
    if (
      $("#txt-nombre").val() == "" ||
      $("#txt-direccion").val() == "" ||
      $("#txt-correo").val() == "" ||
      $("#txt-contraseña").val() == "" ||
      $("#txt-repetir-contraseña").val() == "" ||
      $("#txt-telefono").val() == "" ||
      $("#slc-paises").val() == " " ||
      $("#slc-paises").val() == 0
    ) {
      alert("Por favor, llenar todos los datos del formulario");
    } else if (
      $("#txt-contraseña").val() != $("#txt-repetir-contraseña").val()
    ) {
      alert("Verificar que las contraseñas sean las mismas");
    } else {
      /*else if(validarEmail($("#txt-correo").val()) == false){
      alert("Correo invalido");
    }*/
      // alert(parametrosEmpresa);
      $.ajax({
        type: "POST",
        url: "ajax/api.php?accion=crear-empresa",
        data: parametrosEmpresa,
        dataType: "JSON",
        success: function (response) {
          alert("Cuenta creada exitosamente!");
          window.location.href = "login.php";
        },
        error: function (e) {
          console.log(e);
        },
      });
    }
  }
});

function validarEmail(id) {
  var patron = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  if (patron.test($("#" + id).val())) {
    $("#txt-correo" + id).addClass("is-valid");
    $("#txt-correo" + id).removeClass("is-invalid");
    return true;
  } else {
    $("#txt-correo" + id).addClass("is-invalid");
    $("#txt-correo" + id).removeClass("is-valid");
    return false;
  }
}

$(".toggle").click(function () {
  if ($(".item").hasClass("active")) {
    $(".item").removeClass("active");
  } else {
    $(".item").addClass("active");
  }
});

function validarPass(id) {
  var patron = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&#.$($)$-$_])[A-Za-z\d$@$!%*?&#.$($)$-$_]{8,15}$/;
  console.log(patron.test($("#" + id).val()));
  console.log($("#" + id).val());
  if (patron.test($("#" + id).val())) {
    $("#" + id).addClass("is-valid");
    $("#" + id).removeClass("is-invalid");
    return true;
  } else {
    $("#" + id).addClass("is-invalid");
    $("#" + id).removeClass("is-valid");
    return false;
  }
}

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
    $("#validacion-correoPersonal").html(
      "Ingresa un Correo Valido: ejemplo@gmail.com"
    );
    console.log(1);
  } else {
    if (!v8) {
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
      console.log(2);
    } else {
      if (v1 && v2 && v3 && v4 && v5) {
        console.log(3);
        var data = `nombre=${$("#nombreCuentaPersonal").val()}&apellido=${$(
          "#apellidoCuentaPersonal"
        ).val()}&correo=${$("#correoPersonal").val()}&telefono=${$(
          "#telefonoPersonal"
        ).val()}&password=${$("#passwordCuentaPersonal").val()}`;
        console.log("La data es: " + data);
      } else {
        console.log(4);
        alert("Todos los campos son obligatorios");
      }
    }
  }
}

function validarEmpresa() {
  var v1 = validarCampoVacio("nombreEmpresa");
  var v2 = validarCampoVacio("direccionEmpresa");
  var v3 = validarCampoVacio("correoEmpresa");
  var v4 = validarCampoVacio("telefonoEmpresa");
  var v5 = validarCampoVacio("passwordCuentaEmpresa");

  var v7 = validarEmail("correoEmpresa");
  var v8 = validarPass("passwordCuentaEmpresa");

  if (!v7) {
    $("#validacion-correoEmpresa").html(
      "Ingresa un Correo Valido: ejemplo@gmail.com"
    );
  }
  if (!v8) {
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
  } else {
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
}
