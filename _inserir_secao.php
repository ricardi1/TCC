<?php

include 'conexao.php';

$codSecao = $_POST['codSecao'];
$nomeSecao = $_POST['nomeSecao'];
$Usuario_idUsuarioChefe = $_POST['Usuario_idUsuarioChefe'];

$sql = "INSERT INTO secao (codSecao, nomeSecao, Usuario_idUsuarioChefe) values ('$codSecao','$nomeSecao', $Usuario_idUsuarioChefe)";
$inserir = mysqli_query($conexao,$sql);

?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<div class="container" style="width: 500px; margin-top: 20px;">

    <center>
    <div style="margin-top: 10px" class="alert alert-success" role="alert">
        Seção cadastrada com sucesso!
    </div>
    <div style="padding-top: 20px">
    <a href="adicionar_secao.php" role="button" class="btn btn-primary">Cadastrar novo item</a>
    </center>

</div>