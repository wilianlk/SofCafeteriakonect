<?php

require "../config/Conexion.php";

class Permiso
{

    public function listar()
    {
        $sql = "SELECT * FROM permiso";
        return ejecutarConsulta($sql);
    }
}

?>
