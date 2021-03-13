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

$("#btnPublicar").click(function (e) {
  //e.preventDefault();

  var v1 = validarCampoVacio("nombProyecto");
  var v2 = validarCampoVacio("descProyecto");
  var v3 = validarCampoVacio("correo");
  var v4 = validarCampoVacio("telefono");
  var v5 = validarCampoVacio("slcPresupuesto");

  var v6 = validarEmail("correo");

  if (!v6) {
    $("#validacion-correo").html("Ingresa un Correo Valido: ejemplo@gmail.com");
  } else {
    if (v1 && v2 && v3 && v4 && v5 && v6) {
      var data = `nombre=${$("#nombProyecto").val()}&descripcion=${$(
        "#descProyecto"
      ).val()}&correo=${$("#correo").val()}&telefono=${$(
        "#telefono"
      ).val()}&presupuesto=${$("#slcPresupuesto").val()}`;

      $("#modalDatos").modal();

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
    } else {
      alert("Todos los campos son obligatorios a excepcion de las imagenes.");
    }
  }
});
