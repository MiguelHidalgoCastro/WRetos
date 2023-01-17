<?php

require_once '../controlador/categoriascontroller.php';

$controladorCategoria = new CategoriasController();
$datos = $controladorCategoria->getAllCategorias();

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
                                <th scope="col">#ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            if ($datos) {
                                while ($dato = $datos->fetch_object()) {
                                    //echo($dato->nombreCategoria);
                                    echo "<tr>
                                        <th scope='row'>$dato->idCategoria</th>
                                        <td>$dato->nombreCategoria</td>
                                        <td>
                                        <a href=listacategorias.php?idCat=" . $dato->idCategoria . "&action=borrar><img src=../../assets/icons//delete.png title='borrar' style='width:10%'></a>
										<a href=modificarescenario.php?idCat=" . $dato->idCategoria . "><img src=../../assets/icons/edit.png title='modificar' style='width:10%'></a>
                                        </td>
                                        </tr>";
                                }
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