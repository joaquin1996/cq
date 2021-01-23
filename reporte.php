<?php
include_once 'includes/functions.php';
include_once 'vendor/autoload.php';

$datos_usuario = whereFirst($conn, 'datos_usuario', 'id_usuario', $_GET['id']);

// Iniciamos el buffer
ob_start();
  // Operaciones para generar el HTML que pueden ser llamadas a Bases de Datos, while, etc...
  include_once ('curriculum_pdf.php');
  // Volcamos el contenido del buffer
  $html = ob_get_clean();

// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf(array('enable_remote' => true));
$dompdf->loadHtml(utf8_decode($html));

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$fecha_actual = date('Y_m_d_h_i_s');
$dompdf->stream($datos_usuario->nombre."_".$datos_usuario->apellido."$fecha_actual.pdf", array('Attachment'=> false));

?>