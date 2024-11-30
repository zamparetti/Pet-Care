<?php
include ('../config/conecta.php');

if (!empty($_GET['id'])   ) {
    $id=$_GET['id'];

    $sql=$conn->prepare("SELECT * FROM tb_unidade WHERE id_unidade=:id LIMIT 1");
    $sql->bindParam(':id',$id);
    $sql->execute();
    $result=$sql->fetch();
  
    ?>

    <form action="editar_submit.php" method="post">
    <label for="">ID</label>
        <label for=""> ID </label>
        <input type="text" name="id_unidade" id=""   value="<?php echo $result['id_unidade']?>  " disabled >
        <label for="">Nome</label>
        <input type="text" name="nm_unidade" id=""   value="<?php echo $result['nm_unidade']?>  " >
        <label for="">Sigla</label>
        <input type="text" name="sigla_unidade" id=""  value="<?php echo $result['sigla_unidade']?>">
        <input type="hidden" name="id_unidade" id=""   value="<?php echo $result['id_unidade']?>  "  >
        <input type="submit" value="Enviar">
    </form>

    <?php
}


?>