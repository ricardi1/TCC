<?php

include 'conexao.php';

$id = $_POST['id'];
$descricao = $_POST['descricao'];

$sql = "UPDATE ccustos 
        SET descricao ='$descricao' 
        WHERE idCCustos = $id";

$atualizar = mysqli_query($conexao, $sql);

?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/642a493c63.js" crossorigin="anonymous"></script>

<div class="container" style="width: 400px;">
<center>
    <div style="margin-top: 10px" class="alert alert-success" role="alert">
        Centro de custos atualizado com sucesso!
    </div>
    <div style="margin-top: 10px">
    <a class="btn btn-warning btn-sm" href="ccustos.php" role="button"><i class="fa-solid fa-chevron-left"></i>&nbsp;Voltar</a>
    </div>
</center>    
</div>