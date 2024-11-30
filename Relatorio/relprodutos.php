<?php
date_default_timezone_set('America/Sao_Paulo');
require ('./vendor/autoload.php');
include ('../BDpetcare/config/conecta.php');
$sql=$conn->prepare("SELECT p.*,u.*,g.* FROM 
tb_produto p LEFT JOIN tb_unidade u ON 
u.id_unidade=p.unidade_id LEFT JOIN 
tb_grupo g on g.id_grupo= p.grupo_id where 
p.id_produto ORDER BY sequencia ASC LIMIT 30");
$sql->execute();

$result=$sql->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatorio produto</title>
    <style>

        @page{
    margin: 150px 50px ;
}
body{
    font-family: 'Verdana', sans-serif;
    margin:0px;
    padding:0px;
}
.header{
    position: fixed;
    left: 0;
    right:0;
    top: -100px;
    height: 50px;
    padding: 10px;
    background: #333;
    margin-bottom:100px;
    text-align: center;
}
.header img{
    height: 50px;
}
.footer{
    position: fixed;
    left: 0;
    right:0;
    bottom:0;
    background: #333;
    color:#FFF;
    text-align: center;
    padding: 10px;
}
h1{
    text-align: center;
}
table{
    width: 100%;
    border:1px solid #333;
    padding: 5px;
}
table tr th{
    background: #333;
    color:#FFF;
    padding:5px;
}
table tr:nth-child(even) td{
    background: #EEE;
}
.image{
    text-align: center;
}
.image img{
    border: 1px solid #CCC;
    padding:3px;
    margin:5px;
}

.gerapdf{
    display: inline;
    padding: 15px 25px;
    color: lightblue;
    text-decoration: none;
    transition: background .2s;
    font-size: 20px; /* Ajustei o tamanho das letras para maior visibilidade */
}

.gerapdf:hover {
    color: #FFE3E3;
    background-color: grey;
    border-radius: 15px;
    padding: 15px;
    transform: scale(0.5);
    z-index: 1;
}

        </style>
</head>
<body>

    <h1> Relatório de Produtos </h1>
    <li class="gerapdf"><a href="http://localhost/PetCareAll/Relatorio/gerapdfP.php">Gerar PDF</a></li>
    <li class="gerapdf"><a href="http://localhost/PetCareAll/Relatorio/PaginaRelatorios/pgrelatorios.php">Voltar</a></li>
    <br> <br>
    <table border="1">
        <thead>
            <tr>
                <th> ID </th>
                <th> Nome </th>
                <th> Grupo</th>
                <th> Unidade</th>
                <th> Preço Venda</th>
                <th> Preço Compra </th>
                <th> Foto Produto</th>
                <th> Sequencia</th>
               
            </tr>
        </thead>
        <tbody>
            <?php
           foreach($result as $linha) {
            echo "<tr>";
            echo "<td>".$linha['id_produto']. "</td>";
            echo "<td>".$linha['nm_produto']. "</td>";
            echo "<td>".$linha['nm_grupo']. "</td>";
            echo "<td>".$linha['nm_unidade']. "</td>";
            echo "<td>".$linha['preco_venda']. "</td>";
            echo "<td>".$linha['preco_compra']. "</td>";
            echo "<td>".$linha['nm_foto']. "</td>";
            echo "<td>".$linha['sequencia']. "</td>";
            
           }
            ?>

            <footer class="footer">
                Gerado em <?php echo (new Datetime())->format('d/m/Y h:i:s')?>
            </footer>
</body>
</html>