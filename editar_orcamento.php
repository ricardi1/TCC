<?php

include 'conexao.php';

$id = $_GET['id'];

?>

<html>
<head>
    <meta charset="urf-8">
    <title>Atualizar Orcamento</title>
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

<div class="container" id="tamanhoContainer" style="margin-top: 40px; width: 400px" >
<h4>Atualizar Orçamento</h4>
<form action="_atualizar_orcamento.php" method="post" style="margin-top: 20px;">
        <?php

            $sql = "SELECT * FROM orcamento WHERE idOrcamento = $id";
            $buscar = mysqli_query($conexao, $sql);

            while ($array = mysqli_fetch_array($buscar)) {
                $idOrcamento = $array['idOrcamento'];
                $codigo = $array['codigo'];
                $descricao = $array['descricao'];

        ?>
        <form>
        <div class="mb-3">
        <label>Código do Orçamento</label>
        <input type="number" class="form-control" name="id" value="<?php echo $id ?>" style="display: none;">
        <input type="text" class="form-control" name="codigo" value="<?php echo $codigo ?>" disabled>
        <label>Descrição do Orçamento</label>
        <input type="text" class="form-control" name="descricao" value="<?php echo $descricao ?>">
        </div>

    <div style="text-align: right;">
    <button type="submit" class="btn btn-success">Atualizar</button>
    </div>
    <?php } ?>
</form>
</div>

</body>
</html>