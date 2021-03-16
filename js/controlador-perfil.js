let  obtenerTecnologias = () =>{
  $.ajax({
    url: "ajax/perfil.php?accion=1",
    type: "GET",
    dataType: 'json',
    success:function(response){
      console.log(response);
      
    },
    error:function(e){
        console.log(e);
    }
  });
}
obtenerTecnologias();