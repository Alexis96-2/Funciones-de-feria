<?php

include_once ('../conexion/conexion.php');

$respuesta = array();

$respuesta["escuela_procedencia"] = array();

// Conectarse al servidor y seleccionar base de datos.

$con = mysqli_connect("$host", "$username", "$password")or die("cannot connect server ");

mysqli_select_db($con,"$db_name")or die("cannot select DB");

$sql="SELECT * FROM escuela ORDER BY Nombre ASC";

$result=mysqli_query($con,$sql);

while($row = mysqli_fetch_array($result)){

// Array temporal para crear una sola categoría

$tmp = array();

$tmp["ID"] = $row["ID"];

$tmp["Nombre"] = $row["Nombre"];

// Push categoría a final json array

array_push($respuesta["escuela_procedencia"], $tmp);

}

// Mantener el encabezado de respuesta a json

header('Content-Type: application/json');

//Escuchando el resultado de json


echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);

?>