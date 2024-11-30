<?php 
include('../config/conecta.php');
if(!empty($_GET['id']) ){
    $id=$_GET['id'];

    $sql = $conn->prepare("SELECT * FROM tb_forma_pgto WHERE id_forma_pgto=:id LIMIT 1");
    $sql->bindParam(':id',$id);
    $sql->execute();
    $result=$sql->fetch();
    

    ?>
    
    <form action="editar_submit.php" method="post">
        <label for="">ID</label>
        <input type="text" name="id_forma_pgto" id=""  value="<?php echo $result['id_forma_pgto']?>" disabled>
        <label for="">Forma de pagamento</label>
        <input type="text" name="nm_forma_pgto" id=""  value="<?php echo $result['nm_forma_pgto']?>">
        
        <input type="hidden" name="id_forma_pgto" id=""  value="<?php echo $result['id_forma_pgto']?>" >
        
        <input type="submit" value="Enviar">
    </form>


    <?php 
     }

    ?>