<?php
require_once '../modelo/categorias.php';
class CategoriasController
{
    public $categorias;

    public function __construct()
    {
        $this->categorias = new Categorias();
    }

    public function getAllCategorias()
    {
        return $this->categorias->getAll();
    }

    public function getCategoriaPorId($id)
    {
        return $this->categorias->getCategoria($id);
    }

    public function borrarCategoria($id)
    {
        return $this->categorias->borrar($id);
    }

    public function index()
    {
        //http://localhost/wretos/src/php/index.php/categorias/index
        echo "estoy en el metodo index de categorias";
    }
}
