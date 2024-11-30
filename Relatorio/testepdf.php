<?php

require('./vendor/autoload.php');
use Dompdf\Dompdf;
$dompdf=new Dompdf();
$dompdf->loadHtml('<h1>CEDUP</h1><p>Turma 301 </p>');
$dompdf->setPaper('A4');
$dompdf->render();
$dompdf->stream('documento.pdf',['Attachment'=>false] );

?>