<?php

require_once('../controlador/categoriascontroller.php');

$controlador = new CategoriasController();
$confirm = false;
$categoria = $controlador->getCategoriaPorId($_GET['idCat']);

if (isset($_POST) && !empty($_POST)) {
    $confirm = $controlador->updateCategoria($_POST, $_GET['idCat']);
    if ($confirm) {
        echo "<script>alert('Categoría modificada correctamente')
            window.location.href='listacategorias.php'</script>";
    } else {
        echo "<script>alert('ocurrió un problema')</script>";
    }
}


?>



<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>AddCategoria</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-6 m-auto">
                <div class="row">
                    <h1>MODIFICAR CATEGORIA</h1>
                </div>
                <form enctype="multipart/form-data" action="" method="POST" onSubmit="return confirm('¿Está seguro de modificar ésta categoria?')">
                    <div class="row">
                        <label for="nombreCat">Nombre de categoría:</label>
                        <input type="text" name="nombreCat" id="nombreCat" value="<?php echo ($categoria->nombreCategoria) ?>">

                    </div>
                    <div class="row pt-2">
                        <div class="col-3">
                            <input class="btn btn-success" type="submit" value="MODIFICAR">
                        </div>
                        <div class="col-3">
                            <button class="btn btn-secondary"><a class="text-decoration-none text-white" href="listacategorias.php">Atrás</a></button>
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>

</body>

</html>