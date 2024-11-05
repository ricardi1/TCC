<?php

include 'conexao.php';

$id = $_POST['id'];
$descricao = $_POST['descricao'];
$valor = $_POST['valor'];
$dataEmissao = $_POST['dataEmissao'];
$dataVencimento = $_POST['dataVencimento'];
$numeroNF = $_POST['numeroNF'];
$MeioPagamento_idMeioPagamento = $_POST['MeioPagamento_idMeioPagamento'];
$Fornecedor_idFornecedor = $_POST['Fornecedor_idFornecedor'];
$Orcamento_idOrcamento = $_POST['Orcamento_idOrcamento'];
$CCustos_idCCustos = $_POST['CCustos_idCCustos'];


$sql = "UPDATE requisicaopagamento 
        SET descricao ='$descricao', 
            valor = $valor, 
            dataEmissao = '$dataEmissao',
            dataVencimento = '$dataVencimento',
            numeroNF = '$numeroNF',
            MeioPagamento_idMeioPagamento = $MeioPagamento_idMeioPagamento,
            Fornecedor_idFornecedor = $Fornecedor_idFornecedor,
            Orcamento_idOrcamento = $Orcamento_idOrcamento,
            CCustos_idCCustos = $CCustos_idCCustos
        WHERE idRequisicaoPagamento = $id";

$atualizar = mysqli_query($conexao, $sql);

?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/642a493c63.js" crossorigin="anonymous"></script>

<div class="container" style="width: 400px;">
<center>
    <div style="margin-top: 10px" class="alert alert-success" role="alert">
    Usuário atualizado com sucesso!
    </div>
    <div style="margin-top: 10px">
    <a class="btn btn-warning btn-sm" href="usuario.php" role="button"><i class="fa-solid fa-chevron-left"></i>&nbsp;Voltar</a>
    </div>
</center>    
</div>