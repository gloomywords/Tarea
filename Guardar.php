<?php

echo "El nombre de la materia es";
echo $_GET["materia"];
echo "Y el nombre del profesor es ";
echo $_GET["profesor"];

$otraCosa = "Hola: ";
$otraCosa= $otraCosa . $_GET["Profesor"];

$servername = "69.64.74.20";
$username = "pixan_alumnos";
$password = "alumnos2016.";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

$sentenciaSQL = "INSERT INTO pixan_alumnos.t1518072 VALUES(NULL, '".$_GET['materia']."', 'MEMO');";


if (mysqli_query($conn, $sentenciaSQL)){
echo "exitoo";
}else{
echo "error".mysqli_error($conn);
}