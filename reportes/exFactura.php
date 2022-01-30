<?php 

ob_start();
if (strlen(session_id())<1) 
  session_start();

if (!isset($_SESSION['nombre'])) {
  echo "debe ingresar al sistema correctamente para visualizar el reporte";
}else{

if ($_SESSION['ventas']==1) {

require('Factura.php');


$logo="logo.png";
$ext_logo="png";
$empresa="Konecta";
$documento="1144181257";
$direccion="test";
$telefono="3172921214";
$email="lwilian.andres@gmail.com";

require_once "../modelos/Venta.php";
$venta= new Venta();
$rsptav=$venta->ventacabecera($_GET["id"]);


$regv=$rsptav->fetch_object();

$pdf = new PDF_Invoice('p','mm','A4');
$pdf->AddPage();

$pdf->addSociete(utf8_decode($empresa),
                 $documento."\n".
                 utf8_decode("Direccion: "). utf8_decode($direccion)."\n".
                 utf8_decode("Telefono: ").$telefono."\n".
                 "Email: ".$email,$logo,$ext_logo);

$pdf->fact_dev("$regv->tipo_comprobante ","$regv->serie_comprobante- $regv->num_comprobante");
$pdf->temporaire( "" );
$pdf->addDate($regv->fecha);

$pdf->addClientAdresse(utf8_decode($regv->cliente),
                       "Domicilio: ".utf8_decode($regv->direccion), 
                       $regv->tipo_documento.": ".$regv->num_documento, 
                       "Email: ".$regv->email, 
                       "Telefono: ".$regv->telefono);


$cols=array( "CODIGO"=>23,
	         "DESCRIPCION"=>78,
	         "CANTIDAD"=>22,
	         "P.U."=>25,
	         "DSCTO"=>20,
	         "SUBTOTAL"=>22);
$pdf->addCols( $cols);
$cols=array( "CODIGO"=>"L",
             "DESCRIPCION"=>"L",
             "CANTIDAD"=>"C",
             "P.U."=>"R",
             "DSCTO"=>"R",
             "SUBTOTAL"=>"C" );
$pdf->addLineFormat( $cols);
$pdf->addLineFormat($cols); 

$y=85;


$rsptad=$venta->ventadetalles($_GET["id"]);

while($regd=$rsptad->fetch_object()){
  $line = array( "CODIGO"=>"$regd->codigo",
                 "DESCRIPCION"=>utf8_decode("$regd->articulo"),
                 "CANTIDAD"=>"$regd->cantidad",
                 "P.U."=>"$regd->precio_venta",
                 "DSCTO"=>"$regd->descuento",
                 "SUBTOTAL"=>"$regd->subtotal");
  $size = $pdf->addLine( $y, $line );
  $y += $size +2;

}  

require_once "Letras.php";
$V = new EnLetras();

$pdf->addTVAs( $regv->impuesto, $regv->total_venta, "S/ ");
$pdf->addCadreEurosFrancs("IGV"." $regv->impuesto %");
$pdf->Output('Reporte de Venta' ,'I');

	}else{
echo "No tiene permiso para visualizar el reporte";
}

}

ob_end_flush();
  ?>