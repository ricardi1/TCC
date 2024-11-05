<!DOCTYPE html>
<html>
    <head>
        <title>Meios de Pagamentos</title>
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
        <h3>Meios de Pagamentos</h3>
        <br>
        <div style="text-align: right;">
            <a class="btn btn-sm btn-success" href="adicionar_meiopagamento.php" role="button"><i class="fa-regular fa-file"></i>&nbsp;Novo</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Descrição</th>
                <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                    <?php
                        include 'conexao.php';
                        $sql = "SELECT * FROM meiopagamento ORDER BY descricao";
                        $buscar = mysqli_query($conexao, $sql);

                        while ($array = mysqli_fetch_array($buscar)) {

                            $idMeioPagamento = $array['idMeioPagamento'];
                            $descricao = $array['descricao'];
                    ?>
                <tr>
                    <td><?php echo $descricao ?></td>
                    <td><a class="btn btn-warning btn-sm" href="editar_meiopagamento.php?id=<?php echo $idMeioPagamento ?>" role="button"><i class="fa-regular fa-pen-to-square"></i>&nbsp;Editar</a>

                        <a class="btn btn-danger btn-sm" href="deletar_meiopagamento.php?id=<?php echo $idMeioPagamento ?>" role="button"><i class="fa-regular fa-trash-can"></i>&nbsp;Excluir</a></td>

            <?php } ?>
                </tr>
            </tbody>
            </table>
        <div style="text-align: right;">
            <a href="menu.php" role="button" class="btn btn-sm btn-primary"><i class="fa-solid fa-chevron-left"></i>&nbsp;Voltar</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>