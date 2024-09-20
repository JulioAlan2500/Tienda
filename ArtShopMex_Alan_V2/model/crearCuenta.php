<?php
//RECIBIR DATOS DEL FORMULARIO
$_nombreUsuario=$_POST['txtNombreUsuario'];
$_apPaternoUsuario=$_POST['txtApPaternoUsuario'];
$_apMaternoUsuario=$_POST['txtApMaternoUsuario'];
$_email=$_POST['txtEmail'];
$_telUsuario=$_POST['txtTelUsuario'];
$_nombreLogin=$_POST['txtNombreLogin'];
$_claveLogin=$_POST['txtPassword'];
$_idRolUsuario=$_POST['txtIdRolUsuario'];

//Conectar a la base de datos
$servername = "localhost:3309";
$username = "root";
$password = "";
$nameBD = "ArtShopMex";

try{
$conn = new PDO("mysql:host=$servername;dbname=$nameBD", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    //CODIGO PARA CREAR LA CUENTA EN EL PROCEDIMIENTO ALMACENADO sp_registrarUsuaro
    $stmt = $conn->prepare("call artshopmex.sp_registrarUsuario(
    :nombre, 
    :apPaterno, 
    :apMaterno, 
    :email, 
    :telefono, 
    :nombreLogin, 
    :claveLogin, 
    :idRolUsuario);");
    $stmt->bindParam(':nombre', $_nombreUsuario);
    $stmt->bindParam(':apPaterno', $_apPaternoUsuario);
    $stmt->bindParam(':apMaterno', $_apMaternoUsuario);
    $stmt->bindParam(':email', $_email);
    $stmt->bindParam(':telefono', $_telUsuario);
    $stmt->bindParam(':nombreLogin', $_nombreLogin);
    $stmt->bindParam(':claveLogin', $_claveLogin);
    $stmt->bindParam(':idRolUsuario', $_idRolUsuario);

    $stmt->execute();
    echo 'Se creo la cuenta con exsito';

}catch(PDOException $e){
echo "Connection failed: " . $e->getMessage();
}
?>