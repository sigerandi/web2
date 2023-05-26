<?php

$host = '';
$usuario = '';
$contra = '';
$bd = '';

$conexion = new mysqli($host, $usuario, $contra, $bd);

$numeroCuenta = $_POST['cuenta'];

$consulta = "DELETE FROM usuarios WHERE cuenta = '$cuenta'";

$conexion->query($consulta);

header("Location: " . "privado.php");

$conexion->close();
?>
