<?php

require_once '../controlador/categoriascontroller.php';

$controladorCategoria = new CategoriasController();
$datos = $controladorCategoria->getAllCategorias();
$noHayDatos = false;
if ($datos->num_rows === 0)
    $noHayDatos = true;

if (isset($_GET['action'])) {
    $borrado = $controladorCategoria->borrarCategoria($_GET['idCat']);
    if ($borrado) {
        echo "<script>alert('borrado perfecto')
        window.location=document.referrer</script>";
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

    <title>Lista Categorias</title>
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
        <div class="col">
            <div class="row">
                <h1 class="fw-bold text-center">Lista Categorias</h1>
            </div>
            <div class="row">
                <div class="col-6 m-auto">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">#ID</th>
                                <th scope="col" class="text-center">Nombre</th>
                                <th scope="col" class="text-center">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            if ($datos) {
                                while ($dato = $datos->fetch_object()) {
                                    //echo($dato->nombreCategoria);
                                    echo "<tr>
                                        <th scope='row' class='text-center'>$dato->idCategoria</th>
                                        <td class='text-center'>$dato->nombreCategoria</td>
                                        <td class='text-center'>
                                        <a href=listacategorias.php?idCat=" . $dato->idCategoria . "&action=borrar><img src=../../assets/icons//delete.png title='borrar' style='width:10%'></a>
										<a href=modificarcategoria.php?idCat=" . $dato->idCategoria . "><img src=../../assets/icons/edit.png title='modificar' style='width:10%'></a>
                                        </td>
                                        </tr>";
                                }
                            }
                            ?>
                            <?php
                            if ($noHayDatos) {
                                echo '<tr><td class="text-center">NO HAY DATOS</td><td class="text-center">NO HAY DATOS</td><td class="text-center">NO HAY DATOS</td></tr>';
                            }

                            ?>
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="row">
                <!--BOTONES ATRAS Y AÑADIR-->
                <div class="col-6 m-auto">
                    <a href="addCategoria.php" class="btn btn-primary float-sm-right">AÑADIR</a>
                    <a href="../index.php" class="btn btn-secondary">ATRAS</a>
                </div>
            </div>
        </div>

    </div>
</body>

</html>