<?php
require_once '../modelo/categorias.php';
class CategoriasController
{
    public $categorias;

    public function __construct()
    {
        $this->categorias = new Categorias();
    }

    public function addCategoria($post)
    {
        return $this->categorias->addCategoria($post);
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

    public function updateCategoria($post, $id)
    {
        return $this->categorias->update($post, $id);
    }
}
