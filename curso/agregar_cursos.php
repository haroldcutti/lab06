<?php

include('../conexion.php');

$nombre_curso = $_POST['nombre_curso'];
$creditos = $_POST['creditos'];

$conexion = conectar();

$sql = "INSERT INTO curso (nombre_curso, creditos) VALUES ('$nombre_curso', '$creditos')";

$resultado = mysqli_query($conexion, $sql);

desconectar($conexion);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Curso</title>
</head>
<body>
    <h1>Nuevo Curso</h1>
    <h3>
    <?php
        if (!$resultado){
            echo 'No se ha podido registrar el curso';
        }
        else{
            echo 'Curso registrado';
        }
    ?>
    </h3>
    <a href="cursos.php">Regresar</a>
</body>
</html>
