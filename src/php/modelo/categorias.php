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
        //mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        // mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);
    }

    public function addCategoria($post)
    {
        try {
            $this->nombreCategoria = $post['nombreCat'];
            $prepare = $this->conexion->prepare("INSERT INTO categorias (nombreCategoria) VALUES (?)");
            $prepare->bind_param("s", $this->nombreCategoria);
            $ok = $prepare->execute();
            $prepare->close();
            return $ok;
        } catch (mysqli_sql_exception $e) {
            if ($e->getCode() == 1062) {
                echo "<script>alert('Categoría ya existente')
                window.location.href='addCategoria.php'</script>";
            } else {
                echo '<script>alert("' . $e->getMessage() . '")
                window.location.href="addCategoria.php"</script>';
            }
            die();
        }
    }

    public function getAll()
    {
        $datos = $this->conexion->query('SELECT * FROM categorias ORDER BY idCategoria ASC');
        return $datos;
    }

    public function getCategoria($id)
    {
        $prepare = $this->conexion->prepare("SELECT * FROM categorias WHERE idCategoria=?");
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

    public function update($post, $id)
    {
        try {
            $prepare = $this->conexion->prepare("UPDATE categorias SET nombreCategoria=? WHERE idCategoria=?");
            $prepare->bind_param('si', $post['nombreCat'], $id);
            $ok = $prepare->execute();
            $prepare->close();
            return $ok;
        } catch (mysqli_sql_exception $e) {
            if ($e->getCode() == 1062) {
                echo '<script>alert("Categoría ya existente")
                window.location.href="modificarcategoria.php?idCat=' . $id . '"</script>';
            } else {
                echo '<script>alert("' . $e->getMessage() . '")
                window.location.href="modificarcategoria.php?idCat=' . $id . '"</script>';
            }
            die();
        }
    }
}
