<?php

include 'conexao.php';
include 'script/password.php';

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$dataCriacao = date('Y-m-d');
$status = 1;
$PerfilUsuario_idPerfilUsuario = $_POST['PerfilUsuario_idPerfilUsuario'];


$sql = "INSERT INTO usuario (nome, email, senha, dataCriacao, status, PerfilUsuario_idPerfilUsuario) values ('$nome','$email',sha1('$senha'),'$dataCriacao', $status, $PerfilUsuario_idPerfilUsuario)";
$inserir = mysqli_query($conexao,$sql);

?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<div class="container" style="width: 500px; margin-top: 20px;">

    <center>
    <div style="margin-top: 10px" class="alert alert-success" role="alert">
    Usuário inserido com sucesso!
    </div>

    <div style="padding-top: 20px">
    <a href="adicionar_usuario.php" role="button" class="btn btn-primary">Cadastrar novo item</a>
    <a class="btn btn-warning" href="usuario.php" role="button">&nbsp;Voltar</a>
    </center>
    

</div>