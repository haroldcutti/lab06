<?php

include('../conexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $curso_id = $_POST['curso_id'];
    $nombre_curso = $_POST['nombre_curso'];
    $creditos = $_POST['creditos'];

    
    $conexion = conectar();

    
    $sql = "UPDATE curso SET nombre_curso = '$nombre_curso', creditos = '$creditos' WHERE curso_id = $curso_id";

    
    if (mysqli_query($conexion, $sql)) {
        
        desconectar($conexion);

        
        header('Location: cursos.php');
        exit;
    } else {
        $error = 'Error al actualizar el curso: ' . mysqli_error($conexion);
    }
} else {
    
    $curso_id = $_GET['curso_id'];

    
    $conexion = conectar();

    
    $sql = "SELECT nombre_curso, creditos FROM curso WHERE curso_id = $curso_id";

    
    $resultado = mysqli_query($conexion, $sql);

    
    $curso = mysqli_fetch_array($resultado);

    
    desconectar($conexion);

    
    $nombre_curso = $curso['nombre_curso'];
    $creditos = $curso['creditos'];
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar curso</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
</head>
<body>
    <div class="container">
        <h1>Editar curso</h1>
        <?php if (isset($error)) { ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php } ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form-group">
                <label for="nombre_curso">Nombre del curso:</label>
                <input type="text" class="form-control" id="nombre_curso" name="nombre_curso" value="<?php echo $nombre_curso; ?>">
            </div>
            <div class="form-group">
                <label for="creditos">Creditos:</label>
                <input type="number" class="form-control" id="creditos" name="creditos" value="<?php echo $creditos; ?>">
            </div>
            <input type="hidden" name="curso_id" value="<?php echo $curso_id; ?>">
            <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>