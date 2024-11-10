<?php

include 'conexao.php';

$id = $_GET['id'];

?>

<html>
<head>
    <meta charset="urf-8">
    <title>SIGRP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/642a493c63.js" crossorigin="anonymous"></script>
</head>
<body>

<nav class="navbar bg-body-tertiary fixed-top">
    <div class="container-fluid">
    <a class="navbar-brand" href="#"><h3><img src="img/logo2.png" width="50px" height="50px">Sistema Interno de Gestão de Requisição de Pagamentos</h3></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">SIGRP</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="menu.php"><i class="fa-solid fa-house"></i>HOME</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="ccustos.php"><i class="fa-solid fa-ranking-star"></i> Centro de Custos</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="dadosbancarios.php"><i class="fa-solid fa-file-invoice-dollar"></i> Dados Bancários</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="fornecedor.php"><i class="fa-solid fa-boxes-packing"></i> Fornecedor</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="meiopagamento.php"><i class="fa-solid fa-piggy-bank"></i> Meio de Pagamento</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="orcamento.php"><i class="fa-solid fa-layer-group"></i> Orçamento</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="perfilusuario.php"><i class="fa-solid fa-users-gear"></i> Perfil de Usuário</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="requisicaopagamento.php"><i class="fa-solid fa-flag"></i> Requisição de Pagamento</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="requisicaopagamento.php"><i class="fa-solid fa-users-viewfinder"></i>&nbsp;Seção</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="usuario.php"><i class="fa-solid fa-user"></i> Usuário</a>
        </ul>
        </div>
    </div>
    </div>
    </nav>

<div class="container-fluid" style="margin-top: 90px; width: 800px;">
<h4>Atualizar Orçamento</h4>
<form action="_atualizar_requisicaopagamento.php" method="post" style="margin-top: 20px;">
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
                $MeioPagamento_idMeioPagamentoNF = $array['MeioPagamento_idMeioPagamento'];
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
                    <input type="number" class="form-control" id="valor" name="valor" value="<?php echo $valor ?>" >
        </div>
        <label>Número NF</label>
        <input type="text" class="form-control" name="numeroNF" value="<?php echo $numeroNF ?>">
        <label>Data de Emissão NF</label>
        <input type="date" class="form-control" name="dataEmissao" value="<?php echo $dataEmissao ?>">
        <label>Data de Vencimento</label>
        <input type="date" class="form-control" name="dataVencimento" value="<?php echo $dataVencimento ?>">

        <label>Meio de pagamento</label>
        <select class="form-select" name="MeioPagamento_idMeioPagamento">
        <?php
                include 'conexao.php';
                $sql = "SELECT * FROM meiopagamento ORDER BY descricao";
                $buscar = mysqli_query($conexao, $sql);

                while ($array = mysqli_fetch_array($buscar)){
                    $idMeioPagamento = $array['idMeioPagamento'];
                    $descricao = $array['descricao'];
                ?>

                <option value="<?= $idMeioPagamento?>"><?= $descricao ?></option>

                <?php } ?>
        </select>

        <label>Fornecedor</label>
        <select class="form-select" name="Fornecedor_idFornecedor">
        <?php
                include 'conexao.php';
                $sql = "SELECT * FROM fornecedor ORDER BY nome";
                $buscar = mysqli_query($conexao, $sql);

                while ($array = mysqli_fetch_array($buscar)){
                    $idFornecedor = $array['idFornecedor'];
                    $nome = $array['nome'];
                ?>

                <option value="<?= $idFornecedor?>"><?= $nome ?></option>

                <?php } ?>
        </select>

        <label>Centro de Custo</label>
        <select class="form-select" name="CCustos_idCCustos">
        <?php
                include 'conexao.php';
                $sql = "SELECT * FROM ccustos ORDER BY codigo";
                $buscar = mysqli_query($conexao, $sql);

                while ($array = mysqli_fetch_array($buscar)){
                    $idCCustos = $array['idCCustos'];
                    $descricao = $array['descricao'];
                ?>

                <option value="<?= $idCCustos?>"><?= $descricao ?></option>

                <?php } ?>
        </select>

        <label>Orçamento</label>
        <select class="form-select" name="Orcamento_idOrcamento">
        <?php
                include 'conexao.php';
                $sql = "SELECT * FROM orcamento ORDER BY codigo";
                $buscar = mysqli_query($conexao, $sql);

                while ($array = mysqli_fetch_array($buscar)){
                    $idOrcamento = $array['idOrcamento'];
                    $descricao = $array['descricao'];
                ?>

                <option value="<?= $idOrcamento?>"><?= $descricao ?></option>

                <?php } ?>
        </select>
        </div>
        

    <div style="text-align: right;">
    <button type="submit" class="btn btn-success">Atualizar</button>
    </div>
    <?php } ?>
</form>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js" integrity="sha512-0XDfGxFliYJPFrideYOoxdgNIvrwGTLnmK20xZbCAvPfLGQMzHUsaqZK8ZoH+luXGRxTrS46+Aq400nCnAT0/w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">

    </script>

</body>
</html>