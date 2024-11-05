<?php

include 'conexao.php';

$nome = $_POST['nome'];
$rua = $_POST['rua'];
$numero = $_POST['numero'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$uf = $_POST['uf'];
$cnpj = $_POST['cnpj'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];

$sql = "INSERT INTO fornecedor (
                                nome, 
                                rua,
                                numero,
                                bairro,
                                cidade,
                                uf,
                                cnpj,
                                email,
                                telefone) 
        VALUES                  (
                                '$nome',
                                '$rua',
                                $numero,
                                '$cidade',
                                '$bairro',
                                '$cidade',
                                '$uf',
                                $cnpj,
                                '$email',
                                $telefone)";

$inserir = mysqli_query($conexao,$sql);

?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<div class="container" style="width: 500px; margin-top: 20px;">

    <center>
    <div style="margin-top: 10px" class="alert alert-success" role="alert">
        Fornecedor cadastrado com sucesso!
    </div>

    <div style="padding-top: 20px">
    <a href="adicionar_fornecedor.php" role="button" class="btn btn-primary">Cadastrar novo fornecedor</a>
    </center>

</div>