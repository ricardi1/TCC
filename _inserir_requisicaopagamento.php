<?php

include 'conexao.php';

$descricao = $_POST['descricao'];
$valor = $_POST['valor'];
$dataEmissao = $_POST['dataEmissao'];
$dataVencimento = $_POST['dataVencimento'];
$numeroNF = $_POST['numeroNF'];
$dataRequisicao = date('Y-m-d');
$MeioPagamento_idMeioPagamento = $_POST['MeioPagamento_idMeioPagamento'];
$Fornecedor_idFornecedor = $_POST['Fornecedor_idFornecedor'];
$Orcamento_idOrcamento = $_POST['Orcamento_idOrcamento'];
$Usuario_idUsuario = $_POST['Usuario_idUsuario'];
$CCustos_idCCustos = $_POST['CCustos_idCCustos'];

$sql = "INSERT INTO requisicaopagamento (
                                descricao, 
                                valor,
                                dataEmissao,
                                dataVencimento,
                                numeroNF,
                                dataRequisicao,
                                MeioPagamento_idMeioPagamento,
                                Fornecedor_idFornecedor,
                                Orcamento_idOrcamento,
                                Usuario_idUsuario,
                                CCustos_idCCustos,
                                status) 
        VALUES                  (
                                '$descricao',
                                $valor,
                                '$dataEmissao',
                                '$dataVencimento',
                                '$numeroNF',
                                '$dataRequisicao',
                                $MeioPagamento_idMeioPagamento,
                                $Fornecedor_idFornecedor,
                                $Orcamento_idOrcamento,
                                1,
                                $CCustos_idCCustos,
                                0)";

$inserir = mysqli_query($conexao,$sql);

?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<div class="container" style="width: 500px; margin-top: 20px;">

    <center>
    <div style="margin-top: 10px" class="alert alert-success" role="alert">
        Requisição com sucesso!
    </div>

    <div style="padding-top: 20px">
    <a href="adicionar_fornecedor.php" role="button" class="btn btn-primary">Cadastrar nova requisição</a>
    </center>

</div>