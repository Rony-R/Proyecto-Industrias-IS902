$(document).ready(function () {
  //Funcion para traer los presupuestos de la BD
  $.ajax({
    url: "ajax/api.php?accion='traerPresupuestos'",
    dataType: "json",
    success: function (respuesta) {
      for (var i = 0; i < respuesta.length; i++) {
        $("#slcPresupuesto").append(
          '<option value="' +
            respuesta[i].id_presupuesto +
            '">' +
            respuesta[i].presupuesto +
            "</option>"
        );
      }
    },
    error: function (e, text, error) {
      console.log("Ocurrio un error al traes los presupuestos!");
      console.log("Texto: " + text);
      console.log("Error: " + error);
    },
  });

  //Funcion para traer los tipos de proyectos de la BD.
  $.ajax({
    url: "ajax/api.php?accion='traerTipoProyectos'",
    dataType: "json",
    success: function (respuesta) {
      for (var i = 0; i < respuesta.length; i++) {
        $("#slcTipoProyecto").append(
          '<option value="' +
            respuesta[i].id_categoria +
            '">' +
            respuesta[i].categoria +
            "</option>"
        );
      }
    },
    error: function (e, text, error) {
      console.log("Ocurrio un error al traes los presupuestos!");
      console.log("Texto: " + text);
      console.log("Error: " + error);
    },
  });

  //Funcion para traer las publicaciones de la BD.
  $.ajax({
    url: "ajax/api.php?accion='traerPublicaciones'",
    dataType: "json",
    success: function (respuesta) {
      console.log("Publicaciones: " + respuesta);
      for (var i = 0; i < respuesta.length; i++) {
        $("#row-pubs").append(
          '<div id="' +
            respuesta[i].id_publicacion +
            '" class="col-lg-3 col-md-4 col-sm-12 mb-4">' +
            '<div class="card card-pub">' +
            '<img src="img/logos/code.svg" class="card-img-top" alt="..." />' +
            '<div class="card-body">' +
            '<h5 class="card-title">' +
            respuesta[i].nombre_proyecto +
            "</h5>" +
            '<p class="card-text txt-just">' +
            respuesta[i].descripcion +
            "</p>" +
            '<a href="info-publicacion.php?publicacion=' +
            respuesta[i].id_publicacion +
            '" class="btn-ver-pub">Ver Publicación</a>' +
            "</div>" +
            "</div>" +
            "</div>"
        );
      }
    },
    error: function (e, text, error) {
      console.log("Ocurrio un error al traes los presupuestos!");
      console.log("Texto: " + text);
      console.log("Error: " + error);
    },
  });

  //Funcion para verificar el login y cambiar la navbar.
  $.ajax({
    url: "ajax/api.php?accion='verificarLogIn'",
    success: function (respuesta) {
      console.log("Respuesta de verificar el login: " + respuesta);
      if (respuesta == 0) {
        $("#nav-no-login").removeClass("d-none");
        $("#nav-no-login").addClass("d-flex");
        $("#nav-freelancer").removeClass("d-flex");
        $("#nav-empresa").removeClass("d-flex");
        $("#nav-freelancer").addClass("d-none");
        $("#nav-empresa").addClass("d-none");
      } else {
        tipoUsuario();

        $("#nav-no-login").removeClass("d-flex");
        $("#nav-no-login").addClass("d-none");
      }
    },
    error: function (e, text, error) {
      console.log("Ocurrio un error al verificar el login!");
      console.log("Texto: " + text);
      console.log("Error: " + error);
    },
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
}

var validarCampoVacio = function (id) {
  if (id == "slcPresupuesto") {
    if ($("#" + id).val() == "0") {
      $("#" + id).removeClass("is-valid");
      $("#" + id).addClass("is-invalid");
      return false;
    } else {
      $("#" + id).removeClass("is-invalid");
      $("#" + id).addClass("is-valid");
      return true;
    }
  } else {
    if (id == "slcTipoProyecto") {
      if ($("#" + id).val() == "0") {
        $("#" + id).removeClass("is-valid");
        $("#" + id).addClass("is-invalid");
        return false;
      } else {
        $("#" + id).removeClass("is-invalid");
        $("#" + id).addClass("is-valid");
        return true;
      }
    } else {
      if ($("#" + id).val() == "") {
        $("#" + id).removeClass("is-valid");
        $("#" + id).addClass("is-invalid");
        return false;
      } else {
        $("#" + id).removeClass("is-invalid");
        $("#" + id).addClass("is-valid");
        return true;
      }
    }
  }
};

function tipoUsuario() {
  $.ajax({
    url: "ajax/api.php?accion='tipoUsuario'",
    success: function (respuesta) {
      console.log("El tipo de usuario es: " + respuesta);
      if (respuesta == 2) {
        $("#nav-empresa").removeClass("d-none");
        $("#nav-empresa").addClass("d-flex");
        $("#nav-freelancer").removeClass("d-flex");
        $("#nav-freelancer").addClass("d-none");
      } else {
        $("#nav-freelancer").removeClass("d-none");
        $("#nav-freelancer").addClass("d-flex");
        $("#nav-empresa").removeClass("d-flex");
        $("#nav-empresa").addClass("d-none");
      }
    },
    error: function (e, text, error) {
      console.log("Ocurrio un error al verificr el tipo de usuario!");
      console.log("Texto: " + text);
      console.log("Error: " + error);
    },
  });
}

$("#btnPublicar").click(function (e) {
  var v1 = validarCampoVacio("nombProyecto");
  var v2 = validarCampoVacio("descProyecto");
  var v3 = validarCampoVacio("slcTipoProyecto");
  var v5 = validarCampoVacio("slcPresupuesto");

  if (!v1 || !v2 || !v3 || !v5) {
    e.preventDefault();
  } else {
    var data = `nombre=${$("#nombProyecto").val()}&descripcion=${$(
      "#descProyecto"
    ).val()}&tipoProyecto=${$("#slcTipoProyecto").val()}&presupuesto=${$(
      "#slcPresupuesto"
    ).val()}`;

    //$("#modalDatos").modal();

    //Lista de las imagenes:

    // const fileSelector = $("#file-selector").val();
    // console.log(fileSelector);

    var fileInput = document.getElementById("file");

    var files = fileInput.files;

    var file;

    for (var i = 0; i < files.length; i++) {
      //file = files.item(i);
      file = files[i];
      console.log(file);
    }

    // $.ajax({
    //   url: "ajax/api.php?accion=publicarProyecto",
    //   method: "POST",
    //   data: data,
    //   dataType: "text",
    //   success: function (respuesta) {
    //     console.log("Success" + respuesta);
    //   },
    //   error: function (e, text, error) {
    //     console.log("Ocurrio un error:" + error + " " + text);
    //   },
    // });

    console.log("La data es: " + data);
  }
});

// $("#guardar-publicacion").click(function () {
//   alert("Guardando Publicacion!");
// });

function guardarPublicacion(data) {
  alert("La data es: " + data);
}
