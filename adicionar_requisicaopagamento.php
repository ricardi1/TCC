<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inserir Requisição de Pagamento</title>
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

    <div class="container-fluid" style="margin-top: 40px; width: 800px;">
        <h4>Formulário de Cadastro de Requisição de Pagamento</h4>
        <form action="_inserir_requisicaopagamento.php" method="post" style="margin-top: 20px;">

        <div class="row g-3">
            <div class="mb-3">
              <label class="form-label">Descrição</label>
              <textarea type="text" class="form-control" name="descricao" placeholder="" required autocomplete="off"row="3"></textarea>
            </div>

            <div class="col-md-6">
              <label class="form-label">Valor</label>
              <div class="input-group">
                <div class="input-group-text">R$</div>
                <input type="text" class="form-control" name="valor" placeholder="" required autocomplete="off">
              </div>
            </div>


            <div class="col-md-6">
              <label class="form-label">Numero NF</label>
              <input type="text" class="form-control" name="numeroNF" placeholder="" required autocomplete="off">
            </div>

            <div class="col-md-6">
              <label class="form-label">Data de Emissão</label>
              <input type="date" class="form-control" name="dataEmissao" placeholder="" required autocomplete="off">
            </div>

            <div class="col-md-6">
              <label class="form-label">Data de Vencimento</label>
              <input type="date" class="form-control" name="dataVencimento" placeholder="" required autocomplete="off">
            </div>

            <div class="col-md-6">
            <label>Fornecedor</label>
            <select class="form-select" name="Fornecedor_idFornecedor" required autocomplete=off>

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
            </div>

            <div class="col-md-6">
            <label>Centro de Custo</label>
            <select class="form-select" name="CCustos_idCCustos" required autocomplete=off>

                <?php
                include 'conexao.php';
                $sql = "SELECT * FROM ccustos ORDER BY descricao";
                $buscar = mysqli_query($conexao, $sql);

                while ($array = mysqli_fetch_array($buscar)){
                    $idCCustos = $array['idCCustos'];
                    $descricao = $array['descricao'];
                ?>

                <option value="<?= $idCCustos?>"><?= $descricao ?></option>

                <?php } ?>

            </select>
            </div>

            <div class="col-md-6">
            <label>Meio de Pagamento</label>
            <select class="form-select" name="MeioPagamento_idMeioPagamento" required autocomplete=off>

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
            </div>

            <div class="col-md-6">
            <label>Orçamento</label>
            <select class="form-select" name="Orcamento_idOrcamento" required autocomplete=off>

                <?php
                include 'conexao.php';
                $sql = "SELECT * FROM orcamento ORDER BY descricao";
                $buscar = mysqli_query($conexao, $sql);

                while ($array = mysqli_fetch_array($buscar)){
                    $idOrcamento = $array['idOrcamento'];
                    $descricao = $array['descricao'];
                ?>

                <option value="<?= $idOrcamento?>"><?= $descricao ?></option>

                <?php } ?>

            </select>
            </div>

          </div>
            <br />
            <div style="text-align: right;">
            <a href="fornecedor.php" role="button" class="btn btn-sm btn-primary"><i class="fa-solid fa-chevron-left"></i>&nbsp;Voltar</a>
            <button type="submit" class="btn btn-sm btn-success">Cadastrar</button>
            </div>
        </form>
        </div>
</body>
</html>