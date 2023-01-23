<?php

require_once('../controlador/categoriascontroller.php');

$controlador = new CategoriasController();
$confirm = false;
$categoria = $controlador->getCategoriaPorId($_GET['idCat']);

if (isset($_POST) && !empty($_POST)) {
    if (!empty($_POST['nombreCat'])) {
        if (strlen($_POST['nombreCat']) > 3) {
            $confirm = $controlador->updateCategoria($_POST, $_GET['idCat']);
            if ($confirm) {
                echo "<script>alert('Categoría modificada correctamente')
            window.location.href='listacategorias.php'</script>";
            } else {
                echo "<script>alert('ocurrió un problema')</script>";
            }
        } else
            echo "<script>alert('El nombre de la categoría es demasiado pequeño, mínimo 4 letras')</script>";
    } else
        echo "<script>alert('El nombre de la categoría está vacío, rellenalo')</script>";
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
    <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
        <a class="navbar-brand" href="#">WEB RETOS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="../index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="listacategorias.php">Lista Categorias</a>
                </li>
            </ul>
        </div>
    </nav>

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