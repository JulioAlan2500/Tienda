<?php
session_start();

//Variables para el usuario y clave
$usuario=$_POST['txtUsuario'];
$clave=$_POST['txtPassword'];
$servername = "localhost:3309";
$username = "root";
$password = "";
$nameBD = "artshopmex";

try {
$conn = new PDO("mysql:host=$servername;dbname=$nameBD", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//Codigo para realizar la validacion del Login
$stmt = $conn->prepare("call artshopmex.sp_validarLogin(:usuario,:clave);");
$stmt->bindParam(':usuario', $usuario);
$stmt->bindParam(':clave', $clave);
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$result=$stmt->fetchAll();

  //VALIDAR USUARIO Y CONTRASEÑA
$usuarioLogueado=$result[0]['nombreUsuario'];
$claveLogueada=$result[0]['claveLogin'];


if ($usuarioLogueado==$usuario && $claveLogueada==$clave) {
echo "Usuario: ".$usuarioLogueado;
echo "<br> Password: ".$claveLogueada;
$_SESSION['usuarioValido']=$usuarioLogueado;
echo '
<script>
window.location.href="../view/paginas/administrador/administrador.php";
</script>
';

 } else {
echo "El usuario y la clave no son validos";
}
  

  

//var_dump($result);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>