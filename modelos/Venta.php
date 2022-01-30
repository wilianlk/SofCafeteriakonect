<?php

require "../config/Conexion.php";

class Venta
{

    public function insertar($idcliente, $idusuario, $tipo_comprobante, $serie_comprobante, $num_comprobante, $fecha_hora, $impuesto, $total_venta, $idarticulo, $cantidad, $precio_venta, $descuento)
    {
        $sql = "INSERT INTO venta (idcliente,idusuario,tipo_comprobante,serie_comprobante,num_comprobante,fecha_hora,impuesto,total_venta,estado) VALUES ('$idcliente','$idusuario','$tipo_comprobante','$serie_comprobante','$num_comprobante','$fecha_hora','$impuesto','$total_venta','Aceptado')";

        $idventanew = ejecutarConsulta_retornarID($sql);
        $num_elementos = 0;
        $sw = true;
        while ($num_elementos < count($idarticulo)) {

            $sql_detalle = "INSERT INTO detalle_venta (idventa,idarticulo,cantidad,precio_venta,descuento) VALUES('$idventanew','$idarticulo[$num_elementos]','$cantidad[$num_elementos]','$precio_venta[$num_elementos]','$descuento[$num_elementos]')";

            ejecutarConsulta($sql_detalle) or $sw = false;

            $num_elementos = $num_elementos + 1;
        }
        return $sw;
    }

    public function anular($idventa)
    {
        $sql = "UPDATE venta SET estado='Anulado' WHERE idventa='$idventa'";
        return ejecutarConsulta($sql);
    }

    public function mostrar($idventa)
    {
        $sql = "SELECT v.idventa,DATE(v.fecha_hora) as fecha,v.idcliente,p.nombre as cliente,u.idusuario,u.nombre as usuario, v.tipo_comprobante,v.serie_comprobante,v.num_comprobante,v.total_venta,v.impuesto,v.estado FROM venta v INNER JOIN persona p ON v.idcliente=p.idpersona INNER JOIN usuario u ON v.idusuario=u.idusuario WHERE idventa='$idventa'";
        return ejecutarConsultaSimpleFila($sql);
    }

    public function listarDetalle($idventa)
    {
        $sql = "SELECT dv.idventa,dv.idarticulo,a.nombre,dv.cantidad,dv.precio_venta,dv.descuento,(dv.cantidad*dv.precio_venta-dv.descuento) as subtotal FROM detalle_venta dv INNER JOIN producto a ON dv.idarticulo=a.idarticulo WHERE dv.idventa='$idventa'";
        return ejecutarConsulta($sql);
    }

    public function listar()
    {
        $sql = "SELECT v.idventa,DATE(v.fecha_hora) as fecha,v.idcliente,p.nombre as cliente,u.idusuario,u.nombre as usuario, v.tipo_comprobante,v.serie_comprobante,v.num_comprobante,v.total_venta,v.impuesto,v.estado FROM venta v INNER JOIN persona p ON v.idcliente=p.idpersona INNER JOIN usuario u ON v.idusuario=u.idusuario ORDER BY v.idventa DESC";
        return ejecutarConsulta($sql);
    }

    public function ventacabecera($idventa)
    {
        $sql = "SELECT v.idventa, v.idcliente, p.nombre AS cliente, p.direccion, p.tipo_documento, p.num_documento, p.email, p.telefono, v.idusuario, u.nombre AS usuario, v.tipo_comprobante, v.serie_comprobante, v.num_comprobante, DATE(v.fecha_hora) AS fecha, v.impuesto, v.total_venta FROM venta v INNER JOIN persona p ON v.idcliente=p.idpersona INNER JOIN usuario u ON v.idusuario=u.idusuario WHERE v.idventa='$idventa'";
        return ejecutarConsulta($sql);
    }

    public function ventadetalles($idventa)
    {
        $sql = "SELECT a.nombre AS articulo, a.codigo, d.cantidad, d.precio_venta, d.descuento, (d.cantidad*d.precio_venta-d.descuento) AS subtotal FROM detalle_venta d INNER JOIN producto a ON d.idarticulo=a.idarticulo WHERE d.idventa='$idventa'";
        return ejecutarConsulta($sql);
    }

    public function validarstockproducto($id_producto)
    {
        $sql = "SELECT COUNT(*) vali FROM producto a WHERE a.stock > 0 AND a.idarticulo = '$id_producto'  ";
        return ejecutarConsulta($sql);
    }

}

?>
