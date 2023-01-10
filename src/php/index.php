<?php

$__url = explode("/", $_SERVER['REQUEST_URI']);


if (isset($__url[5]) && isset($__url[6])) {
    $__controlador = $__url[5] . "controller";
    $__metodo = explode("?", $__url[6])[0];
} else {
    $__controlador = "iniciocontroller";
    $__metodo = "index";
}

require_once 'controlador/' . $__controlador . '.php';
$__objControlador = new $__controlador();
$__objControlador->$__metodo();

//http://localhost/wretos/src/php/index.php/categorias/crear
//echo $__url[5] . "<br>"; //categorias
//echo $__url[6] . "<br>"; //crear

