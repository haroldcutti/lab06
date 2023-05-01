<?php
include('../conexion.php');

if(isset($_GET['matricula_id'])) {
    $matricula_id = $_GET['matricula_id'];

    $conexion = conectar();

    $sql = "DELETE FROM matricula WHERE matricula_id = $matricula_id";

    $resultado = mysqli_query($conexion, $sql);

    desconectar($conexion);

    header('Location: matriculas.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar matricula</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
</head>
<body>
    <div class="container">
        <h1>Eliminar matricula</h1>
        <p>¿Esta seguro de que desea eliminar esta matricula?</p>
        <div>
            <a href="matriculas.php" class="btn btn-default">Cancelar</a>
            <a href="eliminar_matricula.php?matricula_id=<?php echo $matricula_id; ?>" class="btn btn-danger">Eliminar</a>
        </div>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html> 