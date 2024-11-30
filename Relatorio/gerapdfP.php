<?php
require('./vendor/autoload.php');
use Dompdf\Dompdf;
$dompdf = new Dompdf(['enable_remote'=>true]);
 
ob_start(); // inicializa o cache de saída, ou seja, 
//a partir dela todo conteudo que seria “exibido” será armazenado em cache
//require('relatoriolocal.php');
require(__DIR__ . '/relprodutos.php');
$html = ob_get_clean(); // inicializa o cache de saída, ou seja, 
//a partir dela todo conteudo que seria “exibido” será armazenado em cache
 
$dompdf->loadHtml($html);  //retorna todo o conteúdo do cache de saída 
//e o limpa. 
//Armazena-se este conteúdo em um variável e o passa-se para o método loadHtml
$dompdf->setPaper('A4','portrait'); //aceita os formatos de comuns de papel: ‘letter’, ‘legal’, ‘A4’, ‘A3’
// o segundo parâmetro aceita retrato (portrait) como padrão e também landscape
$dompdf->render(); //converter o HTML para os dados em PDF
 
$dompdf->stream('documento.pdf',['Attachment'=>false] ); //visualizar a resposta chamando 
//o método stream,
?>