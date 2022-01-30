-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.3.25-MariaDB-0ubuntu0.20.04.1 - Ubuntu 20.04
-- SO del servidor:              debian-linux-gnu
-- HeidiSQL Versión:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando datos para la tabla konectacafet.categoria: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` (`idcategoria`, `nombre`, `descripcion`, `condicion`) VALUES
	(1, 'Leche', 'deslactosada', 1),
	(2, 'Cafeteria', '', 1);
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;

-- Volcando datos para la tabla konectacafet.detalle_ingreso: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `detalle_ingreso` DISABLE KEYS */;
INSERT INTO `detalle_ingreso` (`iddetalle_ingreso`, `idingreso`, `idarticulo`, `cantidad`, `precio_compra`, `precio_venta`) VALUES
	(1, 1, 1, 1, 1.00, 1.00),
	(2, 2, 2, 1, 1.00, 1.00);
/*!40000 ALTER TABLE `detalle_ingreso` ENABLE KEYS */;

-- Volcando datos para la tabla konectacafet.detalle_venta: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `detalle_venta` DISABLE KEYS */;
INSERT INTO `detalle_venta` (`iddetalle_venta`, `idventa`, `idarticulo`, `cantidad`, `precio_venta`, `descuento`) VALUES
	(1, 1, 2, 1, 20.00, 0.00),
	(2, 1, 1, 1, 10.00, 0.00),
	(3, 3, 2, 1, 20.00, 0.00),
	(4, 5, 2, 1, 20.00, 0.00),
	(5, 6, 4, 1, 5000.00, 0.00),
	(6, 6, 4, 1, 5000.00, 0.00);
/*!40000 ALTER TABLE `detalle_venta` ENABLE KEYS */;

-- Volcando datos para la tabla konectacafet.ingreso: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `ingreso` DISABLE KEYS */;
INSERT INTO `ingreso` (`idingreso`, `idproveedor`, `idusuario`, `tipo_comprobante`, `serie_comprobante`, `num_comprobante`, `fecha_hora`, `impuesto`, `total_compra`, `estado`) VALUES
	(1, 4, 2, 'Ticket', '00', '048', '2022-01-30 00:00:00', 0.00, 1.00, 'Aceptado'),
	(2, 3, 2, 'Factura', '00', '050', '2022-01-30 00:00:00', 18.00, 1.00, 'Aceptado');
/*!40000 ALTER TABLE `ingreso` ENABLE KEYS */;

-- Volcando datos para la tabla konectacafet.permiso: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `permiso` DISABLE KEYS */;
INSERT INTO `permiso` (`idpermiso`, `nombre`) VALUES
	(1, 'Escritorio'),
	(2, 'Almacen'),
	(3, 'Compras'),
	(4, 'Ventas'),
	(5, 'Acceso'),
	(6, 'Consulta Compras'),
	(7, 'Consulta Ventas');
/*!40000 ALTER TABLE `permiso` ENABLE KEYS */;

-- Volcando datos para la tabla konectacafet.persona: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` (`idpersona`, `tipo_persona`, `nombre`, `tipo_documento`, `num_documento`, `direccion`, `telefono`, `email`) VALUES
	(1, 'Cliente', 'publico general', 'DNI', '30224520', 'Av.jose olaya 215', '54325230', 'public@hotmail.com'),
	(2, 'Cliente', 'William', 'CEDULA', '114181257', 'calle72', '3172921214', 'walucumi@misena.edu.co'),
	(3, 'Proveedor', 'Águila roja', 'DNI', '1144181257', 'carrera 28 e1 24 # 55-30', '3172921214', 'lwilian.andres@gmail.com'),
	(4, 'Proveedor', 'JUAN VALDEZ', 'DNI', '1144181257', 'carrera 28 e1 24 # 55-30', '3172921214', 'lwilian.andres@gmail.com');
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;

-- Volcando datos para la tabla konectacafet.producto: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` (`idarticulo`, `idcategoria`, `codigo`, `nombre`, `stock`, `precio`, `peso`, `descripcion`, `imagen`, `condicion`, `creado_en`) VALUES
	(1, 1, 'net cafe', 'Juan valdez', 6, 10, 47, '', '', 1, '2022-01-30'),
	(2, 1, '154', 'Agula roja', 6, 20, 1, '', '', 1, '2022-01-30'),
	(3, 1, 'net cafe', '6', 5, 3000, 3, 'cafe', '', 1, '2022-01-30'),
	(4, 2, '252813', 'Cafe cremoso', 0, 5000, 500, 'Instantaneo', '1643558536.jpg', 1, '2022-01-30');
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;

-- Volcando datos para la tabla konectacafet.usuario: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`idusuario`, `nombre`, `tipo_documento`, `num_documento`, `direccion`, `telefono`, `email`, `cargo`, `login`, `clave`, `imagen`, `condicion`) VALUES
	(1, 'Andres', 'DNI', '1144181257', 'calle 72', '3172921214', 'wilian.andres@hotmail.es', 'Administrador', 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', '1535417472.jpg', 1),
	(2, 'William', 'CEDULA', '1144181257', 'carrera 28 e1 24 # 55-30', '3172921214', 'lwilian.andres@gmail.com', 'Desarrollador', 'wilianlk', '4813494d137e1631bba301d5acab6e7bb7aa74ce1185d456565ef51d737677b2', '1643553230.jpeg', 1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

-- Volcando datos para la tabla konectacafet.usuario_permiso: ~14 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario_permiso` DISABLE KEYS */;
INSERT INTO `usuario_permiso` (`idusuario_permiso`, `idusuario`, `idpermiso`) VALUES
	(1, 1, 1),
	(2, 1, 2),
	(3, 1, 3),
	(4, 1, 4),
	(5, 1, 5),
	(6, 1, 6),
	(7, 1, 7),
	(22, 2, 1),
	(23, 2, 2),
	(24, 2, 3),
	(25, 2, 4),
	(26, 2, 5),
	(27, 2, 6),
	(28, 2, 7);
/*!40000 ALTER TABLE `usuario_permiso` ENABLE KEYS */;

-- Volcando datos para la tabla konectacafet.ventas: ~14 rows (aproximadamente)
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
INSERT INTO `ventas` (`idventa`, `idcliente`, `idusuario`, `tipo_comprobante`, `serie_comprobante`, `num_comprobante`, `fecha_hora`, `impuesto`, `total_venta`, `estado`) VALUES
	(1, 1, 1, 'Factura', '', '046', '2022-01-30 00:00:00', 18.00, 20.00, 'Aceptado'),
	(2, 2, 1, 'Factura', '', '048', '2022-01-30 00:00:00', 18.00, 10.00, 'Aceptado'),
	(3, 2, 1, 'Factura', '', '050', '2022-01-30 00:00:00', 18.00, 20.00, 'Aceptado'),
	(5, 2, 1, 'Factura', '00', '048', '2022-01-30 00:00:00', 18.00, 20.00, 'Aceptado'),
	(6, 2, 2, 'Factura', '2586', '050', '2022-01-30 00:00:00', 18.00, 20000.00, 'Aceptado');
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;

DELIMITER $$
CREATE TRIGGER `tr_updStockIngreso` AFTER INSERT ON `detalle_ingreso` FOR EACH ROW BEGIN
    UPDATE producto SET stock=stock + NEW.cantidad
    WHERE producto.idarticulo = NEW.idarticulo;
END
$$
DELIMITER ;

DELIMITER $$
CREATE TRIGGER `tr_udpStockVenta` AFTER INSERT ON `detalle_venta` FOR EACH ROW BEGIN
    UPDATE producto SET stock = stock - NEW.cantidad
    WHERE producto.idarticulo = NEW.idarticulo;
END
$$
DELIMITER ;


/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
