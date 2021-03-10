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


    //Ajax con el que se mandaria a llamar la información de los comentarios y se imprimiria en la pagina
    /*$.ajax({
        url: "ajax/api.php?accion=obtener-comentario-publicacion",
        type: "GET",
        dataType: 'json',
        success:function(response){
            for(var i=0;i<response.length;i++){
                $('#div-comentarios').append('<div class="row mb-1">'+
                '<div class="col-1">'+
                  '<img src="img/profile-examples/goku.jpg" class="img-fluid rounded-circle" alt="">'+
                '</div>'+
                '<div class="col-11">'+
                  '<span class="card-subtitle text-primary fw-bold">Goku</span>'+
                  '<p class="card-text">Aqui ira un comentario X con distintas lineas, distintos parrafos, con mucha información que comentar acerca de la publicación realizada</p>'+
                '</div>'+
              '</div>'+
              '<hr>');
            }   
        },
        error:function(e){
            console.log(e);
        }
    });*/ 
});