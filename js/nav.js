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
      console.log(
        "Ocurrio un error al traes los presupuestos! Texto: " +
          text +
          " Error: " +
          error
      );
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
      console.log(
        "Ocurrio un error al traes los presupuestos! Texto: " +
          text +
          " Error: " +
          error
      );
    },
  });

  //Funcion para traer las publicaciones de la BD.
  $.ajax({
    url: "ajax/api.php?accion='traerPublicaciones'",
    dataType: "json",
    success: function (respuesta) {
      for (var i = 0; i < respuesta.length; i++) {
        $("#row-pubs").append(
          '<div id="' +
            respuesta[i].id_publicacion +
            '" class="col-lg-3 col-md-4 col-sm-12 mb-4">' +
            '<div class="card card-pub">' +
            '<img src="img/imgProyectos/' +
            respuesta[i].nombre_img +
            '" class="card-img-top img-pub" />' +
            '<div class="card-body">' +
            '<h5 class="card-title">' +
            respuesta[i].nombre_proyecto +
            "</h5>" +
            '<p class="card-text txt-just">' +
            respuesta[i].descripcion +
            "</p>" +
            '<a href="info-publicacion.php?publicacion=' +
            respuesta[i].id_publicacion +
            '" class="btn-ver-pub">Ver Publicaci??n</a>' +
            "</div>" +
            "</div>" +
            "</div>"
        );
      }
    },
    error: function (e, text, error) {
      console.log(
        "Ocurrio un error al traes los presupuestos! Texto: " +
          text +
          " Error: " +
          error
      );
    },
  });

  //Funcion para traer publicaciones propias de una empresa
  $.ajax({
    url: "ajax/api.php?accion='traerPublicacionesPropias'",
    dataType: "json",
    success: function (respuesta) {
      for (var i = 0; i < respuesta.length; i++) {
        $("#row-mispublicaciones").append(
          '<div id="' +
            respuesta[i].id_publicacion +
            '" class="col-lg-3 col-md-4 col-sm-12 mb-4">' +
            '<div class="card card-pub">' +
            '<img src="img/imgProyectos/' +
            respuesta[i].nombre_img +
            '" class="card-img-top img-pub" />' +
            '<div class="card-body">' +
            '<h5 class="card-title">' +
            respuesta[i].nombre_proyecto +
            "</h5>" +
            '<p class="card-text txt-just">' +
            respuesta[i].descripcion +
            "</p>" +
            '<a href="solicitudes.php?publicacion=' +
            respuesta[i].id_publicacion +
            '" class="btn-ver-pub">Ver Solicitudes</a>' +
            "</div>" +
            "</div>" +
            "</div>"
        );
      }
    },
    error: function (e, text, error) {
      console.log(
        "Ocurrio un error al traer las publicaciones de la empresa! Texto: " +
          text +
          " Error: " +
          error
      );
    },
  });

  //Funcion para verificar el login y cambiar la navbar.
  $.ajax({
    url: "ajax/api.php?accion='verificarLogIn'",
    success: function (respuesta) {
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
      console.log(
        "Ocurrio un error al verificar el login! Texto: " +
          text +
          " Error: " +
          error
      );
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
      console.log(
        "Ocurrio un error al verificr el tipo de usuario! Texto: " +
          text +
          " Error: " +
          error
      );
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
  }
});

function guardarPublicacion(resultado) {
  if (resultado) {
    window.location = "../publicaciones.php";
  } else {
    alert("Ocurrio un problema! No se inserto el proyecto");
  }
}
