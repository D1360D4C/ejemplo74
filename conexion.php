<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<?php
session_start();

include_once 'cn.php';

selec($conexdb);
function selec($cdb){
    if(isset($_POST['agre'])){
        agregar($cdb);
    }
    if(isset($_POST['sesionar'])){
        sesionar($cdb);
    }
}
function sesionar($conexdb){
    $email = $_POST['ema'];
    $pass = $_POST['pass'];
    $nombreU = "SELECT nick FROM usuarios WHERE email='$email' AND contra= '$pass'";

    $consulta= mysqli_query($conexdb, $nombreU);

    $coname= $conexdb->query($nombreU);

    $name = $coname ? $coname->fetch_assoc()['nick'] : null;

    if(mysqli_num_rows($consulta) > 0) {
        $_SESSION['nick'] = $name;
        header ("location: inicio.php");
        exit();
    }else{
        echo '
            <script>
            alert("Usuario no encontrado, introduzca datos verificados");
            window.location = "index.html";
            </script>';
            exit();
    }
   
}

function agregar($cdb){
    $nombre = $_POST['nom1'];
    $apellido = $_POST['ape1'];
    $email = $_POST['ema'];
    $contra = $_POST['contra'];

    $consulta = "INSERT INTO usuarios(nick,email,contra) VALUES ('$nombre', '$email','$contra')";

    mysqli_query($cdb,$consulta);
    mysqli_close($cdb);
    echo "<p>Hola, $nombre. ¡Bienvenido!</p>";
}

mysqli_close($conexdb);
?>

</body>
</html>