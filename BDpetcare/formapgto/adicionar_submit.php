<?php
$nm_forma_pgto=$_POST['nm_forma_pgto'];
include ('../config/conecta.php');
$conn=new PDO("mysql:host=localhost;dbname=petcare;charset=utf8","root","");
$sql=$conn->prepare("INSERT INTO tb_forma_pgto (nm_forma_pgto) VALUES (:nm_forma_pgto)");
$sql->bindParam('nm_forma_pgto' ,$nm_forma_pgto);
$sql->execute();

header('location:formapgto.php');

?>