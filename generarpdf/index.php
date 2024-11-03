<?php 
require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML('<h1>Hola mundo</h1>');
$mpdf->WriteHTML('<p>Soy un archivo PDF</p>');
$mpdf->Output();

?>