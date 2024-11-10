<?php

include 'conexao.php';

$codigo = $_POST['codigo'];
$descricao = $_POST['descricao'];

$sql = "INSERT INTO ccustos (codigo, descricao) values ('$codigo','$descricao')";
$inserir = mysqli_query($conexao,$sql);

?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<div class="container" style="width: 500px; margin-top: 20px;">

    <center>
    <div style="margin-top: 10px" class="alert alert-success" role="alert">
        Centro de custos cadastrado com sucesso!
    </div>
    <div style="padding-top: 20px">
    <a href="adicionar_ccustos.php" role="button" class="btn btn-primary">Cadastrar novo item</a>
    </center>

</div>