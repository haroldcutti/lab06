<?php

include('../conexion.php');

// Abrimos la conexion a la BD MySql
$conexion = conectar();

// Definimos la consulta SQL
$sql = 'SELECT curso_id, nombre_curso, creditos FROM curso';

// Ejecutamos el query en la conexion abierta
$resultado = mysqli_query($conexion, $sql);

// Cerramos la conexion
desconectar($conexion);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
</head>
<body>
    <div class="container">
        <h1>Cursos</h1>
        <div>
            <a href="agregar.html" class="btn btn-primary">Nuevo curso</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Credito</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($curso = mysqli_fetch_array($resultado)){
                            $curso_id = $curso['curso_id'];
                            $nombre_curso = $curso['nombre_curso'];
                            $creditos = $curso['creditos'];

                            echo '<tr>';
                            echo '<td>' . $curso_id . '</td>';
                            echo '<td>' . $nombre_curso . '</td>';
                            echo '<td>' . $creditos . '</td>';
                            echo '<td><a href="editar_curso.php?curso_id=' . $curso_id . '" class="btn btn-primary btn-sm">Editar</a></td>';
                            echo '<td><a href="eliminar_curso.php?curso_id=' . $curso_id . '" class="btn btn-danger btn-sm">Eliminar</a></td>';
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>