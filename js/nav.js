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
};

$("#btnPublicar").click(function () {
  //alert("Hola");

  var v1 = validarCampoVacio("nombProyecto");
  var v2 = validarCampoVacio("descProyecto");
  var v3 = validarCampoVacio("correo");
  var v4 = validarCampoVacio("telefono");
  var v5 = validarCampoVacio("slcPresupuesto");

  var v6 = validarEmail("correo");

  console.log("Nombre: " + v1);
  console.log("Descripcion: " + v2);
  console.log("Correo: " + v3);
  console.log("Telefono: " + v4);
  console.log("Presupuesto: " + v5);
  console.log("Validar Email: " + v6);
});
