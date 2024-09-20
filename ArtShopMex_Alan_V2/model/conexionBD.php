<?php
$servername = "localhost:3309";
$username = "root";
$password = "";
$nameBD = "artshopmex";

try {
$conn = new PDO("mysql:host=$servername;dbname=$nameBD", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo "Connected successfully";
} catch(PDOException $e){
echo "Connection failed: " . $e->getMessage();
}
?>