<?php

require "../config/Conexion.php";

class Articulo
{

    public function insertar($idcategoria, $codigo, $nombre, $stock, $precio, $peso, $descripcion, $imagen)
    {
        $sql = "INSERT INTO producto (idcategoria,codigo,nombre,stock,precio,peso,descripcion,imagen,condicion)
	 VALUES ('$idcategoria','$codigo','$nombre','$stock','$precio','$peso','$descripcion','$imagen','1')";
        return ejecutarConsulta($sql);
    }

    public function editar($idarticulo, $idcategoria, $codigo, $nombre, $stock, $precio, $peso, $descripcion, $imagen)
    {
        $sql = "UPDATE producto SET idcategoria='$idcategoria',codigo='$codigo', nombre='$nombre',stock='$stock',precio='$precio',peso='$peso',descripcion='$descripcion',imagen='$imagen' 
	WHERE idarticulo='$idarticulo'";
        return ejecutarConsulta($sql);
    }

    public function desactivar($idarticulo)
    {
        $sql = "UPDATE producto SET condicion='0' WHERE idarticulo='$idarticulo'";
        return ejecutarConsulta($sql);
    }

    public function activar($idarticulo)
    {
        $sql = "UPDATE producto SET condicion='1' WHERE idarticulo='$idarticulo'";
        return ejecutarConsulta($sql);
    }

    public function mostrar($idarticulo)
    {
        $sql = "SELECT * FROM producto WHERE idarticulo='$idarticulo'";
        return ejecutarConsultaSimpleFila($sql);
    }

    public function listar()
    {
        $sql = "SELECT a.idarticulo,a.idcategoria,c.nombre as categoria,a.codigo, a.nombre,a.stock,a.precio,a.peso,a.descripcion,a.imagen,a.condicion FROM producto a INNER JOIN categoria c ON a.idcategoria=c.idcategoria";
        return ejecutarConsulta($sql);
    }

    public function listarActivos()
    {
        $sql = "SELECT a.idarticulo,a.idcategoria,c.nombre as categoria,a.codigo, a.nombre,a.stock,a.descripcion,a.imagen,a.condicion FROM producto a INNER JOIN categoria c ON a.idcategoria=c.idcategoria WHERE a.condicion='1'";
        return ejecutarConsulta($sql);
    }

    public function listarActivosVenta()
    {
        $sql = "SELECT a.idarticulo,a.idcategoria,c.nombre as categoria,a.codigo, a.nombre,a.stock,IFNULL((SELECT precio_venta FROM detalle_ingreso WHERE idarticulo=a.idarticulo ORDER BY iddetalle_ingreso DESC LIMIT 0,1),a.precio) AS precio_venta,a.descripcion,a.imagen,a.condicion FROM producto a INNER JOIN categoria c ON a.idcategoria=c.idcategoria WHERE a.condicion='1' GROUP BY a.idarticulo";
        return ejecutarConsulta($sql);
    }
}

?>
