<!DOCTYPE html>
<head>
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

    <div class="container" style="margin-top: 40px; width: 500px;">
        <h4>Formulário de Cadastro de Centro de Custos</h4>
        <form action="_inserir_ccustos.php" method="post" style="margin-top: 20px;">

            <div class="mb-3">
            <label>Código do Centro de Custos</label>
            <input type="text" class="form-control" name="codigo" id="ccusto" placeholder="Insira o código do centro de custos" required autocomplete="off">
            </div>

            <div class="mb-3">
            <label>Descrição do Centro de Custos</label>
            <input type="text" class="form-control" name="descricao" placeholder="Insira o nome do centro de custos" required autocomplete="off">
            </div>

            <div style="text-align: right;">
            <a href="ccustos.php" role="button" class="btn btn-sm btn-primary"><i class="fa-solid fa-chevron-left"></i>&nbsp;Voltar</a>
            <button type="submit" class="btn btn-sm btn-success">Cadastrar</button>
            </div>
        </form>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js" integrity="sha512-0XDfGxFliYJPFrideYOoxdgNIvrwGTLnmK20xZbCAvPfLGQMzHUsaqZK8ZoH+luXGRxTrS46+Aq400nCnAT0/w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        $('#ccusto').mask('00.00.00.00.00');
    </script>
</body>
</html>