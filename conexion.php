<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<?php include_once 'cn.php';
selec($conexdb);
function selec($cdb){
    if(isset($_POST['agre'])){
        agregar($cdb);
    }
}

function agregar($cdb){
    $nombre = $_POST['nom1'];
    $apellido = $_POST['ape1'];
    $email = $_POST['ema'];

    $consulta = "INSERT INTO usuario(nombre,apellido,email) VALUES ('$nombre', '$apellido','$email')";

    mysqli_query($cdb,$consulta);
    mysqli_close($cdb);
    echo "<p>Hola, $nombre. ¡Bienvenido!</p>";
}


?>

</body>
</html>