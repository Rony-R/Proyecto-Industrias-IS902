<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesar Proyecto</title>
</head>
<body>

    <?php

        if(isset($_POST['submit'])){

            $filecount = count($_FILES['file']['name']);

            for($i=0; $i < $filecount; $i++){
                $name = $_FILES['file']['name'][$i];
                $tmp_name = $_FILES['file']['tmp_name'][$i];
                $error = $_FILES['file']['error'][$i];
                $size = $_FILES['file']['size'][$i];
                $max_size = 1024*1024*1;
                $type = $_FILES['file']['type'][$i];

                if($error){
                    $resultado = "Ha ocurrido un error";
                }
                else if ($size > $max_size){
                    $resultado = "El tamaño supera el máximo permitido: 1MB.";
                }
                else if ($type != 'image/jpg' && $type != 'image/png' && $type != 'image/gif') {
                    $resultado = "Los unicos archivos permitidos son: .jpg|.png|.gif";
                }

                else{
                    $ruta = '../img/imgProyectos/' . $name;
                    move_uploaded_file($tmp_name, $ruta);
                    $resultado = "La imagen '$name' se ha guardado!";
                }
            }

        }

        //echo $resultado;
        echo "<br>";

        echo "Nombre del proyecto: " . $_POST["nombProyecto"] . "<br>";

        echo "Descripcion del proyecto: " . $_POST["descProyecto"] . "<br>";
        
        echo "Correo del proyecto: " . $_POST["correo"] . "<br>";

        echo "Telefono del proyecto: " . $_POST["telefono"] . "<br>";

        echo "Presupuesto del proyecto: " . $_POST["slcPresupuesto"] . "<br>";

        echo "<br>";
        echo "El var_dump:";
        echo "<br>";
        var_dump($_POST);

        echo "<br>";
        echo "El var_dump de files:";
        echo "<br>";
        var_dump($_FILES);

    ?>
    
</body>
</html>