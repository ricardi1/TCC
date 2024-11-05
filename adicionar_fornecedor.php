<!DOCTYPE html>
<head>
    <title>Inserir Usuário</title>

    <script src="https://kit.fontawesome.com/642a493c63.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">RIP</a>
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

    <div class="container" style="margin-top: 40px; width: 500px;">
        <h4>Formulário de Cadastro de Fornecedor</h4>
        <form action="_inserir_fornecedor.php" method="post" style="margin-top: 20px;">

            <div class="mb-3">
            <label>Nome Fornecedor</label>
            <input type="text" class="form-control" name="nome" placeholder="" required autocomplete="off">
            </div>

            <div class="mb-3">
            <label>Rua</label>
            <input type="text" class="form-control" name="rua" placeholder="" required autocomplete="off">
            </div>

            <div class="mb-3">
            <label>Número</label>
            <input type="number" class="form-control" name="numero" placeholder="" required autocomplete="off">
            </div>

            <div class="mb-3">
            <label>Bairro</label>
            <input type="text" class="form-control" name="bairro" placeholder="" required autocomplete="off">
            </div>

            <div class="mb-3">
            <label>UF</label>
            <input type="text" class="form-control" name="uf" placeholder="" required autocomplete="off">
            </div>

            <div class="mb-3">
            <label>CNPJ</label>
            <input type="text" class="form-control" name="cnpj" placeholder="" required autocomplete="off">
            </div>

            <div class="mb-3">
            <label>E-mail</label>
            <input type="email" class="form-control" name="email" placeholder="" required autocomplete="off">
            </div>

            <div class="mb-3">
            <label>Telefone</label>
            <input type="number" class="form-control" name="telefone" placeholder="" required autocomplete="off">
            </div>

            <div style="text-align: right;">
            <a href="fornecedor.php" role="button" class="btn btn-sm btn-primary"><i class="fa-solid fa-chevron-left"></i>&nbsp;Voltar</a>
            <button type="submit" class="btn btn-sm btn-success">Cadastrar</button>
            </div>
        </form>
        </div>

</body>
</html>