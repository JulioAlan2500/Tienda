<?php
session_start();
if(isset($_SESSION['usuarioValido'])){

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>Página de Adminstrador</h1>
        <h5>Bienvenido: </h5>
        <h6>
            <?php
            echo $_SESSION['usuarioValido'];
            ?>
        </h6>


    </div>
    <div>
        <h5><a href="cerrarSesion.php">Cerrar sesión</a></h5>
    </div>
</body>
</html>

<?php
}//Fin del IF
else{
    echo "Debes iniciar Sesión";
    echo '<a href="../login.html">Login</a>';
}
?>