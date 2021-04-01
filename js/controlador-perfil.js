let tipoUsuario = 1;
let idUsuario = 2;

let infoUsuario; //! Array. Informacion del usuario.
let tecnologias; //! Array. Tecnologias que tiene el usuario.
let allTecnologias = Array(); //* Todas las tecnologias que estan en la base de datos.
let tecnologiasAuxiliar; //! Aqui guardamos el posible arreglo de tecnologias a editar.
let paises; //* Array. Todos los paises de la base de datos.
let idPaisAuxiliar; //! Aqui guardamos el posible pais al que se quiera cambiar.
let chkTecnologias = ''; //todo: String. tecnologias formateadas en checkbox.

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
  let parametros = `idUsuario=${idUsuario}`;
  $.ajax({
    url: "ajax/perfil.php?accion=3", // * Obtener usuario
    type: "GET",
    data: parametros,
    dataType: 'json',
    success: function (response) {
      console.log(response); // ! Aqui tenemos todo lo relacionado con usuario, tanto de la tablas experiencias, info y tecnologias.
      infoUsuario = response[0].info[0]; // Guardamos toda la informacion del usuario
      tecnologias = response[0].tecnologias; // Guardamos las tecnologias que ya tiene el usuario
      tecnologiasAuxiliar = tecnologias; // Guardamos las tecnologias en la variable auxiliar
      console.info(infoUsuario);

      // Datos para el navbar
      document.getElementById('navNombre').innerHTML = `${response[0].info[0].nombre} ${response[0].info[0].apellido}`;
      document.getElementById('navImgPerfil').src = `./img/${response[0].info[0].rutaImgPerfil}${response[0].info[0].nombreImgPerfil}`;

      // Informacion Basica
      // document.getElementById('imagenPerfil').src = '';
      document.getElementById('imagenPerfil').src = `./img/${response[0].info[0].rutaImgPerfil}${response[0].info[0].nombreImgPerfil}`;
      document.getElementById('nombre').innerHTML = `${response[0].info[0].nombre}`;
      document.getElementById('apellido').innerHTML = `${response[0].info[0].apellido}`;
      document.getElementById('contrasenia').innerHTML = `••••••••`;
      document.getElementById('pais').innerHTML = `${response[0].info[0].pais}`;

      // Informacion de contacto
      document.getElementById('direccion').innerHTML = `${response[0].info[0].direccion}`;
      document.getElementById('correo').innerHTML = `${response[0].info[0].correo}`;
      document.getElementById('telefono').innerHTML = `${response[0].info[0].telefono}`;

      // Experiencia laboral
        // Habilidades
      let cadenaTecnologia = '';
      let hTecnologias = document.getElementById('hTec');
      hTecnologias.innerHTML = ``;

      //Si es una empresa se disparara el catch de tecnologias.
      try {
        response[0].tecnologias.forEach(tec => {
          cadenaTecnologia += `${tec.tecnologia}, `;
        });
        hTecnologias.innerHTML = `${cadenaTecnologia.slice(0,-2)}`;
      } catch (error) {
        console.log('catch del las tecnologias');
      }
        // Proyectos en DevFinder
      try {
        // Si experiencia es distinto de 1 lo pone en plural.
        response[0].expeciencia[0] != 1 ? (
          document.getElementById('experiencia').innerHTML = `${response[0].expeciencia[0]} proyectos`
          ): (
          document.getElementById('experiencia').innerHTML = `${response[0].expeciencia[0]} proyecto`
          );
      } catch (error) {
        console.log('catch del las experiencia');
      }
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
    success: function (response) {
      allTecnologias = response;
      // console.info(allTecnologias);
      response.forEach(tec => {
        // console.log(`id: ${tecnologia.id}, Tecnologia: ${tecnologia.tecnologia}`);
        // Guardamos todas las tecnologias como checkbox para mostrarlas en el section de edicion.
        chkTecnologias += `
          <div id="divTec${tec.idTecnologia}" class="chk-tecnologia">
            <label for="tec${tec.idTecnologia}">
              <input class="" type="checkbox" name="tec[]" id="tec${tec.idTecnologia}" value="${tec.idTecnologia}"onclick="chkSeleccionado(this)">
              ${tec.tecnologia}
            </label>
          </div>
        `;
      });
    },
    error:function(e){
        console.log(e);
    }
  });
}
obtenerTecnologias();

// Funcion para la seleccion de checkboxs
const chkSeleccionado = (checkbox) => {
  //Si está marcada ejecuta la condición verdadera.
  if(checkbox.checked){
    // alert('La casilla ha sido marcada! id:' + checkbox.id +'Value ' + checkbox.value);
    document.getElementById(`divTec${checkbox.value}`).classList.remove('chk-deseleccionado');
    document.getElementById(`divTec${checkbox.value}`).classList.add('chk-seleccionado');
    let index = allTecnologias.findIndex(obj => obj.idTecnologia == `${checkbox.value}`);//! Obtenemos el indice de la tecnologia seleccionada de nuestro array allTecnologias.
    tecnologiasAuxiliar.push(allTecnologias[index]); //* agregamos la tecnologia a nuestro array tecnologias.
    console.info(tecnologiasAuxiliar);
  }
  //Si se ha desmarcado se ejecuta el siguiente mensaje.
  else{
    // alert('La casilla ha sido desmarcada!');
    document.getElementById(`divTec${checkbox.value}`).classList.remove('chk-seleccionado');
    document.getElementById(`divTec${checkbox.value}`).classList.add('chk-deseleccionado');
    let index = tecnologiasAuxiliar.findIndex(obj => obj.idTecnologia == `${checkbox.value}`); //! Obtenemos el indice de la tecnologia deseleccionada de nuestro array tecnologias.
    // console.info(index);
    removeItemArray(tecnologiasAuxiliar, index); //* Llamamos la funcion para eliminar el elemento del array tecnologias.
    console.info(tecnologiasAuxiliar);
  }
}
function removeItemArray ( arr, index ) {
  // let i = arr.indexOf( item );
  if ( index !== -1 ) {
    arr.splice( index, 1 );
  }
}

const obtenerPaises = () => {
  $.ajax({
    url: "ajax/perfil.php?accion=2", // * Obtener los paises
    type: "GET",
    dataType: 'json',
    success: function (response) {
      paises = response;
      // console.log(paises);
    },
    error:function(e){
        console.log(e);
    }
  });
}
obtenerPaises();
const esconderSection = () => {
  document.getElementById('section').classList.remove('visible');
  document.getElementById('section').classList.remove('grid-section');
  document.getElementById('section').classList.add('oculto');
}

const mostrarSection = (atributo) => {
  // console.log(allTecnologias);
  // let labelHtml = document.querySelector("html");
  document.getElementById('cardSeccion').innerHTML = `
  <legend class="titulo-card"><h4 id="h4Titulo">Titulo cambio</h4></legend>
  <fieldset id="cardEdicion" class="input-edicion">
    <legend id="lTituloEdicion" class="titulo-edicion">nombre</legend>
    <input id="inputText" type="text" placeholder="">
  </fieldset>
  <div id="btnAccion" class="btn-accion">
    <a class="btn-publicacion eliminar" href="#">Cancelar</a>
    <a class="btn-publicacion editar" href="#">
      <i class="fas fa-pen"></i></i>Guardar</a>
  </div>`;
  document.getElementById('btnAccion').innerHTML = `
    <a class="btn-publicacion eliminar" href="#">Cancelar</a>
  `;
  let intElemScrollTop = $('html').scrollTop();
  document.getElementById('section').style.top = `${intElemScrollTop}px`;
  document.getElementById('section').classList.remove('oculto');
  document.getElementById('section').classList.add('visible');
  document.getElementById('section').classList.add('grid-section');

  switch (atributo) {
    case 'nombre':
      console.log(atributo);
      document.getElementById('h4Titulo').innerHTML = `Cambiar nombre`;
      document.getElementById('lTituloEdicion').innerHTML = `Nombre`;
      document.getElementById('inputText').value = `${infoUsuario.nombre}`;
      document.getElementById('btnAccion').innerHTML += `
      <a class="btn-publicacion editar" href="javascript:actualizar('nombre');">
        <i class="fas fa-pen"></i></i>Actualizar
      </a>
      `;
      break;
    case 'apellido':
      console.log(atributo);
      document.getElementById('h4Titulo').innerHTML = `Cambiar apellido`;
      document.getElementById('lTituloEdicion').innerHTML = `Apellido`;
      document.getElementById('inputText').value = `${infoUsuario.apellido}`;
      document.getElementById('btnAccion').innerHTML += `
        <a class="btn-publicacion editar" href="javascript:actualizar('apellido');">
          <i class="fas fa-pen"></i></i>Actualizar
        </a>
      `;
      break;
    case 'pais':
      console.log(atributo);
      document.getElementById('h4Titulo').innerHTML = `Actualizar pais`;
      let optPais = '';
      paises.forEach(pais => {
        optPais += `<option value="${pais.id}">${pais.pais}</option>`
      });
      document.getElementById('cardEdicion').innerHTML = `
      <legend class="titulo-edicion"><h4 id="h4Titulo">Pais</h4></legend>
      <select id="slc-pais" name="slc-pais" onchange="seleccionarPais()">
        ${optPais}
      </select>
      `;
      document.getElementById('btnAccion').innerHTML += `
        <a class="btn-publicacion editar" href="javascript:actualizar('pais');">
          <i class="fas fa-pen"></i></i>Actualizar
        </a>
      `;
      break;
    case 'contrasenia':
      console.log(atributo);
      document.getElementById('cardSeccion').innerHTML = `
      <legend class="titulo-card"><h4 id="h4Titulo">Cambiar Contraseña</h4></legend>
          <fieldset id="cardEdicion" class="input-edicion">
            <legend id="lTituloEdicion" class="titulo-edicion">Contraseña actual</legend>
            <input id="psw" type="password" placeholder="">
          </fieldset>
          <fieldset id="cardEdicion" class="input-edicion">
            <legend id="lTituloEdicion" class="titulo-edicion">Contraseña nueva</legend>
            <input id="repsw1" type="password" placeholder="">
          </fieldset>
          <fieldset id="cardEdicion" class="input-edicion">
            <legend id="lTituloEdicion" class="titulo-edicion">Confirma contraseña nueva</legend>
            <input id="repsw2" type="password" placeholder="">
          </fieldset>
        <div class="btn-accion">
          <a class="btn-publicacion eliminar" href="#">Cancelar</a>
          <a class="btn-publicacion editar" href="#">
          <i class="fas fa-pen"></i>Guardar</a>
        </div>
      `;
      document.getElementById('btnAccion').innerHTML += `
        <a class="btn-publicacion editar" href="javascript:actualizar('contrasenia');">
          <i class="fas fa-pen"></i></i>Actualizar
        </a>
      `;
      break;
    case 'correo':
      console.log(atributo);
      document.getElementById('h4Titulo').innerHTML = `Actualizar correo`;
      document.getElementById('lTituloEdicion').innerHTML = `Correo`;
      document.getElementById('inputText').value = `${infoUsuario.correo}`;
      document.getElementById('btnAccion').innerHTML += `
        <a class="btn-publicacion editar" href="javascript:actualizar('correo');">
          <i class="fas fa-pen"></i></i>Actualizar
        </a>
      `;
      break;
    case 'telefono':
      console.log(atributo);
      document.getElementById('h4Titulo').innerHTML = `Actualizar telefono`;
      document.getElementById('lTituloEdicion').innerHTML = `Telefono`;
      document.getElementById('inputText').value = `${infoUsuario.telefono}`;
      document.getElementById('btnAccion').innerHTML += `
        <a class="btn-publicacion editar" href="javascript:actualizar('telefono');">
          <i class="fas fa-pen"></i></i>Actualizar
        </a>
      `;
      break;
      case 'direccion':
        console.log(atributo);
        document.getElementById('h4Titulo').innerHTML = `Actualizar direccion`;
        document.getElementById('lTituloEdicion').innerHTML = `Direccion`;
      document.getElementById('inputText').value = `${infoUsuario.direccion}`;
      document.getElementById('btnAccion').innerHTML += `
        <a class="btn-publicacion editar" href="javascript:actualizar('direccion');">
          <i class="fas fa-pen"></i></i>Actualizar
        </a>
      `;
        break;
    case 'habilidades':
      console.log(atributo);
      document.getElementById('h4Titulo').innerHTML = `Actualizar habilidades`;
      document.getElementById('cardEdicion').innerHTML = `
        <legend id="lTituloEdicion" class="titulo-edicion">Tecnologias</legend>
        ${chkTecnologias}
      `;
      allTecnologias.forEach(tec => {
        tecnologias.forEach(tecnologia => {
          if (tecnologia.idTecnologia == tec.idTecnologia) {
            let id = `#tec${tec.idTecnologia}`;
            let id2 = `divTec${tec.idTecnologia}`;
            $(id).prop('checked', true);
            document.getElementById(id2).classList.add('chk-seleccionado');
          }
        });
      });
      document.getElementById('btnAccion').innerHTML += `
        <a class="btn-publicacion editar" href="javascript:actualizar('habilidades');">
          <i class="fas fa-pen"></i></i>Actualizar
        </a>
      `;
        break;
    case 'proyectos':
      console.log(atributo);
      break;
    case 'img':
      console.log(atributo);
      document.getElementById('h4Titulo').innerHTML = `Actualizar imagen de perfil`;
      document.getElementById('cardEdicion').innerHTML = `
        <legend id="lTituloEdicion" class="titulo-edicion">Imagen</legend>
          <div id="actualizarImg" class="actualizar-img">
            <img
              id="imagenPerfil"
              class="foto-perfil"
              src="./img/${infoUsuario.rutaImgPerfil}/${infoUsuario.nombreImgPerfil}"
              alt="foto de perfil"
            />
            <i id="arrow" class="fas fa-long-arrow-alt-right "></i>
          </div>
          <form id="formImg" method="post" enctype="multipart/form-data">
          <label class="file">
            <input type="file" name="fileImg" id="fileImg" accept="image/*">
            <span class="file-custom"></span>
          </label>
            
          </form>
      `;
      document.getElementById('arrow').style = 'display : none';
      document.getElementById('btnAccion').innerHTML += `
        <a id="btnActualizarFoto" class="btn-publicacion editar" href="javascript:actualizarImg();">
          <i class="fas fa-pen"></i></i>Actualizar
        </a>
      `;
      const fileImg = document.getElementById('fileImg');
      const actualizarImg = document.getElementById('actualizarImg');
      fileImg.addEventListener('change', (event) => {
        let reader = new FileReader();
        reader.readAsDataURL(event.target.files[0]); // Leemos el archivo y lo pasamos al fileReader

        reader.onload = () => {
          let imagen = document.createElement('img');
          imagen.src = reader.result;
          urlImagenPerfilNew = imagen.src;
          // console.log(imagen.src);
          actualizarImg.appendChild(imagen);
          imagen.classList.add('actualizar-img2');
          document.getElementById('arrow').style = 'display : block';
        }
        console.info(event);
      });
      break;
    default:
      break;
  }
}

const imgPerfil = document.getElementById('imagenPerfil');
imgPerfil.addEventListener('click',() => {
  mostrarSection('img');
});
const actualizarImg = () => {
  const btnActualizarImg = document.getElementById('btnActualizarFoto');
  btnActualizarImg.addEventListener('click', () => {
    if (fileImg.value === '') {
      console.info('No hay imagen de perfil que actualizar');
    }
    else {
      const formImg = document.getElementById('formImg');
      const formData = new FormData(formImg);
      // console.info([formData]);
      fetch('ajax/perfil.php?accion=5', {
        method: 'POST',
        body: formData
      })
        .then(res => res.ok ? Promise.resolve(res) : Promise.reject(new Error('Failed to load')))
        .then(res => res.text()) // text o json
        .then(data => {
          let datos = JSON.parse(data)
          console.log(datos);

          esconderSection();
          location.reload();
          document.getElementById('navImgPerfil').src = `./img/${datos.res[0].ruta}${datos.res[0].nombreImg}?n=${Date.now()}`;
          document.getElementById('imagenPerfil').src = `./img/${datos.res[0].ruta}${datos.res[0].nombreImg}?n=${Date.now()+1}`;
        })
        .catch((error) => console.info(`Error:${error.message}`));
    }
  });
}
const validarInput= () => {
  if (document.getElementById('inputText').value.length == 0) {
    return false;
  }
  return true;
}

const seleccionarPais = () => {
  idPaisAuxiliar = document.getElementById('slc-pais').value;
}


const actualizar = (atributo) => {
  switch (atributo) {
    case 'nombre':
      if (validarInput()) {
        infoUsuario.nombre = document.getElementById('inputText').value;
      } else {
        alert(`Debe agregar un ${atributo}`);
      }
      break;
    case 'apellido':
      if (validarInput()) {
        infoUsuario.apellido = document.getElementById('inputText').value;
      } else {
        alert(`Debe agregar un ${atributo}`);
      }
      break;
    case 'pais':
      infoUsuario.idPais = idPaisAuxiliar;
      break;
    case 'contrasenia':
      
      break;
    case 'correo':
      if (validarInput()) {
        infoUsuario.correo = document.getElementById('inputText').value;
      } else {
        alert(`Debe agregar un ${atributo}`);
      }
      break;
    case 'telefono':
      if (validarInput()) {
        infoUsuario.telefono = document.getElementById('inputText').value;
      } else {
        alert(`Debe agregar un ${atributo}`);
      }
      break;
    case 'direccion':
      if (validarInput()) {
        infoUsuario.direccion = document.getElementById('inputText').value;
      } else {
        alert(`Debe agregar un ${atributo}`);
      }
        break;
    case 'habilidades':
        tecnologias = tecnologiasAuxiliar;
        break;
    case 'img':
      
        break;
  
    default:
      break;
  }

  // console.info(infoUsuario);
  // console.info(tecnologias);
  let urlTecnologias = '';
  tecnologias.forEach(tecnologia => {
    urlTecnologias += `&tecnologias[]=${tecnologia.idTecnologia}`;
  });
  let parametros = "nombre=" + infoUsuario.nombre+
                  "&apellido=" + infoUsuario.apellido +
                  "&direccion=" + infoUsuario.direccion +
                  "&correo=" + infoUsuario.correo +
                  "&telefono=" + infoUsuario.telefono +
                  "&contrasenia=" + infoUsuario.contrasenia +
                  "&rutaImgPerfil=" + infoUsuario.rutaImgPerfil +
                  "&nombreImgPerfil=" + infoUsuario.nombreImgPerfil +
                  "&idTipoUsuario=" + infoUsuario.idTipoUsuario +
                  "&idPais=" + infoUsuario.idPais +
                  urlTecnologias +
                  "&idUsuario=" + infoUsuario.idUsuario;
  console.info(parametros);

  $.ajax({
    url: 'ajax/perfil.php?accion=4', //! Editar usuario
    method: 'POST',
    data: parametros,
    success: function (response) {
      console.log(response);
      esconderSection();
      llenarInfo();
    },
    error: function (e) {
      console.log(e);
    }
  });
}