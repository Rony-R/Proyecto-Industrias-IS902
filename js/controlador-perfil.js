const  obtenerTecnologias = () =>{
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