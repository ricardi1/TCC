<?php

include 'conexao.php';

$id = $_GET['id'];

?>

<html>
<head>
    <meta charset="urf-8">
    <title>Atualizar Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="menu.php">RIP</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Cadastros
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="meiopagamento.php">Meio de Pagamento</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
            </li>
            <li class="nav-item">
            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>

<div class="container-fluid" style="margin-top: 40px; width: 800px;">
<h4>Atualizar Orçamento</h4>
<form action="_atualizar_usuario.php" method="post" style="margin-top: 20px;">
        <?php

            $sql = "SELECT * FROM requisicaopagamento WHERE idRequisicaoPagamento = $id";
            $buscar = mysqli_query($conexao, $sql);

            while ($array = mysqli_fetch_array($buscar)) {
                $idRequisicaoPagamento = $array['idRequisicaoPagamento'];
                $descricao = $array['descricao'];
                $valor = $array['valor'];
                $dataEmissao = $array['dataEmissao'];
                $dataVencimento = $array['dataVencimento'];
                $numeroNF = $array['numeroNF'];
                $dataRequisicao = $array['dataRequisicao'];
                $status = $array['status'];
                $numerMeioPagamento_idMeioPagamentoNF = $array['MeioPagamento_idMeioPagamento'];
                $Fornecedor_idFornecedor = $array['Fornecedor_idFornecedor'];
                $Orcamento_idOrcamento = $array['Orcamento_idOrcamento'];
                $Usuario_idUsuario = $array['Usuario_idUsuario'];
                $CCustos_idCCustos = $array['CCustos_idCCustos'];

        ?>
        <form>
        <div class="mb-3">
        <label>Descrição</label>
        <input type="number" class="form-control" name="id" value="<?php echo $id ?>" style="display: none;">
        <input type="text" class="form-control" row="3" name="descricao" value="<?php echo $descricao ?>">
        <label>Valor</label>
        <div class="input-group">
                <div class="input-group-text">R$</div>
                    <input type="number" class="form-control" name="valor" value="<?php echo $valor ?>" >
        </div>
        <label>Data de Emissão NF</label>
        <input type="date" class="form-control" name="dataEmissao" value="<?php echo $dataEmissao ?>">
        <label>Perfil</label>
        <select class="form-select" name="PerfilUsuario_idPerfilUsuario">
        <?php
                include 'conexao.php';
                $sql = "SELECT * FROM perfilusuario ORDER BY nome";
                $buscar = mysqli_query($conexao, $sql);

                while ($array = mysqli_fetch_array($buscar)){
                    $idPerfilUsuario = $array['idPerfilUsuario'];
                    $nome = $array['nome'];
                ?>

                <option value="<?= $idPerfilUsuario?>"><?= $nome ?></option>

                <?php } ?>
        </select>
        </div>

    <div style="text-align: right;">
    <button type="submit" class="btn btn-success">Atualizar</button>
    </div>
    <?php } ?>
</form>
</div>

</body>
</html>