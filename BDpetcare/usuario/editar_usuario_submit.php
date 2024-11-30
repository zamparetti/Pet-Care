<?php 

include('../config/conecta.php');

$nm_usuario=$_POST['nm_usuario'];
$email_usuario=$_POST['email_usuario'];
$login_usuario=$_POST['login_usuario'];
$senha_usuario=$_POST['senha_usuario'];
$id=$_POST['id_usuario'];

$sql=$conn->prepare("UPDATE tb_usuario SET nm_usuario = :nm_usuario, email_usuario = :email_usuario, login_usuario = :login_usuario, senha_usuario = :senha_usuario WHERE id_usuario=:id");
$sql->bindParam(':nm_usuario',$nm_usuario);
$sql->bindParam(':email_usuario',$email_usuario);
$sql->bindParam(':login_usuario',$login_usuario);
$sql->bindParam(':senha_usuario',$senha_usuario);
$sql->bindValue(':id',$id);
$sql->execute();
header('location:usuario.php');
?>