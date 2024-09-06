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
if(!isset($_SESSION['nick'])){
    echo '
        <script>
            alert("Debes iniciar sesion antes de entrar a esta pagina");
            window.location = "index.html"; 
        </script>';
    session_destroy();
    die();
}

include_once 'cn.php';
    ?>
    <h1>HOLA
    <?php echo $_SESSION['nick'];?>
    </h1>
    <a href="inicio.php">inicio
        </a>
    
</body>
</html>