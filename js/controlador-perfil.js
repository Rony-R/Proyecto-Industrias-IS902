let tipoUsuario = 1;
let idUsuario = 2;
let parametros = `idUsuario=${idUsuario}`

if (tipoUsuario == 1) {
  
  console.log('Es freelancer');
  document.getElementById("navPagos").style.display = "none";
  document.getElementById("navPublicaciones").style.display = "none";


  } else if (tipoUsuario == 2){
  console.log('Es una empresa');
  document.getElementById("cardExperienciaLaboral").style.display = "none";
  document.getElementById("divApellido").style.display = "none";
} else {
  console.log('Debe loguearse para utilizar estas funciones');
}

const llenarInfo = () => {
  $.ajax({
    url: "ajax/perfil.php?accion=3", // * Obtener usuario
    type: "GET",
    data: parametros,
    dataType: 'json',
    success: function (response) {
      console.log(response);
      document.getElementById('navNombre').innerHTML = `${response[0].info[0].nombre} ${response[0].info[0].apellido}`;
      document.getElementById('navImgPerfil').src = `./img/${response[0].info[0].rutaImgPerfil}/${response[0].info[0].nombreImgPerfil}`;

      document.getElementById('nombre').innerHTML = `${response[0].info[0].nombre}`;
      document.getElementById('apellido').innerHTML = `${response[0].info[0].apellido}`;
      document.getElementById('direccion').innerHTML = `${response[0].info[0].direccion}`;
      document.getElementById('correo').innerHTML = `${response[0].info[0].correo}`;
      document.getElementById('telefono').innerHTML = `${response[0].info[0].telefono}`;
      document.getElementById('contrasenia').innerHTML = `${response[0].info[0].contrasenia}`;
      document.getElementById('imagenPerfil').src = `./img/${response[0].info[0].rutaImgPerfil}/${response[0].info[0].nombreImgPerfil}`;
      document.getElementById('pais').innerHTML = `${response[0].info[0].pais}`;

      let cadenaTecnologia = '';
      let hTecnologias = document.getElementById('hTec');
      hTecnologias.innerHTML = ``;
      response[0].tecnologias.forEach(tec => {
        cadenaTecnologia += `${tec}, `;
      });
      hTecnologias.innerHTML = `${cadenaTecnologia.slice(0,-2)}`;
    },
    error: function (e) {
      console.log(e);
    }
  });
}
llenarInfo();

const obtenerTecnologias = () => {
  $.ajax({
    url: "ajax/perfil.php?accion=1", // * Obtener las tecnologias
    type: "GET",
    dataType: 'json',
    success:function(response){
      response.forEach(tecnologia => {
        console.log(`id: ${tecnologia.id}, Tecnologia: ${tecnologia.tecnologia}`);
      });
    },
    error:function(e){
        console.log(e);
    }
  });
}
obtenerTecnologias();

const obtenerPaises = () => {
  $.ajax({
    url: "ajax/perfil.php?accion=2", // * Obtener los paises
    type: "GET",
    dataType: 'json',
    success:function(response){
      response.forEach(pais => {
        console.log(`Id: ${pais.id}, Pais: ${pais.pais}`);
      });
    },
    error:function(e){
        console.log(e);
    }
  });
}
obtenerPaises();