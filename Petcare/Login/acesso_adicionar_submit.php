<?php

include('../../BDpetcare/config/conecta.php');

echo "cadastro";

if ( isset($_POST['nm_usuario']) && isset($_POST['login_usuario'])
&& isset($_POST['senha_usuario']) && isset($_POST['email_usuario'])) {
    $nm_usuario=$_POST['nm_usuario'];
    $login_usuario=$_POST['login_usuario'];
    $senha_usuario=$_POST['senha_usuario'];
    $email_usuario=$_POST['email_usuario'];

    $sqlUsuario=$conn->prepare("SELECT * FROM tb_usuario WHERE login_usuario= :login LIMIT 1");
    $sqlUsuario->bindParam(':login',$login_usuario);
    $sqlUsuario->execute();

    if ($sqlUsuario->rowCount()>0) {

        echo "Usuário já cadastrado";
        ?>
        <p>
        <a href="acesso_adicionar.php">Registrar</a>
        </p>
        <?php

    } else {

    



    $sql=$conn->prepare("INSERT INTO tb_usuario (nm_usuario, login_usuario, senha_usuario, email_usuario) VALUES (:nm_usuario, :login_usuario, :senha_usuario, :email_usuario)");

    $sql->bindParam(':nm_usuario', $nm_usuario);
    $sql->bindParam(':login_usuario', $login_usuario);
    $sql->bindParam(':senha_usuario', $senha_usuario);
    $sql->bindParam(':email_usuario', $email_usuario);

 $sql->execute();
    header('location: login.php');


    }
  
}



?>