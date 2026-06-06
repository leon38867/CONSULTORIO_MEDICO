<?php

session_start();

include("../config/conexion.php");

$nombre = $_POST['nombre'];
$usuario = $_POST['usuario'];
$password = $_POST['password'];
$rol = $_POST['rol'];

$sql = "INSERT INTO usuarios
(nombre, usuario, password, rol)

VALUES

('$nombre',
 '$usuario',
 '$password',
 '$rol')";

if($conn->query($sql)){

    header("Location: registrar_usuario.php");

}else{

    echo "Error al guardar.";

}

?>