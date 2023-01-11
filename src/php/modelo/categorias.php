<?php
include_once "../configuracion/config.php";


class Categorias
{

    /*Atributos */
    private $conexion;
    public $nombreCategoria;
    public $extra;


    public function __construct()
    {
        $this->conexion = new mysqli(SERVIDOR, DBUSER, DBPASS, DB) or die('no hay conexion');
        $this->conexion->set_charset('utf8');
    }

    public function getAll()
    {
        $datos = $this->conexion->query('SELECT * FROM categorias ORDER BY idCategoria ASC');
        return $datos;
    }

    public function getCategoria($id)
    {
        $prepare = $this->conexion->prepare("SELECT * FROM categorias WHERE id=?");
        $prepare->bind_param('i', $id);
        $prepare->execute();
        $result = $prepare->get_result();
        $dato = $result->fetch_object();
        return $dato;
    }

    public function borrar($id)
    {
        $prepare = $this->conexion->prepare("DELETE FROM categorias WHERE idCategoria = ?");
        $prepare->bind_param("i", $id);
        $ok = $prepare->execute();
        $prepare->close();
        return $ok;
    }
}
