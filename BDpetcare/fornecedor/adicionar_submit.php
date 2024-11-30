<?php
$nm_fornecedor=$_POST['nm_fornecedor'];
$cidade_id=$_POST['cidade_id'];
$cpf_fornecedor=$_POST['cpf_fornecedor'];
$email_fornecedor=$_POST['email_fornecedor'];
$cnpj_fornecedor=$_POST['cnpj_fornecedor'];
$telefone_fornecedor=$_POST['telefone_fornecedor'];
include('../config/conecta.php');
$conn=new PDO("mysql:host=localhost;dbname=petcare;charset=utf8","root","");
$sql=$conn->prepare("INSERT INTO tb_fornecedor (nm_fornecedor,cidade_id,cpf_fornecedor,email_fornecedor,cnpj_fornecedor,telefone_fornecedor) 
VALUES (:nm_fornecedor,:cidade_id,:cpf_fornecedor,:email_fornecedor,:cnpj_fornecedor,:telefone_fornecedor)"); 
$sql->bindParam(':nm_fornecedor',$nm_fornecedor);
$sql->bindParam(':cidade_id',$cidade_id);
$sql->bindParam(':cpf_fornecedor',$cpf_fornecedor);
$sql->bindParam(':email_fornecedor',$email_fornecedor);
$sql->bindParam(':cnpj_fornecedor',$cnpj_fornecedor);
$sql->bindParam(':telefone_fornecedor',$telefone_fornecedor);
$sql->execute();
header('location:fornecedor.php')
?>