<?php

include 'conexao.php';

$id = $_GET['id'];

?>

<html>
<head>
    <meta charset="urf-8">
    <title>SIGRP</title>
    <script src="https://kit.fontawesome.com/642a493c63.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
            <a class="nav-link active" aria-current="page" href="menu.php"><i class="fa-solid fa-house"></i>&nbsp;HOME</a>
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

<div class="container" id="tamanhoContainer" style="margin-top: 90px; width: 400px" >
<h4>Atualizar Usuário</h4>
<form action="_atualizar_usuario.php" method="post" style="margin-top: 20px;">
        <?php

            $sql = "SELECT * FROM usuario WHERE idUsuario = $id";
            $buscar = mysqli_query($conexao, $sql);

            while ($array = mysqli_fetch_array($buscar)) {
                $idUsuario = $array['idUsuario'];
                $nome = $array['nome'];
                $email = $array['email'];
                $senha = $array['senha'];
                $dataCriacao = $array['dataCriacao'];
                $status = $array['status'];
                $PerfilUsuario_idPerfilUsuario = $array['PerfilUsuario_idPerfilUsuario'];

        ?>
        <form>
        <div class="mb-3">
        <label>Nome do Usuário</label>
        <input type="number" class="form-control" name="id" value="<?php echo $id ?>" style="display: none;">
        <input type="text" class="form-control" name="nome" value="<?php echo $nome ?>">
        <label>E-mail</label>
        <input type="email" class="form-control" name="email" value="<?php echo $email ?>" disabled>
        <label>Senha</label>
        <input id="txtSenha" type="password" class="form-control" name="senha" value="<?php echo $senha ?>">
        <label>Confirmar Senha</label>
        <input type="password" class="form-control" name="senha2" value="<?php echo $senha ?>" oninput="validaSenha(this)">
        <label>Status</label>
            <select class="form-select" name="status">
                <option value="1">Ativo</option>
                <option value="0">Inativo</option>
            </select>
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

<script>
    function validaSenha (input){
        if (input.value != document.getElementById('txtSenha').value){
            input.setCustomValidity('As senhas digitas são diferentes!');
        }else{
            input.setCustomValidity('');
        }
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>